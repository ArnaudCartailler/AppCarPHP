<?php

declare(strict_types = 1);

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
        $req = $this->_bdd->prepare('INSERT INTO Vehicles(brand, type, color, spec, doors) VALUES(:brand, :type, :color, :spec, :doors)');
        $req->bindValue(':brand', $car->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':spec', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':doors ',$car->getDoor(), PDO::PARAM_INT);
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
        $this->_bdd->exec('DELETE FROM Vehicles WHERE id = '.$car->getId());
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
        $getCars = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $getCars->bindValue(':id', $id, PDO::PARAM_INT);
        $getCars->execute();
        $getAllCars = $getCars->fetchAll();
        foreach ($getAllCars as $oneCar) {
            $car = new Car($oneCar);
        }
        return $car;
    }
    /**
     * get all cars
     *
     * @return self
     */
    public function getCars()
    {
        $cars = [];
        $getCars = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE type = :cars');
        $getCars->bindValue(':cars', 'Voiture', PDO::PARAM_STR);
        $getCars->execute();
        $getAllCars = $getCars->fetchAll();
        foreach ($getAllCars as $allCars) {
            $cars[] = new Car($allCars);
        }
        return $cars;
    }
    /**
     * get all vehicle
     *
     * @return void
     */
    public function getVehicles()
    {
        $vehicles = [];
        $getCars = $this->_bdd->prepare('SELECT * FROM Vehicles ORDER BY id DESC');
        $getCars->execute();
        $getAllCars = $getCars->fetchAll();
        foreach ($getAllCars as $allVehicles) {
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
        $updateBdd = $this->_bdd->prepare('UPDATE Vehicles SET brand = :brand, type = :type, color = :color, spec = :spec, doors = :doors WHERE id = :id');
        $req->bindValue(':brand', $car->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':spec', $car->getType(), PDO::PARAM_STR);
        $req->bindValue(':doors ',$car->getDoor(), PDO::PARAM_INT);
        $updateBdd->execute();
    }
    


}