<?php

class Car
{
    private float $currentGasolineAmount;

    public function __construct(
        private ?string $color = '',
        private ?string $currentSpeed = '0km/h',
        private ?float  $millage = 20,
        private ?int    $tankSize = 50
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
}