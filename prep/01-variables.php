<?php
/*###### Exercise 1
Create variable that prints out an integer 10, float 10.10, string "hello world"*/
$in = 10;
$fl = 10.1;
$str = "hello world";
echo "$in\n";
echo "$fl\n";
echo "$str\n";

/*###### Exercise 2
Dump the same values that should display both data type & its value. (Note, usage of var_dump)*/
var_dump($in);
var_dump($fl);
var_dump($str);

/*###### Exercise 3
Concatenate your name, surname and integer of your age.*/
echo 'Gints' . ' ' . 'Ozoliņš' . ' ' . 46 . "\n";