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

    public function getMother(): Dog
    {
        return $this->mother ?? new Dog('Unknown', 'F');
    }

    public function getFather(): Dog
    {
        return $this->father ?? new Dog('Unknown', 'M');
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
