<?php

class DogTest
{
    /**
     * @var Dog[]
     */
    private array $dogs;

    public function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function getDog(string $name): Dog
    {
        foreach ($this->dogs as $i => $dog) {
            if ($dog->getName() === $name) {
                return $this->dogs[$i];
            }
        }
        return new Dog('Unknown', 'X');
    }

    public function setMother(string $name, string $mother): void
    {
        $this->getDog($name)->setMother($this->getDog($mother));
    }

    public function setFather(string $name, string $father): void
    {
        $this->getDog($name)->setFather($this->getDog($father));
    }

    public function hasSameMother(string $dog1name, string $dog2name): bool
    {
        return $this->getDog($dog1name)->getMother() === $this->getDog($dog2name)->getMother();
    }

    public function hasSameFather(string $dog1name, string $dog2name): bool
    {
        return $this->getDog($dog1name)->getFather() === $this->getDog($dog2name)->getFather();
    }
}
