<?php
declare(strict_types=1);

namespace Registry\App\Services;

use Registry\App\Models\Person;

class PersonsDataManagementService
{
    private RepositoryService $db;
    private TwigService $twig;
    private array $twigVariables = [];

    public function __construct(RepositoryService $repositoryService)
    {
        $this->db = $repositoryService;
        $this->twig = new TwigService();
        $this->twigVariables['GET'] = $_GET;
        $this->twigVariables['POST'] = $_POST;
        $this->twigVariables['SESSION'] = $_SESSION;
        $this->twigVariables['db'] = $this->db;
    }

    public function showMainPage(): void
    {
        unset($_SESSION['memory']);
        if (isset($_GET['search'])) {
            $query = mb_convert_case(($_GET['query'] === '' ? '%' : $_GET['query']), MB_CASE_LOWER);
            switch ($_GET['search']) {
                case 'code':
                    $searchResult = $this->db->getByCode($query);
                    break;
                case 'name':
                    $searchResult = $this->db->getByName($query);
                    break;
                case 'surname':
                    $searchResult = $this->db->getBySurname($query);
                    break;
                case 'gender':
                    if ($query === 'vīrietis' || $query === 'v' || $query === 'm') {
                        $query = 'M';
                    } elseif ($query === 'sieviete' || $query === 's' || $query === 'f') {
                        $query = 'F';
                    }
                    $searchResult = $this->db->getByGender($query);
                    break;
                case 'address':
                    $searchResult = $this->db->getByAddress(($query));
            }
        } else {
            $searchResult = $this->db->getAll();
        }
        $this->twigVariables['persons'] = $searchResult;
        echo $this->twig->environment()->render('_main-page.twig', $this->twigVariables);
    }

    public function showEditAddressForm(): void
    {
        echo $this->twig->environment()->render('_edit-address.twig', $this->twigVariables);
    }

    public function editAddress(): void
    {
        $this->db->editAddress(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['address'], $_POST['note']));
        header('Location:/');
    }

    public function showEditNoteForm(): void
    {
        echo $this->twig->environment()->render('_edit-note.twig', $this->twigVariables);
    }

    public function editNote(): void
    {
        $this->db->editNote(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['address'], $_POST['note']));
        header('Location:/');
    }

    public function deletePerson(): void
    {
        $this->db->deletePerson($this->db->getByCode($_POST['code'])[0]);
        header('Location:/');
    }

    public function showAddPersonForm(): void
    {
        echo $this->twig->environment()->render('_add-person.twig', $this->twigVariables);
    }

    public function addPerson(): void
    {
        if (!$this->db->getByCode(str_replace('-', '', $_POST['code']))) {
            if (preg_match('/^\d{6}-?\d{5}$/', $_POST['code'])) {
                if (preg_match('/^[a-zāčēģīķļņšūž]+(?:[[:space:]][a-zāčēģīķļņšūž]+)*$/iuU', $_POST['name'])) {
                    if (preg_match('/^[a-zāčēģīķļņšūž]+(?:[-[:space:]][a-zāčēģīķļņšūž]+)*$/iuU', $_POST['surname'])) {
                        if ($_POST['gender'] === 'M' || $_POST['gender'] === 'F') {
                            $this->db->addPerson(new Person(
                                str_replace('-', '', $_POST['code']),
                                mb_convert_case($_POST['name'], MB_CASE_TITLE),
                                mb_convert_case($_POST['surname'], MB_CASE_TITLE),
                                $_POST['gender'],
                                $_POST['address'],
                                $_POST['note']));
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
}