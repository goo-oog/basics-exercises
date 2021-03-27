<?php
declare(strict_types=1);

namespace RPSLS\App;

class Paper implements Element
{
    private string $name = 'Paper';

    public function name(): string
    {
        return $this->name;
    }

    public function isDestroying(Element $element): bool
    {
        return $element instanceof Rock || $element instanceof Spock;
    }
}