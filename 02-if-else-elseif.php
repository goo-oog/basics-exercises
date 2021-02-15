<?php
//###### Exercise 1
//Given variables (int) 10, string "10" determine if they both are the same.
$i = 10;
$s = '10';
echo $i == $s ? 'the same' : '❌ not the same'; // the same
echo "\n";
echo $i === $s ? 'the same' : '❌ not the same'; // ❌ not the same
echo "\n";

//###### Exercise 2
//Given variable (int) 50, determine if its in the range of 1 and 100.
$m = 50;
$n = 500;
echo $m >= 1 && $m <= 100 ? 'within range' : '❌ out of range'; // within range
echo "\n";
echo $n >= 1 && $n <= 100 ? 'within range' : '❌ out of range'; // ❌ out of range
echo "\n";

//###### Exercise 3
//Given variables (string) "hello" create a condition that if the given value is "hello" then output "world".
$s = 'hello';
$t = 'Hello';
if ($s === 'hello') {
    echo 'world'; // hello
}
if ($t === 'hello') {
    echo 'world'; //
}
echo "\n";

//###### Exercise 4
//By your choice, create condition with 3 checks.
//For example, if value is greater than X, less than Y and is an even number.
$a = 17;
$b = 23;
$val = 20;
if ($val > $a && $val < $b && $val % 2 === 0) {
    echo 'value is even and within range';
} else {
    echo '❌ value does not meet the requirements';
}
echo "\n";

//###### Exercise 5
//Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
//Range should be stored within the 2 separated variables $y and $z.
$y = 40;
$z = 60;
$val = 50;
if ($val >= $y && $val <= $z) {
    echo 'correct';
}
echo "\n";

//###### Exercise 6
//Create a variable $plateNumber that stores your car plate number.
//Create a switch statement that prints out that its your car in case of your number.
$plateNumber = 'AB1234';
$query1 = 'AB1234';
switch ($query1) {
    case $plateNumber:
        echo "It's your car"; // It's your car
        break;
    default:
        echo "That's not your car!";
}
echo "\n";

//Alternative variant
$query2 = 'ZZ9999';
if ($query2 === $plateNumber) {
    echo "It's your car";
} else {
    echo "That's not your car!"; // That's not your car!
}
echo "\n";

//###### Exercise 7
//Create a variable $number with integer by your choice.
//Create a switch statement that prints out text "low" if the value is under 50,
//"medium" if the case is higher than 50 but lower than 100, "high" if the value is >100.
$number = 33;
switch (true) {
    case ($number < 50):
        echo 'low';
        break;
    case ($number >= 50 && $number <= 100):
        echo 'medium';
        break;
    case ($number > 100):
        echo 'high';
}
echo "\n";

//Alternative variant
if ($number < 50) {
    echo 'low';
} elseif ($number > 100) {
    echo 'high';
} else {
    echo 'medium';
}
echo "\n";