<?php
declare(strict_types=1);

use Registry\App\Register;

require_once '../vendor/autoload.php';

$db = new Register();
//$db->addPerson(new Person('06060611666','Abdurahman','ibn Hotab'));
//$db->deletePerson(new Person('06060611666','Abdurahman','ibn Hotab'));
//$db->editNote(new Person('06060611666','Abdurahman','ibn Hotab'));

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['query']===''){
        $searchResult=$db->getAll();
    }else{
        $searchResult=$db->$_POST['column']($_POST['query']);
    }
}

require 'header.php';
require 'search.php';
require 'table.php';
require 'footer.php';