<?php
declare(strict_types=1);

use Registry\App\Models\Person;
use Registry\App\Services\RepositoryService;

$db = new RepositoryService();

require 'header.php';
require 'search.php';

unset($_SESSION['add']);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['search'])) {
        if ($_GET['query'] === '') {
            $_GET['query'] = '%';
        }
        switch ($_GET['search']) {
            case 'code':
                $searchResult = $db->getByCode($_GET['query']);
                break;
            case 'name':
                $searchResult = $db->getByName($_GET['query']);
                break;
            case 'surname':
                $searchResult = $db->getBySurname($_GET['query']);
        }
    } else {
        $searchResult = $db->getAll();
    }
} else {
    switch ($_POST['action']) {
        case 'delete':
            $db->deletePerson($db->getByCode($_POST['code'])[0]);
            break;
        case 'edit':
            $db->editNote(new Person($_POST['code'], $_POST['name'], $_POST['surname'], $_POST['note']));
    }
    $searchResult = $db->getAll();
}
require 'table.php';
require 'add-person-button.php';
require 'footer.php';