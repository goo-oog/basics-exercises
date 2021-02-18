<?php
$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep'];
// happy,happy,OMG,hehe,OMG,hehe,OMG,happy

for ($i = 0; $i < count($animals); $i++) {
    if ($animals[$i] === 'sheep') {
        if ($i == 0) {
            if ($animals[$i + 1] === 'sheep') {
                echo 'happy';
            } else {
                echo 'OMG';
            }
        }
        if ($i !== 0 && $i !== count($animals) - 1 && $animals[$i + 1] === 'sheep' && $animals[$i - 1] === 'sheep') {
            echo 'happy';
        } elseif ($i !== 0 && $i !== count($animals) - 1 && ($animals[$i + 1] === 'wolf' || $animals[$i - 1] === 'wolf')) {
            echo 'OMG';
        }
        if ($i == count($animals) - 1) {
            if ($animals[$i - 1] === 'sheep') {
                echo 'happy';
            } else {
                echo 'OMG';
            }
        }
    } else {
        echo 'hehe';
    }
    if ($i !== count($animals) - 1) {
        echo ',';
    }
}
echo "\n";