<?php
declare(strict_types=1);


namespace Racing;


class Donkey extends RacerGeneral
{
    public function __construct(string $name = '')
    {
        parent::__construct('Donkey' . " $name", 1, 2, 0, '█');
    }
}