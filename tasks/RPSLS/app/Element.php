<?php
declare(strict_types=1);

namespace RPSLS\App;

interface Element
{
    public function name(): string;

    public function isDestroying(Element $element): bool;
}