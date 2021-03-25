<?php
declare(strict_types=1);

namespace RPSLS\App;

class Game
{
    private Player $human;
    private Player $computer;
    /**
     * @var Element[]
     */
    private array $elements;

    public function __construct(string $humanChoice)
    {
        $this->elements[] = new Rock();
        $this->elements[] = new Paper();
        $this->elements[] = new Scissors();
        $this->elements[] = new Lizard();
        $this->elements[] = new Spock();
        $this->human = new Human($this->findElement($humanChoice));
        $this->computer = new Computer($this->elements[rand(0, count($this->elements) - 1)]);
    }

    public function human(): Player
    {
        return $this->human;
    }

    public function computer(): Player
    {
        return $this->computer;
    }

    public function elements(): array
    {
        return $this->elements;
    }

    private function findElement(string $name): Element
    {
        foreach ($this->elements as $i => $element) {
            if ($element->name() === $name) {
                return $this->elements[$i];
            }
        }
    }

    public function winner(): string
    {
        if ($this->human->choice() === $this->computer->choice()) {
            return 'Tie!';
        }
        if ($this->human->choice()->isDestroying($this->computer->choice())) {
            return $this->human->name() . ' won!';
        }
        return $this->computer->name() . ' won!';
    }
}