<?php

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