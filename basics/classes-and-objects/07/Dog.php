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
        if (isset($this->mother->name)) {
            return $this->mother->name;
        }
        return 'Unknown';
    }

    public function getFathersName(): string
    {
        if (isset($this->father->name)) {
            return $this->father->name;
        }
        return 'Unknown';
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