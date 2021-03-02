<?php

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