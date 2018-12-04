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
        $req = $this->getDb()->prepare('INSERT INTO Vehicles(brand, type, color, spec, doors) VALUES(:brand, :type, :color, :spec, :doors)');
        $req->bindValue(':brand', $truck->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $truck->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $truck->getColor(), PDO::PARAM_STR);
        $req->bindValue(':spec', $truck->getSpec(), PDO::PARAM_STR);
        $req->bindValue(':doors', $truck->getDoors(), PDO::PARAM_INT);
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
        $this->getDb()->exec('DELETE FROM Vehicles WHERE id = '.$truck->getId());
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
        $getTrucks = $this->getDb()->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $getTrucks->bindValue(':id', $id, PDO::PARAM_INT);
        $getTrucks->execute();
        $getAllTrucks = $getTrucks->fetchAll();
        foreach ($getAllTrucks as $oneTruck) {
            $truck = new Truck($oneTruck);
        }
        return $truck;
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
     * get all trucks
     *
     * @return self
     */
    public function getTruck()
    {
        $trucks = [];
        $getTrucks = $this->getDb()->prepare('SELECT * FROM Vehicles WHERE type = :trucks');
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
        $getTrucks = $this->getDb()->prepare('SELECT * FROM Vehicles ORDER BY id DESC');
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
        $req= $this->getDb()->prepare('UPDATE Vehicles SET brand = :brand, color = :color, spec = :spec, doors = :doors WHERE id = :id');
        $req->bindValue(':id', $truck->getId(), PDO::PARAM_INT);
        $req->bindValue(':brand', $truck->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':color', $truck->getColor(), PDO::PARAM_STR);
        $req->bindValue(':spec', $truck->getSpec(), PDO::PARAM_STR);
        $req->bindValue(':doors',$truck->getDoors(), PDO::PARAM_INT);
        $req->execute();
    }
    


}