<?php
declare(strict_types=1);

class Ingredient
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = strtolower($name);
    }

    public function name(): string
    {
        return strtolower($this->name);
    }
}