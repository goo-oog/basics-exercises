<?php
declare(strict_types=1);
namespace CarRental;

require_once 'Car.php';
require_once 'Garage.php';

$garage = new Garage();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['action']) {
        case 'rentCar':
            $garage->rentCar($_POST['number']);
            break;
        case 'returnCar':
            $garage->returnCar($_POST['number']);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="text/html"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Auto noma</title>
</head>
<body>
<h1>AUTO NOMA</h1>
<table>
    <?php
    foreach ($garage->cars() as $number => $car): ?>
        <tr>
            <td>
                <img src="images/<?= $car->image() ?>" alt="<?= $car->model() ?>">
            </td>
            <td class="text">
                <h3><?= $car->make() . ' ' . $car->model() ?></h3>
                <ul>
                    <li>Degvielas patēriņš: <?= $car->consumption() ?> l / 100km</li>
                    <li><?= sprintf('Cena: %0.2f € / diennaktī', $car->price() / 100) ?></li>
                    <li>Statuss: <?= $car->statusLV() ?>
                    </li>
                </ul>
            </td>
            <td>
                <?php if ($car->status() === 'available'): ?>
                    <form method="post">
                        <input type="hidden" name="number" value="<?= $number ?>">
                        <button class="button-available" type="submit" name="action" value="rentCar">Īrēt</button>
                    </form>
                <?php endif; ?>
                <?php if ($car->status() === 'unavailable'): ?>
                    <form method="post">
                        <input type="hidden" name="number" value="<?= $number ?>">
                        <button class="button-unavailable" type="submit" name="action" value="returnCar">Atdot</button>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
