<?php
declare(strict_types=1);

namespace Registry\App\Controllers;

use Registry\App\Models\Person;
use Registry\App\Services\RepositoryService;

class PersonController
{
    public static function showAddPersonForm(): void
    {
        require_once __DIR__ . '/../../public/_add-person.php';
    }

    public static function add(): void
    {
        $db = new RepositoryService();
        if (!$db->getByCode(str_replace('-', '', $_POST['code']))) {
            if (preg_match('/^\d{6}-?\d{5}$/', $_POST['code'])) {
                if (preg_match('/^[a-zāčēģīķļņšūž]+[[:space:]]?[a-zāčēģīķļņšūž]+$/iu', $_POST['name'])) {
                    if (preg_match('/^[a-zāčēģīķļņšūž]+[-[:space:]]?[a-zāčēģīķļņšūž]+$/iu', $_POST['surname'])) {
                        $db->addPerson(new Person(
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
            $_SESSION['add']['code'] = $_POST['code'];
            $_SESSION['add']['name'] = $_POST['name'];
            $_SESSION['add']['surname'] = $_POST['surname'];
            $_SESSION['add']['note'] = $_POST['note'];
            $_SESSION['add']['message'] = $message;
            header('Location: /add ');
        } else {
            header('Location: / ');
        }
    }

    public static function edit(): void
    {
        require_once __DIR__ . '/../../public/_edit-note.php';
    }
}