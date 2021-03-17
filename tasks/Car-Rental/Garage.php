<?php
declare(strict_types=1);

namespace CarRental;

class Garage
{
    /**
     * @var array<string,Car>
     */
    private array $cars = [];

    public function __construct()
    {
        $this->jsonRead();
    }

    public function jsonRead(): void
    {
        foreach (json_decode(file_get_contents('garage.json'), true) as $number => $car) {
            $this->addCar($number, new Car($car['make'], $car['model'], $car['consumption'], $car['price'], $car['status'], $car['image']));
        }
    }

    public function jsonSave(): void
    {
        foreach ($this->cars as $number => $car) {
            $json[$number] = $car->jsonSerialize();
        }
        file_put_contents('garage.json', json_encode($json, JSON_PRETTY_PRINT));
    }

    public function cars(): array
    {
        return $this->cars;
    }

    public function addCar(string $number, Car $car): void
    {
        $this->cars[$number] = $car;
    }

    public function rentCar(string $number): void
    {
        $this->cars[$number]->setStatus('unavailable');
        $this->jsonSave();
    }

    public function returnCar(string $number): void
    {
        $this->cars[$number]->setStatus('available');
        $this->jsonSave();
    }
}