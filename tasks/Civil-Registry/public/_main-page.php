<?php
declare(strict_types=1);

use Registry\App\Models\Person;
use Registry\App\Services\Register;

$db = new Register();

require 'header.php';
require 'search.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['query']) && $_POST['query'] === '') {
        $_POST['query'] = '%';
    }
    switch ($_POST['action']) {
        case 'code':
            $searchResult = $db->getByCode($_POST['query']);
            break;
        case 'name':
            $searchResult = $db->getByName($_POST['query']);
            break;
        case 'surname':
            $searchResult = $db->getBySurname($_POST['query']);
            break;
        case 'add':
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
                require 'return-back.php';
            }
            $searchResult = $db->getAll();
            break;
        case 'delete':
            $db->deletePerson($db->getByCode($_POST['code'])[0]);
            $searchResult = $db->getAll();
            break;
        case 'edit':
            $db->editNote(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['note']));
            $searchResult = $db->getAll();
    }
} else {
    $searchResult = $db->getAll();
}
require 'table.php';
require 'add-person-button.php';
require 'footer.php';