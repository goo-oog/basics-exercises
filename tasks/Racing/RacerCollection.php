<?php
declare(strict_types=1);


namespace Racing;


class RacerCollection
{
    /**
     * @var Racer[]
     */
    private array $racers;

    public function addRacer(Racer $racer): void
    {
        $this->racers[] = $racer;
    }

    public function racers(): array
    {
        return $this->racers;
    }

    public function isSomebodyStillRacing(): bool
    {
        foreach ($this->racers as $racer) {
            if ($racer->winningPlace() === 0) {
                return true;
            }
        }
        return false;
    }
}