<?php
/*## Exercise #3
For this exercise, you will design a set of classes that work together to simulate a car's fuel gauge
and odometer. The classes you will design are the following:

The FuelGauge Class: This class will simulate a fuel gauge. Its responsibilities are as follows:
 - To know the car’s current amount of fuel, in liters.
 - To report the car’s current amount of fuel, in liters.
 - To be able to increment the amount of fuel by 1 liter.
 This simulates putting fuel in the car. ( The car can hold a maximum of 70 liters.)
 - To be able to decrement the amount of fuel by 1 liter,
 if the amount of fuel is greater than 0 liters. This simulates burning fuel as the car runs.

The Odometer Class: This class will simulate the car’s odometer. Its responsibilities are as follows:
 - To know the car’s current mileage.
 - To report the car’s current mileage.
 - To be able to increment the current mileage by 1 kilometer.
 The maximum mileage the odometer can store is 999,999 kilometer.
 When this amount is exceeded, the odometer resets the current mileage to 0.
 - To be able to work with a FuelGauge object.
 It should decrease the FuelGauge object’s current amount of fuel by 1
 liter for every 10 kilometers traveled. (The car’s fuel economy is 10 kilometers per liter.)

Demonstrate the classes by creating instances of each. Simulate filling the car up with fuel,
and then run a loop that increments the odometer until the car runs out of fuel.
During each loop iteration, print the car’s current mileage and amount of fuel.*/

class FuelGauge
{
    private int $fuelAmount = 0;

    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function add1Liter(): void
    {
        if ($this->fuelAmount < 70) {
            $this->fuelAmount++;
        }
    }

    public function burn1Liter(): void
    {
        if ($this->fuelAmount > 0) {
            $this->fuelAmount--;
        }
    }
}

class Odometer
{
    private int $mileage = 0;

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function drive1km(FuelGauge $fuelGauge): void
    {
        $this->mileage++;
        if ($this->mileage === 1000000) {
            $this->mileage = 0;
        }
        if ($this->mileage % 10 === 0) {
            $fuelGauge->burn1Liter();
        }
    }
}

$fuelGauge = new FuelGauge();
$odometer = new Odometer();
while ($fuelGauge->getFuelAmount() < 70) {
    $fuelGauge->add1Liter();
    echo "\033[2J";
    echo "Refueling... " . $fuelGauge->getFuelAmount() . " l\n";
    usleep(100000);
}
echo "\033[2J";
echo "Refueling... Full\n";
usleep(2000000);
while ($fuelGauge->getFuelAmount() > 0) {
    $odometer->drive1km($fuelGauge);
    echo "\033[2J";
    echo "Trip: " . $odometer->getMileage() . " km   Fuel: " . $fuelGauge->getFuelAmount() . " l\n";
    usleep(10000);
}