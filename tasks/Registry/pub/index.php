<?php
declare(strict_types=1);

use Registry\App\Register;

require_once '../vendor/autoload.php';

$db = new Register();
//$db->addPerson(new Person('06060611666','Abdurahman','ibn Hotab'));
//$db->deletePerson(new Person('06060611666','Abdurahman','ibn Hotab'));
//$db->editNote(new Person('06060611666','Abdurahman','ibn Hotab'));

require 'header.php';
require 'search.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['query'])&&$_POST['query'] === '') {
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
            //
            break;
        case 'delete':
            $db->deletePerson($db->getByCode($_POST['code'])[0]);
            break;
        //case 'edit':
            //
    }

    require 'table.php';
}
require 'footer.php';