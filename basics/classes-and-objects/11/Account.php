<?php
declare(strict_types=1);

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function withdraw(float $amount): float
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return $amount;
        }
        throw new UnexpectedValueException("\x1B[1;97;41m Not enough funds in account '$this->name' \x1B[0m");
    }
}
