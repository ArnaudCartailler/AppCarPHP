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


if (isset($_POST['button'])) 
{

$takeType = $_GET['type'];

$brand = htmlspecialchars($_POST['brand']);

            if(!empty($_POST['color'])){
            if ($_POST['doors'] >= 0) 
            {
                $color = htmlspecialchars($_POST['color']);
                $doors = $_POST['doors'];
                if (!empty($_POST['spec'])) 
                {
                    $spec = htmlspecialchars($_POST['spec']);
                        if (htmlspecialchars($_POST['doors']) >= 0) 
                        {
                            if (htmlspecialchars($_POST['spec'])) 
                            {
                                $doors = intval($_POST['doors']);
                                    if ($takeType == 'cars') 
                                    {
                                    $CarManager = new CarManager($db);
                                    $objectVehicle = $CarManager->getVehicleById($takeId);
                                        $objectVehicle->hydrate(array(
                                            'brand' => $brand,
                                            'doors' => $doors,
                                            'color' => $color,
                                            'spec' => $spec
                                        ));
                                    $updateCar = $CarManager->update($objectVehicle);
                                } elseif ($takeType == 'trucks') 
                                {
                                    $TruckManager = new TruckManager($db);
                                    $objectVehicle = $TruckManager->getVehicleById($takeId);
                                        $objectVehicle->hydrate(array(
                                            'brand' => $brand,
                                            'doors' => $doors,
                                            'color' => $color,
                                            'spec' => $spec
                                        ));
                                    $updateTruck = $TruckManager->update($objectVehicle);

                                        
                                    } elseif ($takeType == 'motors') 
                                    {
                                        $MotorManager = new MotorManager($db);
                                        $objectVehicle = $MotorManager->getVehicleById($takeId);
                                    $objectVehicle->hydrate(array(
                                            'brand' => $brand,
                                            'doors' => $doors,
                                            'color' => $color,
                                            'spec' => $spec
                                        ));
                                    $updateMotor = $MotorManager->update($objectVehicle);

                                }
                            }
                        }
                    }
                }
            }
        }
// }

include "../views/details.php";

 ?>