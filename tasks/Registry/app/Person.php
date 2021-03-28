<?php
declare(strict_types=1);

namespace Registry\App;

class Person
{
    private string $code;
    private string $name;
    private string $surname;
    private string $note;

    public function __construct(string $code, string $name, string $surname, string $note = '')
    {
        $this->code = $code;
        $this->name = $name;
        $this->surname = $surname;
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

    public function note(): string
    {
        return $this->note;
    }
}
