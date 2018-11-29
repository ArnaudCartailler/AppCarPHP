<?php


require "../model/Database.php";

function chargerClasse($classname)
{
    if (file_exists('../model/'. ucfirst($classname).'.php')) {
        require '../model/'. ucfirst($classname).'.php';
    } else {
        require '../entities/'. ucfirst($classname).'.php';
    }
}
spl_autoload_register('chargerClasse');

$bdd = Database::BDD();

if (!isset($_GET['id'])) 
{
    $carManager = new CarManager($bdd);
    $objectVehicle = $carManager->getVehicles();
}
if (isset($_GET['id'])) {
    $takeId = $_GET['id'];
    $takeType = $_GET['type'];

    if ($takeType == "Motorcycle") 
    {
        $takeVehicle = new MotorManager($bdd);
        $objectVehicle = $takeVehicle->getMotorById($takeId);

    } elseif ($takeType == "Car") 
    {
        $takeVehicle = new CarManager($bdd);
        $objectVehicle = $takeVehicle->getCarById($takeId);

    } elseif ($takeType == "Truck") 
    {
        $takeVehicle = new TruckManager($bdd);
        $objectVehicle = $takeVehicle->getTruckById($takeId);
    }
}

if (isset($_GET['remove'])) 
{
    if (isset($_GET['type'])) 
    {
        $takeId = $_GET['remove'];
        $takeType = $_GET['type'];
        if ($takeType == "Motorcycle") 
        {
            $takeVehicle = new MotorManager($bdd);
            $objectVehicle = $takeVehicle->getMotorById($takeId);
            $removeVehicle = $takeVehicle->deleteMotor($objectVehicle);
            header('location: index.php');

        } elseif ($takeType == "Car") 
        {
            $takeVehicle = new CarManager($bdd);
            $objectVehicle = $takeVehicle->getCarById($takeId);
            $removeVehicle = $takeVehicle->deleteCar($objectVehicle);
            header('location: index.php');

        } elseif ($takeType == "Truck") 
        {
            $takeVehicle = new TruckManager($bdd);
            $objectVehicle = $takeVehicle->getTruckById($takeId);
            $removeVehicle = $takeVehicle->deleteTruck($objectVehicle);
            header('location: index.php');
        } else 
        {
            header('location: index.php');
        }
    } else 
    {
        header('location: index.php');
    }
}


include "../views/indexVue.php";
 ?>
