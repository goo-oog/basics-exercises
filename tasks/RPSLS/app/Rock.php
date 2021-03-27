<?php
declare(strict_types=1);

namespace RPSLS\App;

class Rock implements Element
{
    private string $name = 'Rock';

    public function name(): string
    {
        return $this->name;
    }

    public function isDestroying(Element $element): bool
    {
        return $element instanceof Scissors || $element instanceof Lizard;
    }
}