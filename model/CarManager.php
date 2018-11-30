<?php
class CarManager
{
    private $_bdd;
    public function __construct(PDO $bdd)
    {
        $this->setDb($bdd);
    }

      /**
     * set the bdd
     *
     * @param PDO $bdd
     * @return self
     */
    public function setDb(PDO $bdd)
    {
        $this->_bdd = $bdd;
    } 
    /**
     * Add new Car
     *
     * @param Car $car
     * @return self
     */
    public function addCar(Car $car)
    {
        $addBdd = $this->_bdd->prepare('INSERT INTO Vehicles(brand, type, doors, doors, spec) VALUES(:brand, :type, :doors, :doors, :spec)');
        $addBdd->bindValue(':brand', $car->getbrand(), PDO::PARAM_STR);
        $addBdd->bindValue(':type', $car->getType(), PDO::PARAM_STR);
        $addBdd->bindValue(':doors', $car->getDoor(), PDO::PARAM_INT);
        $addBdd->bindValue(':doors', $car->getdoors(), PDO::PARAM_INT);
        $addBdd->bindValue(':spec', $car->getspec(), PDO::PARAM_STR);
        $addBdd->execute();
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
        $takeBdd = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $takeBdd->bindValue(':id', $id, PDO::PARAM_INT);
        $takeBdd->execute();
        $takeAllBdd = $takeBdd->fetchAll();
        foreach ($takeAllBdd as $oneCar) {
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
        $takeBdd = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE type = :cars');
        $takeBdd->bindValue(':cars', 'cars', PDO::PARAM_STR);
        $takeBdd->execute();
        $takeAllBdd = $takeBdd->fetchAll();
        foreach ($takeAllBdd as $allCars) {
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
        $takeBdd = $this->_bdd->prepare('SELECT * FROM Vehicles ORDER BY id DESC');
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
        $updateBdd = $this->_bdd->prepare('UPDATE vehicles SET brand = :brand, type = :type, doors = :doors, doors = :doors, spec = :spec WHERE id = :id');
        $updateBdd->bindValue(':id', $car->getId(), PDO::PARAM_STR);
        $updateBdd->bindValue(':brand', $car->getbrand(), PDO::PARAM_STR);
        $updateBdd->bindValue(':type', $car->getType(), PDO::PARAM_STR);
        $updateBdd->bindValue(':doors', $car->getDoor(), PDO::PARAM_INT);
        $updateBdd->bindValue(':doors', $car->getdoors(), PDO::PARAM_INT);
        $updateBdd->bindValue(':spec', $car->getspec(), PDO::PARAM_STR);
        $updateBdd->execute();
    }
  
}