<?php

class CarManager

{
   private $_db;


    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 

    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

        /**
     * Add new Car
     *
     * @param Car $car
     * @return self
     */


    public function addCar(Car $car)
     {
        $req = $this->getDb()->prepare('INSERT INTO Vehicles(brand, type, color, spec, doors) VALUES(:brand, :type, :color, :spec, :doors)');
        $req->bindValue(':brand', $car->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $car->getColor(), PDO::PARAM_STR);
        $req->bindValue(':spec', $car->getSpec(), PDO::PARAM_STR);
        $req->bindValue(':doors', $car->getDoors(), PDO::PARAM_INT);
        $req->execute();
    }
    /**
     * delete car by id
     *
     * @param Car $car
     * @return self
     */
    public function deleteCar(Car $car)
    {
        $this->getDb()->exec('DELETE FROM Vehicles WHERE id = '.$car->getId());
    }
    /**
     * get one car by id
     *
     * @param integer $id
     * @return self
     */
    public function getCarById(int $id)
    {
        $car;
        $takeBdd = $this->getDb()->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $takeBdd->bindValue(':id', $id, PDO::PARAM_INT);
        $takeBdd->execute();
        $takeAllBdd = $takeBdd->fetchAll();
        foreach ($takeAllBdd as $oneCar) {
            $car = new Car($oneCar);
        }
        return $car;
    }

     public function getVehicleById(int $id)
    {
        $vehicule;
        $takeBdd = $this->getDb()->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $takeBdd->bindValue(':id', $id, PDO::PARAM_INT);
        $takeBdd->execute();
        $takeAllBdd = $takeBdd->fetchAll();
        foreach ($takeAllBdd as $oneVehicule) {
            if ($oneVehicule['type'] == 'trucks') {
                $vehicule = new Truck($oneVehicule);
            } elseif ($oneVehicule['type'] == 'cars') {
                $vehicule = new Car($oneVehicule);
            } elseif ($oneVehicule['type'] == 'motors') {
                $vehicule = new Motor($oneVehicule);
            }
        }
        return $vehicule;
    }

    /**
     * get all vehicle
     *
     * @return void
     */
    public function getVehicles()
    {
        $vehicles = [];
        $takeBdd = $this->getDb()->prepare('SELECT * FROM Vehicles ORDER BY id DESC');
        $takeBdd->execute();
        $takeAllBdd = $takeBdd->fetchAll();
        foreach ($takeAllBdd as $allVehicles) {
            $vehicles[] = new Car($allVehicles);
        }
        return $vehicles;
    }

    /**
     * update object by id
     *
     * @param Car $car
     * @return self
     */
    public function update(Car $car)
    {
        $updateBdd = $this->getDb()->prepare('UPDATE Vehicles SET brand = :brand, color = :color, doors = :doors, spec = :spec WHERE id = :id');
        $updateBdd->bindValue(':id', $car->getId(), PDO::PARAM_STR);
        $updateBdd->bindValue(':brand', $car->getbrand(), PDO::PARAM_STR);
        $updateBdd->bindValue(':color', $car->getColor(), PDO::PARAM_STR);
        $updateBdd->bindValue(':doors', $car->getDoors(), PDO::PARAM_INT);
        $updateBdd->bindValue(':spec', $car->getspec(), PDO::PARAM_STR);
        $updateBdd->execute();
    }
  
}