<?php

declare(strict_types = 1);

class MotorManager
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
     * @param Motor $motor
     * @return self
     */

    public function addMotor(Motor $motor)
    {
        $req = $this->_bdd->prepare('INSERT INTO Vehicles(brand, type, color, spec, doors) VALUES(:brand, :type, :color, :spec, :doors)');
        $req->bindValue(':brand', $motor->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $motor->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $motor->getType(), PDO::PARAM_STR);
        $req->bindValue(':spec', $motor->getType(), PDO::PARAM_STR);
        $req->bindValue(':doors ',$motor->getDoor(), PDO::PARAM_INT);
        $req->execute();
    }
    /**
     * delete car by id
     *
     * @param Motor $motor
     * @return self
     */
    public function deleteMotor(Motor $motor)
    {
        $this->_bdd->exec('DELETE FROM Vehicles WHERE id = '.$motor->getId());
    }
    /**
     * get one motor by id
     *
     * @param integer $id
     * @return self
     */
    public function getMotorById(int $id)
    {
        $motor;
        $getMotors = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE id = :id');
        $getMotors->bindValue(':id', $id, PDO::PARAM_INT);
        $getMotors->execute();
        $getAllMotors = $getMotors->fetchAll();
        foreach ($getAllMotors as $oneMotor) {
            $motor = new Motor($oneMotor);
        }
        return $motor;
    }
    /**
     * get all motors
     *
     * @return self
     */
    public function getMotors()
    {
        $motors = [];
        $getMotors = $this->_bdd->prepare('SELECT * FROM Vehicles WHERE type = :motors');
        $getMotors->bindValue(':motors', 'Motorcycle', PDO::PARAM_STR);
        $getMotors->execute();
        $getAllMotors = $getMotors->fetchAll();
        foreach ($getAllMotors as $allMotors) {
            $motors[] = new Motor($allMotors);
        }
        return $motors;
    }
    /**
     * get all vehicle
     *
     * @return void
     */
    public function getVehicles()
    {
        $vehicles = [];
        $getMotors = $this->_bdd->prepare('SELECT * FROM Vehicles ORDER BY id DESC');
        $getMotors->execute();
        $getAllMotors = $getMotors->fetchAll();
        foreach ($getAllMotors as $allVehicles) {
            $vehicles[] = new Motor($allVehicles);
        }
        return $vehicles;
    }
    /**
     * update object by id
     *
     * @param Car $motor
     * @return self
     */
    public function update(Car $motor)
    {
        $updateBdd = $this->_bdd->prepare('UPDATE Vehicles SET brand = :brand, type = :type, color = :color, spec = :spec, doors = :doors WHERE id = :id');
        $req->bindValue(':brand', $motor->getBrand(), PDO::PARAM_STR);
        $req->bindValue(':type', $motor->getType(), PDO::PARAM_STR);
        $req->bindValue(':color', $motor->getType(), PDO::PARAM_STR);
        $req->bindValue(':spec', $motor->getType(), PDO::PARAM_STR);
        $req->bindValue(':doors ',$motor->getDoor(), PDO::PARAM_INT);
        $updateBdd->execute();
    }
    


}