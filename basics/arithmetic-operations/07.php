<?php
//# Exercise #7
//todo:
// Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters.
// *Note:* The correct value is -490.5m.

$acceleration = -9.81;
$time = 10;
$initialVelocity = 0;
$initialPosition = 0;
$finalPosition = 0.5 * $acceleration * $time ** 2 + $initialVelocity * $time + $initialPosition;
echo $finalPosition . 'm';
echo "\n";