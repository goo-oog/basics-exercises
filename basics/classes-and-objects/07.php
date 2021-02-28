<?php
/*## Exercise #7

The questions in this exercise all deal with a class Dog that you have to program from scratch.

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

class Dog{
    private string $name;
    private string $sex;
    private Dog $mother;
    private Dog $father;
    public function __construct(string $name,string $sex){
        $this->name=$name;
        $this->sex=$sex;
    }
    public function getName(){
        return $this->name;
    }
    public function setMother(Dog $mother){
        $this->mother=$mother;
    }
    public function setFather(Dog $father){
        $this->father=$father;
    }
}
class DogTest{
    private array $dogs;
    public function getDogs(){
        return $this->dogs;
    }
    public function addDog(Dog $dog){
        $this->dogs[]=$dog;
    }
    public function addMother(string $name,Dog $mother){
        foreach ($this->dogs as $i=>$dog){
            if($dog->getName()==$name){
                $this->dogs[$i]->setMother($mother);
            }
        }
    }
}
$dogTest=new DogTest();
$dogTest->addDog(new Dog('Max','M'));
$dogTest->addDog(new Dog('Rocky','M'));
$dogTest->addDog(new Dog('Sparky','M'));
$dogTest->addDog(new Dog('Buster','M'));
$dogTest->addDog(new Dog('Sam','M'));
$dogTest->addDog(new Dog('Lady','F'));
$dogTest->addDog(new Dog('Molly','F'));
$dogTest->addDog(new Dog('Coco','F'));

$dogTest->addMother('Max',new Dog('Lady','F'));
foreach ($dogTest->getDogs() as $dog){
    var_dump($dog);
}