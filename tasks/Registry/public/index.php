<?php
declare(strict_types=1);

use Registry\App\MySQL;
use Registry\App\Person;

require_once '../vendor/autoload.php';

$db = new MySQL();
//$db->addPerson(new Person('06060611666','Abdurahman','ibn Hotab'));
//$db->deletePerson(new Person('06060611666','Abdurahman','ibn Hotab'));
//$db->editNote(new Person('06060611666','Abdurahman','ibn Hotab'));


require 'header.php';
require 'table.php';
require 'footer.php';