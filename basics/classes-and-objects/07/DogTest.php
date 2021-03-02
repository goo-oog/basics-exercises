<?php

class DogTest
{
    private array $dogs;

    public function getDogs(): array
    {
        return $this->dogs;
    }

    public function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function setMother(string $name, string $mother): void
    {
        foreach ($this->dogs as $i => $dog) {
            if ($dog->getName() === $name) {
                foreach ($this->dogs as $potentialMother) {
                    if ($potentialMother->getName() === $mother) {
                        $this->dogs[$i]->setMother($potentialMother);
                    }
                }
            }
        }
    }

    public function setFather(string $name, string $father): void
    {
        foreach ($this->dogs as $i => $dog) {
            if ($dog->getName() === $name) {
                foreach ($this->dogs as $potentialFather) {
                    if ($potentialFather->getName() === $father) {
                        $this->dogs[$i]->setFather($potentialFather);
                    }
                }
            }
        }
    }

    public function getMothersName(string $childName): string
    {
        foreach ($this->dogs as $i => $child) {
            if ($child->getName() === $childName) {
                return $this->dogs[$i]->getMothersName();
            }
        }
        return 'Unknown';
    }

    public function getFathersName(string $childName): string
    {
        foreach ($this->dogs as $i => $child) {
            if ($child->getName() === $childName) {
                return $this->dogs[$i]->getFathersName();
            }
        }
        return 'Unknown';
    }

    public function hasSameMother(string $dog1name, string $dog2name): bool
    {
        foreach ($this->dogs as $i => $dog) {
            if ($dog->getName() === $dog1name) {
                $dog1 = $this->dogs[$i];
            }
            if ($dog->getName() === $dog2name) {
                $dog2 = $this->dogs[$i];
            }
        }
        return $dog1->getMothersName() === $dog2->getMothersName();
    }
}