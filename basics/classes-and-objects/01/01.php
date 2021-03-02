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

require_once 'Product.php';
require_once 'Shop.php';

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