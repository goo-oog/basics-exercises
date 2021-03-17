<?php /** @noinspection OffsetOperationsInspection */
declare(strict_types=1);

namespace CarRental;

use JsonSerializable;
use InvalidArgumentException;

class Car implements JsonSerializable
{
    private string $make;
    private string $model;
    private float $consumption;
    private int $price;
    private string $status;
    private const ALLOWED_STATUSES = ['available', 'unavailable'];
    private const LV_TRANSLATION = ['pieejams', 'nav pieejams'];
    private string $image;

    public function __construct(string $make, string $model, float $consumption, int $price, string $availability, string $image)
    {
        $this->make = $make;
        $this->model = $model;
        $this->consumption = $consumption;
        $this->price = $price;
        $this->status = $availability;
        $this->image = $image;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function make(): string
    {
        return $this->make;
    }

    public function model(): string
    {
        return $this->model;
    }

    public function consumption(): float
    {
        return $this->consumption;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function statusLV(): string
    {
        return self::LV_TRANSLATION[array_search($this->status, self::ALLOWED_STATUSES)];
    }

    public function image(): string
    {
        return $this->image;
    }

    public function setStatus($status): void
    {
        if (in_array($status, self::ALLOWED_STATUSES, true)) {
            $this->status = $status;
        } else {
            throw new InvalidArgumentException("Only these 'status' values are possible: " . implode(', ', self::ALLOWED_STATUSES));
        }
    }
}