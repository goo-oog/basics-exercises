<?php
/*## Exercise #7
- Create a class Dog. Dogs should have a name, and a sex.
- Make a class DogTest with a Main method in which you create the following Dogs:
- Max, male
- Rocky, male
- Sparky, male
- Buster, male
- Sam, male
- Lady, female
- Molly, female
- Coco, female
- Change the Dog class so that each dog has a mother and a father.
- Add to the main method in DogTest, so that:
- Max has Lady as mother, and Rocky as father
- Coco has Molly as mother, and Buster as father
- Rocky has Molly as mother, and Sam as father
- Buster has Lady as mother, and Sparky as father
- Change the dog class to include a method fathersName that return the name of the father.
  If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
- referenceToCoco.FathersName() returns the string "Buster"
- referenceToSparky.FathersName() returns the string "Unknown"
- Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog). The method should return true on the call
- referenceToCoco.HasSameMotherAs(referenceToRocky).
Show that the new method works in the DogTest main method.*/

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
        $this->mother = $mother; // by reference
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father; // by reference
    }
}

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
            if ($dog->getName() == $name) {
                foreach ($this->dogs as $potentialMother) {
                    if ($potentialMother->getName() == $mother) {
                        $this->dogs[$i]->setMother($potentialMother); // by reference
                    }
                }
            }
        }
    }

    public function setFather(string $name, string $father): void
    {
        foreach ($this->dogs as $i => $dog) {
            if ($dog->getName() == $name) {
                foreach ($this->dogs as $potentialFather) {
                    if ($potentialFather->getName() == $father) {
                        $this->dogs[$i]->setFather($potentialFather); // by reference
                    }
                }
            }
        }
    }

    public function getMothersName(string $childName): string
    {
        foreach ($this->dogs as $i => $child) {
            if ($child->getName() == $childName) {
                return $this->dogs[$i]->getMothersName();
            }
        }
        return 'Unknown';
    }

    public function getFathersName(string $childName): string
    {
        foreach ($this->dogs as $i => $child) {
            if ($child->getName() == $childName) {
                return $this->dogs[$i]->getFathersName();
            }
        }
        return 'Unknown';
    }

    public function hasSameMother(string $dog1name, string $dog2name): bool
    {
        foreach ($this->dogs as $i => $dog) {
            if ($dog->getName() == $dog1name) {
                $dog1 = $this->dogs[$i];
            }
            if ($dog->getName() == $dog2name) {
                $dog2 = $this->dogs[$i];
            }
        }
        return $dog1->getMothersName() == $dog2->getMothersName();
    }
}

$dogTest = new DogTest();
$dogTest->addDog(new Dog('Max', 'M')); //                               Sam     Molly
$dogTest->addDog(new Dog('Rocky', 'M')); //                               \      /\
$dogTest->addDog(new Dog('Sparky', 'M')); //                               \    /  \
$dogTest->addDog(new Dog('Buster', 'M')); //                                \  /    \
$dogTest->addDog(new Dog('Sam', 'M')); //             Sparky     Lady      Rocky     |
$dogTest->addDog(new Dog('Lady', 'F')); //                \       /\        /        |
$dogTest->addDog(new Dog('Molly', 'F')); //                \     /  \      /         |
$dogTest->addDog(new Dog('Coco', 'F')); //                  \   /    \    /         /
$dogTest->setMother('Max', 'Lady'); //                    Buster     Max         /
$dogTest->setFather('Max', 'Rocky'); //                       \_________        /
$dogTest->setMother('Coco', 'Molly'); //                                \     /
$dogTest->setFather('Coco', 'Buster'); //                                \   /
$dogTest->setMother('Rocky', 'Molly'); //                                 Coco
$dogTest->setFather('Rocky', 'Sam');
$dogTest->setMother('Buster', 'Lady');
$dogTest->setFather('Buster', 'Sparky');

echo "The father's name of Coco is: " . $dogTest->getFathersName('Coco') . "\n"; // Molly
echo "The father's name of Sparky is: " . $dogTest->getFathersName('Sparky') . "\n"; // Unknown

echo "Do Coco and Rocky have the same mother? ";
echo $dogTest->hasSameMother('Coco', 'Rocky') ? "Yes\n" : "No\n"; // Yes
echo "Do Lady and Max have the same mother? ";
echo $dogTest->hasSameMother('Lady', 'Max') ? "Yes\n" : "No\n"; // No