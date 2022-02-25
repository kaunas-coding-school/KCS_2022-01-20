<?php

namespace KCS;

use KCS\Entities\CarInteface;
use PDO;

class Database
{
    private PDO $connection;

    private string $modelClass;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=db;dbname=kcs_db", 'devuser', 'devpass');
    }

    public function saveCarData(CarInteface $car): CarInteface
    {
        $this->modelClass = $car::class;

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO cars (color, tank_size) VALUES (:spalva, :bakas)";
        $stmt = $this->connection->prepare($sql);

        $color = $car->getColor();
        $tankSize = $car->getTankSize();

        $stmt->bindParam(":spalva", $color);
        $stmt->bindParam(":bakas", $tankSize);
        $stmt->execute();

        $lastId = $this->connection->lastInsertId();

        return $this->getCar($lastId);
    }

    public function update(CarInteface $car)
    {
        /** @var \KCS\Entities\Car $car */
        $this->modelClass = $car::class;

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE cars SET color = :spalva, tank_size = :bakas, millage = :rida,
                gasolineAmount = :kuroKiekis WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        $color = $car->getColor();
        $tankSize = $car->getTankSize();
        $rida = $car->getMillage();
        $kuroKiekis = $car->getCurrentGasolineAmount();
        $id = $car->getId();

        $stmt->bindParam(":spalva", $color);
        $stmt->bindParam(":bakas", $tankSize);
        $stmt->bindParam(":rida", $rida);
        $stmt->bindParam(":kuroKiekis", $kuroKiekis);
        $stmt->bindParam(":id", $id);
        $stmt->execute();    }

    public function delete(CarInteface $car): void
    {
        $sql = "DELETE FROM cars WHERE id=" . $car->getId();
        $this->connection->exec($sql);
    }

    public function getCar(int $lastId): mixed
    {
        $sql = "SELECT * FROM cars WHERE id = $lastId";
        $result = $this->connection->query($sql);
        $carObj = $result->fetchObject($this->modelClass);

        return $carObj;
    }
}