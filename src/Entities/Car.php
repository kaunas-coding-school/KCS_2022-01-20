<?php

namespace KCS\Entities;

class Car implements CarInteface
{
    public float $currentGasolineAmount;

    public int $id;

    public function __construct(
        public ?string $color = '',
        public ?string $currentSpeed = '0km/h',
        public ?float  $millage = 20,
        public ?int    $tankSize = 50
    ) {
        $this->currentGasolineAmount = 0;
    }

    public function fillGasoline(float $amount): void
    {
        if ($amount > 0 &&
            $this->currentGasolineAmount >= 0 &&
            ($this->currentGasolineAmount + $amount) <= $this->tankSize
        ) {
            $this->currentGasolineAmount += $amount;
        } else {
            throw new Exception('Kilo klaida pildant baka');
        }
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setCurrentSpeed(string $currentSpeed): void
    {
        $this->currentSpeed = trim($currentSpeed);
    }

    public function getMillage(): float
    {
        return $this->millage;
    }

    public function drive(float $distance)
    {
        $this->millage += $distance;
    }

    public function getCurrentSpeed(): string
    {
        return $this->currentSpeed;
    }

    public function changeColor(string $color)
    {
        echo 'Just changed car color to: ' . $color . '<br>';
        $this->color = $color;
    }

    public function getTankSize(): float
    {
        return $this->tankSize;
    }

    public function getCurrentGasolineAmount(): float
    {
        return $this->currentGasolineAmount;
    }

    public function getId(): int
    {
        return $this->id;
    }
}