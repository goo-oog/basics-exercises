<?php
declare(strict_types=1);

namespace Registry\App\Services;

use Registry\App\Models\Person;

class PersonsDataManagementService
{
    private RepositoryService $db;

    public function __construct(RepositoryService $repositoryService)
    {
        $this->db = $repositoryService;
    }

    public function showMainPage(): void
    {
        unset($_SESSION['memory']);
        if (isset($_GET['search'])) {
            if ($_GET['query'] === '') {
                $_GET['query'] = '%';
            }
            switch ($_GET['search']) {
                case 'code':
                    $searchResult = $this->db->getByCode($_GET['query']);
                    break;
                case 'name':
                    $searchResult = $this->db->getByName($_GET['query']);
                    break;
                case 'surname':
                    $searchResult = $this->db->getBySurname($_GET['query']);
            }
        } else {
            $searchResult = $this->db->getAll();
        }
        require __DIR__ . '/../../public/_main-page.php';
    }

    public function showEditNoteForm(): void
    {
        require __DIR__ . '/../../public/_edit-note.php';
    }

    public function editNote(): void
    {
        $this->db->editNote(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['note']));
        header('Location:/');
    }

    public function deletePerson(): void
    {
        $this->db->deletePerson($this->db->getByCode($_POST['code'])[0]);
        header('Location:/');
    }

    public function showAddPersonForm(): void
    {
        require __DIR__ . '/../../public/_add-person.php';
    }

    public function addPerson(): void
    {
        if (!$this->db->getByCode(str_replace('-', '', $_POST['code']))) {
            if (preg_match('/^\d{6}-?\d{5}$/', $_POST['code'])) {
                if (preg_match('/^[a-zāčēģīķļņšūž]+(?:[[:space:]][a-zāčēģīķļņšūž]+)*$/iuU', $_POST['name'])) {
                    if (preg_match('/^[a-zāčēģīķļņšūž]+(?:[-[:space:]][a-zāčēģīķļņšūž]+)*$/iuU', $_POST['surname'])) {
                        $this->db->addPerson(new Person(
                            str_replace('-', '', $_POST['code']),
                            mb_convert_case($_POST['name'], MB_CASE_TITLE),
                            mb_convert_case($_POST['surname'], MB_CASE_TITLE),
                            $_POST['note']));
                    } else {
                        $message = "Uzvārds '" . $_POST['surname'] . "' nav derīgs!";
                    }
                } else {
                    $message = "Vārds '" . $_POST['name'] . "' nav derīgs!";
                }
            } else {
                $message = 'Personas kods ' . $_POST['code'] . ' nav derīgs!';
            }
        } else {
            $message = 'Persona ar šādu kodu ('
                . substr(str_replace('-', '', $_POST['code']), 0, 6)
                . '-' . substr(str_replace('-', '', $_POST['code']), 6)
                . ') jau eksistē!';
        }
        if (isset($message) && $message !== '') {
            $_SESSION['memory']['code'] = $_POST['code'];
            $_SESSION['memory']['name'] = $_POST['name'];
            $_SESSION['memory']['surname'] = $_POST['surname'];
            $_SESSION['memory']['note'] = $_POST['note'];
            $_SESSION['memory']['message'] = $message;
            header('Location:/add');
        } else {
            header('Location:/');
        }
    }
}