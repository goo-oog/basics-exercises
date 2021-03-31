<?php
declare(strict_types=1);

namespace Registry\App\Models;

class Person
{
    private string $code;
    private string $name;
    private string $surname;
    private string $gender;
    private string $address;
    private string $note;

    public function __construct(string $code, string $name, string $surname, string $gender, string $address = '', string $note = '')
    {
        $this->code = $code;
        $this->name = $name;
        $this->surname = $surname;
        $this->gender = $gender;
        $this->address = $address;
        $this->note = $note;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function gender(): string
    {
        return $this->gender;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function note(): string
    {
        return $this->note;
    }
}