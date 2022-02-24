<?php

session_start();

if (array_key_exists('username', $_SESSION)) {
    echo 'Tai ADMIN pnele';
    echo '<br><a href="logout.php">Atsijungti</a><hr>';

    include '../src/Entities/Car.php';
    include '../src/Database.php';

    $car = new Car('green', '0 km/h', 10);

    $database = new Database();
    $car = $database->saveData($car);

    echo 'We are driving ' . $car->getColor() . ' car<br>';
    echo 'Curreen speed is: ' . $car->getCurrentSpeed() . '<br>';
    echo 'Curreen millage is: ' . $car->getMillage() . '<br>';
    $amount = 10;
    echo 'Let\'s fill ' . $amount . ' litres of gasoline<br>';
    $car->fillGasoline($amount);
    $newSpeed = '50km/h';
    $car->changeColor('red');
    echo 'Currently We are driving ' . $car->getColor() . ' car at ' .  $newSpeed . '<br>';
    $car->setCurrentSpeed($newSpeed);
    $car->drive(75);
    // ...
    $car->drive(75);
    echo 'Curreen speed is: ' . $car->getCurrentSpeed() . '<br>';
    echo 'Curreen millage is: ' . $car->getMillage() . '<br>';

    $database->update($car);

} else {
    header('location: login.html');
}
