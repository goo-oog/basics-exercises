<?php
declare(strict_types=1);


namespace Racing;


class Biker extends RacerGeneral
{
    public function __construct(string $name = '')
    {
        parent::__construct('Biker' . " $name", 3, 5, 0.025, '╦');
    }
}