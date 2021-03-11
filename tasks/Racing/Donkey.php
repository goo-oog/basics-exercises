<?php
declare(strict_types=1);


namespace Racing;


class Donkey extends RacerAbstract
{
    public function __construct(string $name = '')
    {
        $this->name = 'Donkey' . " $name";
        $this->minSpeed = 1;
        $this->maxSpeed = 2;
        $this->crashRate = 0;
        $this->symbol = '█';
    }
}