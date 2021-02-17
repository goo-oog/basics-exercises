<?php
/*###### Exercise 1
Create a function that accepts any string and returns the same value with added "codelex" by the end of it.
Print this value out.*/
function addCodelex(string $str): string
{
    return $str . 'codelex';
}

echo addCodelex('programmēšanas kursi ');
echo "\n";


/*###### Exercise 2
Create a function that accepts 2 integer arguments. First argument is a base value and the second one is a value its been multiplied by.
For example, given argument 10 and 5 prints out 50*/
function multiply(int $x1, int $x2): int
{
    return $x1 * $x2;
}

echo multiply(18, 37);
echo "\n";


/*###### Exercise 3
Create a person object with name, surname and age. Create a function that will determine if the person has reached 18 years of age.
Print out if the person has reached age of 18 or not.*/
$car1 = new stdClass();
$car1->name = 'Lightning';
$car1->surname = 'McQueen';
$car1->age = 6;
$car2 = new stdClass();
$car2->name = 'Sally';
$car2->surname = 'Carrera';
$car2->age = 5;
$car3 = new stdClass();
$car3->name = 'Mater';
$car3->surname = 'the Cable Guy';
$car3->age = 25;

function checkAge(object $car): bool
{
    return ($car->age < 18);
}

echo checkAge($car1) ? 'You are too young!' : 'You are at least 18 years old and may enter!';
echo "\n";


/*###### Exercise 4
Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.*/
$cars = [$car1, $car2, $car3];
foreach ($cars as $car) {
    echo "{$car->name} {$car->surname} : ";
    echo $car->age < 18 ? 'You are too young!' : 'You are at least 18 years old and may enter!';
    echo "\n";
}


/*###### Exercise 5
Create a 2D associative array in 2nd dimension with fruits and their weight.
Create a function that determines if fruit has weight over 10kg.
Create a secondary array with shipping costs per weight. Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
Using foreach loop print out the values of the fruits and how much it would cost to ship this product.*/
$fruits = [
    ['name' => 'Tomatoes', 'weight' => 7],
    ['name' => 'Watermelons', 'weight' => 15],
    ['name' => 'Bananas', 'weight' => 9],
    ['name' => 'Apples', 'weight' => 10],
    ['name' => 'Durians', 'weight' => 6]
];
$shipping = ['full' => 2, 'reduced' => 1];

function isReducedShipping(int $weight): bool
{
    return $weight < 10;
}

foreach ($fruits as $fruit) {
    echo "{$fruit['name']} - ";
    if ($fruit['name'] === 'Durians') {
        echo "Cannot be shipped - too smelly!";
    } elseif (isReducedShipping($fruit['weight'])) {
        echo "Shipping costs: {$shipping['reduced']} €";
    } else {
        echo "Shipping costs: {$shipping['full']} €";
    }
    echo "\n";
}


/*###### Exercise 6
Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
Create a function that doubles the integer number.
Within the loop using php in-built function print out the double of the number value (using your custom function).*/
$mixedArray = [243, 468, 353, 863.874, '796'];

function doubler(int $x): int
{
    return $x * 2;
}

for ($i = 0; $i < count($mixedArray); $i++) {
    if (is_int($mixedArray[$i])) {
        echo doubler($mixedArray[$i]);
        echo "\n";
    }
}


/*###### Exercise 7**
Imagine you own a gun store.
Only certain guns can be purchased with license types.
Create an object (person) that will be the requester to purchase a gun (object)
Person object has a name, valid licenses (multiple) & cash.
Guns are objects stored within an array.
Each gun has license letter, price & name.
Using PHP in-built functions determine if the requester (person) can buy a gun from the store.*/
$person = new stdClass();
$person->name = 'Donald';
$person->licenses = ['A', 'C'];
$person->cash = 1500;

class Gun
{
    public string $name;
    public int $price;
    public string $license_needed;

    public function __construct(string $name, int $price, string $license_needed)
    {
        $this->name = $name;
        $this->price = $price;
        $this->license_needed = $license_needed;
    }
}

$guns = [
    new Gun('Colt 1911', 1600, 'A'),
    new Gun('Glock-17', 500, 'A'),
    new Gun('AK-47', 1400, 'B'),
    new Gun('M249', 4000, 'B'),
    new Gun('Remington SP-10', 1200, 'C')
];
foreach ($guns as $gun) {
    echo "{$person->name}, you ";
    if ($gun->price <= $person->cash && in_array($gun->license_needed, $person->licenses)) {
        echo "can buy {$gun->name} for \${$gun->price}";
    } else {
        echo "cannot buy {$gun->name} ";
        echo (in_array($gun->license_needed, $person->licenses)) ?
            "because you have not enough cash" :
            "because you don't have the needed license";
    }
    echo "\n";
}