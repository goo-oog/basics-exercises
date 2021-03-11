<?php
declare(strict_types=1);


namespace Racing;


class RacerGeneral extends RacerAbstract
{
    public function __construct(string $name, int $minSpeed, int $maxSpeed, float $crashRate, string $symbol)
    {
        $this->name = $name;
        $this->minSpeed = $minSpeed;
        $this->maxSpeed = $maxSpeed;
        $this->crashRate = $crashRate;
        $this->symbol = $symbol;
    }
}