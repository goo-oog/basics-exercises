<?php
$items = [
    'maize' => 0.89,
    'piens' => 0.79,
    'desa' => 1.99,
    'siers' => 2.39,
    'cukurs' => 0.69
];
echo "\nVeikalā pieejamas šādas preces:\n\n";
foreach ($items as $item => $price) {
    echo "◼ "
        . ucfirst($item)
        . str_repeat(' ', 23 - strlen($item))
        . str_replace('.', ',', $price)
        . " €\n";
}
echo "\n";
$basket = new stdClass();
$isItemFound = false;
while ($isItemFound === false) {
    $itemPrompt = strtolower(readline('Izvēlieties preci: '));
    if (array_key_exists($itemPrompt, $items)) {
        $basket->item = $itemPrompt;
        $isItemFound = true;
    } else {
        echo "Šāda produkta nav! Mēģiniet vēlreiz!\n";
    }
}
$isQuantityCorrect = false;
while ($isQuantityCorrect === false) {
    $quantityPrompt = readline('Izvēlieties daudzumu: ');
    if ($quantityPrompt > 0) {
        $basket->quantity = $quantityPrompt;
        $isQuantityCorrect = true;
    } else {
        echo "Daudzumam ir jābūt pozitīvam skaitlim!\n";
    }
}

$total = $items[$basket->item] * $basket->quantity;
echo "\nJūsu izvēle:   "
    . ucfirst($basket->item)
    . "   cena: "
    . str_replace('.', ',', $items[$basket->item])
    . " €   daudzums: {$basket->quantity} gab.   KOPĀ: "
    . str_replace('.', ',', $total)
    . " €\n\n";