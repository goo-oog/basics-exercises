<?php
declare(strict_types=1);

namespace Registry\App\Services;

use Registry\App\Models\Person;
use Registry\App\Repositories\TokensRepository;

class AppMainService
{
    private PersonsRepositoryService $personsDB;
    private PersonsDataValidationService $validate;
    private TokensRepository $tokensDB;
    private TwigService $twig;
    private array $twigVariables = [];

    public function __construct(PersonsRepositoryService $personsRepositoryService, TokensRepository $tokensRepository)
    {
        $this->personsDB = $personsRepositoryService;
        $this->tokensDB = $tokensRepository;
        $this->validate = new PersonsDataValidationService();
        $this->twig = new TwigService();
        $this->twigVariables['GET'] = $_GET;
        $this->twigVariables['POST'] = $_POST;
        $this->twigVariables['SESSION'] = $_SESSION;
        $this->twigVariables['db'] = $this->personsDB;
    }

    public function showMainPage(): string
    {
        unset($_SESSION['memory']);
        if (isset($_GET['search'])) {
            $query = '%' . $_GET['query'] . '%';
            switch ($_GET['search']) {
                case 'code':
                    $searchResult = $this->personsDB->getByCode($query);
                    break;
                case 'name':
                    $searchResult = $this->personsDB->getByName($query);
                    break;
                case 'surname':
                    $searchResult = $this->personsDB->getBySurname($query);
                    break;
                case 'gender':
                    if ($query === 'vīrietis' || $query === 'v' || $query === 'm') {
                        $query = 'M';
                    } elseif ($query === 'sieviete' || $query === 's' || $query === 'f') {
                        $query = 'F';
                    }
                    $searchResult = $this->personsDB->getByGender($query);
                    break;
                case 'year':
                    $searchResult = $this->personsDB->getByYear($query);
                    break;
                case 'address':
                    $searchResult = $this->personsDB->getByAddress(($query));
                    break;
                case 'note':
                    $searchResult = $this->personsDB->getByNote(($query));
            }
        } else {
            $searchResult = $this->personsDB->getAll();
        }
        $this->twigVariables['persons'] = $searchResult;
        return $this->twig->environment()->render('_main-page.twig', $this->twigVariables);
    }

    public function showEditAddressForm(): string
    {
        if ($this->checkAuth()) {
            return $this->twig->environment()->render('_edit-address.twig', $this->twigVariables);
        }
        header('Location:/login');
        exit();
    }

    public function editAddress(): void
    {
        $this->personsDB->editAddress(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['year'], trim($_POST['address']), $_POST['note']));
        header('Location:/');
        exit();
    }

    public function showEditNoteForm(): string
    {
        if ($this->checkAuth()) {
            return $this->twig->environment()->render('_edit-note.twig', $this->twigVariables);
        }
        header('Location:/login');
        exit();
    }

    public function editNote(): void
    {
        $this->personsDB->editNote(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['year'], $_POST['address'], trim($_POST['note'])));
        header('Location:/');
    }

    public function deletePerson(): void
    {
        if ($this->checkAuth()) {
            if ($this->validate->code($_POST['code']) && $this->personsDB->getByCode($_POST['code'])) {
                $this->personsDB->deletePerson($this->personsDB->getByCode($_POST['code'])[0]);
            }
            header('Location:/');
        } else {
            header('Location:/login');
        }
    }

    public function showAddPersonForm(): string
    {
        if ($this->checkAuth()) {
            return $this->twig->environment()->render('_add-person.twig', $this->twigVariables);
        }
        return $this->login();
    }

    public function addPerson(): void
    {
        if (!$this->personsDB->getByCode($_POST['code'])) {
            if ($this->validate->code($_POST['code'])) {
                if ($this->validate->name($_POST['name'])) {
                    if ($this->validate->surname($_POST['surname'])) {
                        if ($this->validate->gender($_POST['gender'])) {
                            $code = str_replace('-', '', $_POST['code']);
                            $this->personsDB->addPerson(new Person(
                                $code,
                                mb_convert_case($_POST['name'], MB_CASE_TITLE),
                                mb_convert_case($_POST['surname'], MB_CASE_TITLE),
                                $_POST['gender'],
                                ($code[6] == 1 ? '19' : '20') . substr($code, 4, 2),
                                trim($_POST['address']),
                                trim($_POST['note'])));
                        } else {
                            $message = "Dzimumam jābūt 'vīrietis' vai 'sieviete'!";
                        }
                    } else {
                        $message = "Uzvārds '" . $_POST['surname'] . "' nav derīgs!";
                    }
                } else {
                    $message = "Vārds '" . $_POST['name'] . "' nav derīgs!";
                }
            } else {
                $message = "Personas kods '" . $_POST['code'] . "' nav derīgs!";
            }
        } else {
            $message = 'Persona ar šādu kodu ('
                . substr(str_replace('-', '', $_POST['code']), 0, 6)
                . '-'
                . substr(str_replace('-', '', $_POST['code']), 6)
                . ') jau eksistē!';
        }
        if (isset($message) && $message !== '') {
            $_SESSION['memory']['code'] = $_POST['code'];
            $_SESSION['memory']['name'] = $_POST['name'];
            $_SESSION['memory']['surname'] = $_POST['surname'];
            $_SESSION['memory']['gender'] = $_POST['gender'];
            $_SESSION['memory']['address'] = $_POST['address'];
            $_SESSION['memory']['note'] = $_POST['note'];
            $_SESSION['memory']['message'] = $message;
            header('Location:/add');
        } else {
            header('Location:/');
        }
    }

    public function checkAuth(): bool
    {
        if (isset($_SESSION['auth_id'])) {
            if ($this->tokensDB->searchByToken($_SESSION['auth_id'])) {
                return true;
            }
            $this->tokensDB->invalidateToken($_SESSION['auth_id']);
        }
        unset($_SESSION['auth_id']);
        $this->twigVariables['SESSION'] = $_SESSION;
        return false;
    }

    public function login(): string
    {
        return $this->twig->environment()->render('_login-logout.twig', $this->twigVariables);
    }

    public function logout(): void
    {
        $this->tokensDB->invalidateToken($_SESSION['auth_id']);
        unset($_SESSION['auth_id']);
        header('Location:/');
    }

    public function loginVerify(): void
    {
        $code = str_replace('-', '', $_POST['code']);
        if ($this->personsDB->getByCode($code)) {
            $token = password_hash($code, PASSWORD_BCRYPT);
            $this->tokensDB->addToken($code, $token);
            $_SESSION['auth_id'] = $token;
            header('Location:/auth-success');
        } else {
            header('Location:/login');
        }
    }

    public function authorizationSuccessful(): string
    {
        $this->twigVariables['message'] =
            $this->personsDB->getByCode($this->tokensDB->searchByToken($_SESSION['auth_id']))[0]->name()
            . ' '
            . $this->personsDB->getByCode($this->tokensDB->searchByToken($_SESSION['auth_id']))[0]->surname();
        return $this->twig->environment()->render('_auth-success.twig', $this->twigVariables);
    }
}