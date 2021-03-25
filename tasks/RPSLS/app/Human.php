<?php
declare(strict_types=1);

namespace RPSLS\App;

class Human implements Player
{
    private string $name = 'You';
    private Element $choice;

    public function __construct(Element $choice)
    {
        $this->choice = $choice;
    }

    public function choice(): Element
    {
        return $this->choice;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setChoice(Element $choice): void
    {
        $this->choice = $choice;
    }
}