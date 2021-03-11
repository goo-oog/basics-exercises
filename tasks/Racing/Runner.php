<?php
declare(strict_types=1);


namespace Racing;


class Runner extends RacerAbstract
{
    public function __construct(string $name = '')
    {
        $this->name = 'Runner' . " $name";
        $this->minSpeed = 2;
        $this->maxSpeed = 3;
        $this->crashRate = 0.015;
        $this->symbol = '╪';
    }
}