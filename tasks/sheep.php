<?php
$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep'];
//Expected output:   happy,happy,OMG,hehe,OMG,hehe,OMG,happy

for ($i = 0; $i < count($animals); $i++) {
    if ($animals[$i] === 'wolf') {
        echo 'hehe';
    } else {
        if (isset($animals[$i + 1]) && $animals[$i + 1] === 'wolf'
            || isset($animals[$i - 1]) && $animals[$i - 1] === 'wolf') {
            echo 'OMG';
        } else {
            echo 'happy';
        }
    }
    if ($i !== count($animals) - 1) {
        echo ',';
    }
}
echo "\n";