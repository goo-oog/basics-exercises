<?php
declare(strict_types=1);

namespace RPSLS\App;

class Lizard implements Element
{
    private string $name = 'Lizard';

    public function name(): string
    {
        return $this->name;
    }

    public function isDestroying(Element $element): bool
    {
        return $element instanceof Paper || $element instanceof Spock;
    }
}