<?php

declare(strict_types = 1);

class TruckManager
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
     * Add new Truck
     *
     * @param Truck $truck
     * @return self
     */

    public function addTruck(Truck $truck)
    {
        $req = $this->_bdd->prepare('INSERT INTO Vehicles(brand, type, color, spec, doors) VALUES(:brand, :type, :color, :spec, :doors)');
        $req->bindValue(':brand', $truck->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':spec', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':doors ',$truck->getDoor(), PDO::PARAM_INT);
        $req->execute();
    }
    /**
     * delete truck by id
     *
     * @param Truck $truck
     * @return self
     */
    public function deleteTruck(Truck $truck)
    {
        $this->_bdd->exec('DELETE FROM Vehicles WHERE id = '.$truck->getId());
    }
    /**
     * get one truck by id
     *
     * @param integer $id
     * @return self
     */
    public function getTruckById(int $id)
    {
        $truck;
        $getTrucks = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $getTrucks->bindValue(':id', $id, PDO::PARAM_INT);
        $getTrucks->execute();
        $getAllTrucks = $getTrucks->fetchAll();
        foreach ($getAllTrucks as $oneTruck) {
            $truck = new Truck($oneTruck);
        }
        return $truck;
    }
    /**
     * get all trucks
     *
     * @return self
     */
    public function getTruck()
    {
        $trucks = [];
        $getTrucks = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE type = :trucks');
        $getTrucks->bindValue(':cars', 'Voiture', PDO::PARAM_STR);
        $getTrucks->execute();
        $getAllTrucks = $getTrucks->fetchAll();
        foreach ($getAllTrucks as $allTrucks) {
            $trucks[] = new Truck($allTrucks);
        }
        return $trucks;
    }
    /**
     * get all vehicle
     *
     * @return void
     */
    public function getVehicles()
    {
        $vehicles = [];
        $getTrucks = $this->_bdd->prepare('SELECT * FROM Vehicles ORDER BY id DESC');
        $getTrucks->execute();
        $getAllTrucks = $getTrucks->fetchAll();
        foreach ($getAllTrucks as $allVehicles) {
            $vehicles[] = new Truck($allVehicles);
        }
        return $vehicles;
    }
    /**
     * update object by id
     *
     * @param Truck $truck
     * @return self
     */
    public function update(Truck $truck)
    {
        $updateBdd = $this->_bdd->prepare('UPDATE Vehicles SET brand = :brand, type = :type, color = :color, spec = :spec, doors = :doors WHERE id = :id');
        $req->bindValue(':brand', $truck->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':spec', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':doors ',$truck->getDoor(), PDO::PARAM_INT);
        $updateBdd->execute();
    }
    


}