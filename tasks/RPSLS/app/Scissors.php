<?php
declare(strict_types=1);

namespace RPSLS\App;

class Scissors implements Element
{
    private string $name = 'Scissors';

    public function name(): string
    {
        return $this->name;
    }

    public function isDestroying(Element $element): bool
    {
        return $element instanceof Paper || $element instanceof Lizard;
    }
}