<?php
/*## Exercise #1
Create a class Product that represents a product sold in a shop.
A product has a price, amount and name.

The class should have:
- A constructor `Product(string name, double price_at_start, int amount_at_start)`
- A `function print_product()` that prints a product in the following form:
```
Banana, price 1.1, amount 13
```
Test your code by creating a class with main method and add three products there:
- "Logitech mouse", 70.00 EUR, 14 units
- "iPhone 5s", 999.99 EUR, 3 units
- "Epson EB-U05", 440.46 EUR, 1 units
Print out information about them.
Add new behaviour to the Product class:
- possibility to change quantity
- possibility to change price
Reflect your changes in a working application.*/

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function printProduct(): string
    {
        return sprintf("$this->name    price %0.2f €   amount $this->amount\n", $this->price);
    }

    public function changeAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function changePrice(float $price): void
    {
        $this->price = $price;
    }
}

class Shop
{
    private array $products = [];

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function changePrice(string $name, float $price): void
    {
        foreach ($this->products as $i => $product) {
            if ($product->getName() === $name) {
                $this->products[$i]->changePrice($price);
                return;
            }
        }
        echo "\x1B[1;91mSuch product does not exist. Check spelling!\x1B[0m\n";
    }

    public function changeAmount(string $name, int $amount): void
    {
        foreach ($this->products as $i => $product) {
            if ($product->getName() === $name) {
                $this->products[$i]->changeAmount($amount);
                return;
            }
        }
        echo "\x1B[1;91mSuch product does not exist. Check spelling!\x1B[0m\n";
    }

    public function printProducts(): string
    {
        $output = "\n";
        foreach ($this->products as $product) {
            $output .= $product->printProduct();
        }
        return $output . "\n";
    }
}

function userInputString(string $prompt): string
{
    while (true) {
        $readline = readline($prompt);
        if (ctype_alnum($readline)) {
            return ucwords($readline);
        } else {
            echo "Your input is not valid. Try again!\n";
        }
    }
}

function userInputNumber($prompt): float
{
    while (true) {
        $readline = readline($prompt);
        if (is_numeric($readline) && $readline >= 0) {
            return $readline;
        } else {
            echo "Your input is not valid. Try again!\n";
        }
    }
}

$shop = new Shop();
$shop->addProduct(new Product("Mouse", 70.00, 14));
$shop->addProduct(new Product("Phone", 999.99, 3));
$shop->addProduct(new Product("Printer", 440.46, 1));
while (true) {
    echo $shop->printProducts();
    switch (userInputString("Enter 'p' to change price, 'a' to change amount or 'e' to exit: ")) {
        case 'P':
            $shop->changePrice(userInputString("To change price enter product's name: "), userInputNumber('Enter the new price: '));
            break;
        case 'A':
            $shop->changeAmount(userInputString("To change amount enter product's name: "), userInputNumber('Enter the new amount: '));
            break;
        case 'E':
            exit();
        default:
            echo "\n\x1B[1;91mEnter only one of these: 'p' or 'a' or 'e'\x1B[0m\n";
    }
}