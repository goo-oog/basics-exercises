<?php
/*###### Exercise 1
Create an array with integers (up to 10) and print them out using foreach loop.*/
for ($i = 0; $i < 10; $i++) {
    $array[] = rand(1, 999);
}
foreach ($array as $x) {
    echo "$x ";
}
echo "\n";

/*###### Exercise 2
Create an array with integers (up to 10) and print them out using for loop.*/
for ($i = 0; $i < count($array); $i++) {
    echo "$array[$i] ";
}
echo "\n";

/*###### Exercise 3
Given variable $x = 1 while $x is lower than 10, print out text "codelex".
(Note: To avoid infinite looping, after each print increase the variable $x by 1)*/
$x = 1;
while ($x < 10) {
    echo 'codelex ';
    $x++;
}
echo "\n";

/*###### Exercise 4
Create a non associative array with integers and print out only integers that divides by 3 without any left.*/
foreach ($array as $x) {
    if ($x % 3 === 0) {
        echo "$x ";
    }
}
echo "\n";

/*###### Exercise 5
Create an associative array with objects of multiple persons.
Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every persons personal data.*/
$presidentsDB = [
    ['Jānis', 'Čakste', '1859', '14. septembris'],
    ['Gustavs', 'Zemgals', '1871', '12. augusts'],
    ['Alberts', 'Kviesis', '1881', '22. decembris'],
    ['Kārlis', 'Ulmanis', '1877', '4. septembris'],
    ['Guntis', 'Ulmanis', '1939', '13. septembris'],
    ['Vaira', 'Vīķe-Freiberga', '1937', '1. decembris'],
    ['Valdis', 'Zatlers', '1955', '22. marts'],
    ['Andris', 'Bērziņš', '1944', '10. decembris'],
    ['Raimonds', 'Vējonis', '1966', '15. jūnijs'],
    ['Egils', 'Levits', '1955', '30. jūnijs']
];
for ($i = 0; $i < count($presidentsDB); $i++) {
    $presidents[$i] = (object)[
        'name' => $presidentsDB[$i][0],
        'surname' => $presidentsDB[$i][1],
        'birthYear' => $presidentsDB[$i][2],
        'birthday' => $presidentsDB[$i][3]
    ];
}
for ($i = 0; $i < count($presidents); $i++) {
    echo "{$presidents[$i]->name} {$presidents[$i]->surname}, {$presidents[$i]->birthYear}. gada {$presidents[$i]->birthday}\n";
}