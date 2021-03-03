<?php

class Dog
{
    private string $name;
    private string $sex;
    private Dog $mother;
    private Dog $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMothersName(): string
    {
        return $this->mother->name ?? 'Unknown';
    }

    public function getFathersName(): string
    {
        return $this->father->name ?? 'Unknown';
    }

    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }
}
