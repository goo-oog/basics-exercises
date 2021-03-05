<?php
/** @noinspection MagicMethodsValidityInspection */
/** @noinspection PhpVariableVariableInspection */
declare(strict_types=1);

class Ingredient
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = strtolower($name);
    }

    public function __get(string $name): string
    {
        return $this->$name;
    }

    public function __isset(string $name): bool
    {
        return isset($this->$name);
    }

    public function name(): string
    {
        return strtolower($this->name);
    }
}
