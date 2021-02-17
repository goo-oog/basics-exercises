<?php
$items=[
    'maize'=>0.89,
    'piens'=>0.79,
    'desa'=>1.99,
    'siers'=>2.39,
    'cukurs'=>0.69
];
echo "Veikalā pieejamas šādas preces:\n";
foreach ($items as $key=>$price){
    echo "$key          $price €\n";
}
echo "\n";
$basket=new stdClass();
$basket->item=readline('Izvēlieties preci: ');
$basket->quantity=readline('Izvēlieties daudzumu: ');
$total=$items[$basket->item]*$basket->quantity;
echo "Jūsu grozā ir {$basket->quantity}x $basket->item   Kopā: {$total} €\n";