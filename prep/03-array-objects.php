<?php
/*###### Exercise 1
Create a non-associative array with 3 integer values and display the total sum of them.*/
$a = [37, 83, 19];
echo array_sum($a);
echo "\n";

/*###### Exercise 2
Given an array
Using dump method, dump out all 3 values.*/
$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];
var_dump($person['name']);
var_dump($person['surname']);
var_dump($person['age']);

/*###### Exercise 3
Given an object
Using dump method, dump out all 3 values.*/
$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;
var_dump($person->name);
var_dump($person->surname);
var_dump($person->age);

/*###### Exercise 4
Given array
Program should display concatenated value of - Jane Doe 41*/
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
echo "{$items[0][1]['name']} {$items[0][1]['surname']} {$items[0][1]['age']}";
echo "\n";

/*###### Exercise 5
Given the same array
Program should display concatenated value of - John & Jane Doe`s*/
echo "{$items[0][0]['name']} & {$items[0][1]['name']} {$items[0][1]['surname']}`s";
echo "\n";