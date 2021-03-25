<?php
declare(strict_types=1);

namespace RPSLS\App;

interface Player
{
    public function choice(): Element;

    public function name(): string;

    public function setChoice(Element $choice): void;
}