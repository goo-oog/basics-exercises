<?php
declare(strict_types=1);

namespace RPSLS\App;

class Spock implements Element
{
    private string $name = 'Spock';

    public function name(): string
    {
        return $this->name;
    }

    public function isDestroying(Element $element): bool
    {
        return $element instanceof Scissors || $element instanceof Rock;
    }
}