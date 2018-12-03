<?php


require "../model/Database.php";

function chargerClasse($classname)
{
    if (file_exists('../model/'. ucfirst($classname).'.php')) 
    {
        require '../model/'. ucfirst($classname).'.php';
    } else 
    {
        require '../entities/'. ucfirst($classname).'.php';
    }
}
spl_autoload_register('chargerClasse');

$db = Database::DB();

if (isset($_GET['id'])) {

    $takeId = $_GET['id'];
    $takeType = $_GET['type'];

 if ($takeType == "motors") 
        {
            $takeVehicle = new MotorManager($db);
            $objectVehicle = $takeVehicle->getVehicleById($takeId);

            } elseif ($takeType == "cars") 
            {
                $takeVehicle = new CarManager($db);
                $objectVehicle = $takeVehicle->getVehicleById($takeId);

            } elseif ($takeType == "trucks") 
            {
                $takeVehicle = new TruckManager($db);
                $objectVehicle = $takeVehicle->getVehicleById($takeId);
                }
        
}

include "../views/details.php";

 ?>