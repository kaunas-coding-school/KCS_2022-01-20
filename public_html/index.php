<?php

include_once '../src/TestLib.php';

$temperatures = parseToCelcius($temperatures);

echo "Temperatūra:";
printAmountOfArray($temperatures, count($temperatures));

$average = getAverage($temperatures);
echo "Vidutinė temperatūra: $average";

rsort($temperatures);
echo "<br>Penkios auksciausios: ";
printInHtml($temperatures, KIEK);

sort($temperatures);
echo "Penkios zemiausios: ";
printInHtml($temperatures, KIEK);


function modifikuotiFaila() {
    $duomenys = skaitytiFaila();

    $naujiDuomenys = $duomenys + 'tekstas';

    irasytiIFaila($naujiDuomenys);

}


