<?php

class Element
{
    public string $symbol;
    public int $winMultiplier;

    public function __construct(string $symbol, int $winMultiplier)
    {
        $this->symbol = $symbol;
        $this->winMultiplier = $winMultiplier;
    }
}