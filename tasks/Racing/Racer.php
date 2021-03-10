<?php
declare(strict_types=1);


namespace Racing;


interface Racer
{
    public function name(): string;

    public function minSpeed(): int;

    public function maxSpeed(): int;

    public function crashRate(): float;

    public function symbol(): string;

    public function crash(): void;

    public function position(): int;

    public function setPosition(int $position): void;

    public function move(): void;

    public function winningPlace(): int;

    public function setWinningPlace(int $place): void;

    public function time(): float;

    public function setTime(float $time);
}