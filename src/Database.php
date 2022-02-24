<?php

class Database
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=db;dbname=kcs_db", 'devuser', 'devpass');
    }

    public function saveData(Car $car): Car
    {
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->connection->prepare("INSERT INTO cars (color, tank_size) VALUES (:spalva, :bakas)");

        $color = $car->getColor();
        $tankSize = $car->getTankSize();

        $stmt->bindParam(":spalva", $color);
        $stmt->bindParam(":bakas", $tankSize);
        $stmt->execute();

        $lastId = $this->connection->lastInsertId();

        $sql = "SELECT * FROM cars WHERE id = $lastId";
        $result = $this->connection->query($sql);

        return $result->fetchObject(Car::class);
    }

    public function update(Car $car)
    {
        // @TODO sutvarkyti
    }
}