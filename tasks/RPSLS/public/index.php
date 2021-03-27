<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

use RPSLS\App\Game;

require 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['element'])) {
    $game = new Game($_POST['element']);
    require 'result.php';
}
require 'choice.php';
require 'footer.php';