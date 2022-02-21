<?php

include_once 'Duomenys.php';

function parseToCelcius(array $temperatures): array
{
    foreach ($temperatures as $item) {
        $celsiusTemps[] = convertToCelcius($item);
    }
    $temperatures = $celsiusTemps;

    return $temperatures;
}

function printAmountOfArray(array $temp, $kiek): void
{
    $i = 0;
    foreach ($temp as $value) {
        if ($i < $kiek) {
            echo " " . $value;
        }
        $i++;
    }
    echo "<br>";
}

function printInHtml(array $temp, $kiek): void
{
    $i = 0;
    foreach ($temp as $value) {
        if ($i < $kiek) {
            $red = $value * 2;
            $textColor = "rgba(255,255,255, $value)";
            echo "<div style='background-color: rgb($red, 0, 0); color: $textColor; display: block; width: {$value}px'>$value</div>";
        }
        $i++;
    }
    echo "<br>";
}

function convertToCelcius(float $temp): float
{
    return round($temp - 32 * .5556, 2);
}

function getAverage(array $temperatures): int|float
{
    $suma = 0;
    foreach ($temperatures as $dayTemperature) {
        $suma += $dayTemperature;
    }

    $average = $suma / count($temperatures);

    return $average;
}