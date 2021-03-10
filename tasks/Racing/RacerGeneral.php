<?php
declare(strict_types=1);


namespace Racing;


class RacerGeneral implements Racer
{
    protected string $name;
    protected int $minSpeed;
    protected int $maxSpeed;
    protected float $crashRate;
    protected string $symbol;
    protected int $position = 0;
    protected int $winningPlace = 0;
    protected float $time = 0;

    public function __construct(string $name, int $minSpeed, int $maxSpeed, float $crashRate, string $symbol)
    {
        $this->name = $name;
        $this->minSpeed = $minSpeed;
        $this->maxSpeed = $maxSpeed;
        $this->crashRate = $crashRate;
        $this->symbol = $symbol;
    }


    public function name(): string
    {
        return $this->name;
    }

    public function minSpeed(): int
    {
        return $this->minSpeed;
    }

    public function maxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function crashRate(): float
    {
        return $this->crashRate;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function crash(): void
    {
        $this->symbol = '╳';
        $this->winningPlace = -1;
    }

    public function position(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function move(): void
    {
        $this->position += rand($this->minSpeed(), $this->maxSpeed());
    }

    public function winningPlace(): int
    {
        return $this->winningPlace;
    }

    public function setWinningPlace(int $place): void
    {
        $this->winningPlace = $place;
    }

    public function time(): float
    {
        return $this->time;
    }

    public function setTime(float $time): void
    {
        $this->time = $time;
    }
}