<?php
declare(strict_types=1);


namespace Racing;


class Runner extends RacerGeneral
{
    public function __construct(string $name = '')
    {
        parent::__construct('Runner' . " $name", 2, 3, 0.015, '╪');
    }
}