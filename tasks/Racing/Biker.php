<?php
declare(strict_types=1);


namespace Racing;


class Biker extends RacerAbstract
{
    public function __construct(string $name = '')
    {
        $this->name = 'Biker' . " $name";
        $this->minSpeed = 3;
        $this->maxSpeed = 5;
        $this->crashRate = 0.025;
        $this->symbol = '╦';
    }
}