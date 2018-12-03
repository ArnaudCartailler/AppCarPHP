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

if (!isset($_GET['id'])) 
{
    $carManager = new CarManager($db);
    $objectVehicle = $carManager->getVehicles();
}

if (isset($_GET['id'])) {
    $takeId = $_GET['id'];
    $takeType = $_GET['type'];

    if ($takeType == "motors") 
    {
        $takeVehicle = new MotorManager($db);
        $objectVehicle = $takeVehicle->getMotorById($takeId);

    } elseif ($takeType == "cars") 
    {
        $takeVehicle = new CarManager($db);
        $objectVehicle = $takeVehicle->getCarById($takeId);

    } elseif ($takeType == "trucks") 
    {
        $takeVehicle = new TruckManager($db);
        $objectVehicle = $takeVehicle->getTruckById($takeId);
    }
}

if (isset($_GET['remove'])) 
{
    if (isset($_GET['type'])) 
    {
        $takeId = $_GET['remove'];
        $takeType = $_GET['type'];
        if ($takeType == "motors") 
        {
            $takeVehicle = new MotorManager($db);
            $objectVehicle = $takeVehicle->getMotorById($takeId);
            $removeVehicle = $takeVehicle->deleteMotor($objectVehicle);
            header('location: index.php');

            } elseif ($takeType == "cars") 
            {
                $takeVehicle = new CarManager($db);
                $objectVehicle = $takeVehicle->getCarById($takeId);
                $removeVehicle = $takeVehicle->deleteCar($objectVehicle);
                header('location: index.php');

            } elseif ($takeType == "trucks") 
            {
                $takeVehicle = new TruckManager($db);
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

if (isset($_GET['verif'])) {
$brand = htmlspecialchars($_POST['brand']);
        if (!empty($_POST['select'])) 
        {
            $color = htmlspecialchars($_POST['color']);
            if(!empty($_POST['color'])){
            $select = htmlspecialchars($_POST['select']);
            if ($_POST['doors'] >= 0) 
            {
                $doors = $_POST['doors'];
                if (!empty($_POST['spec'])) 
                {
                    $spec = htmlspecialchars($_POST['spec']);
                        if (htmlspecialchars($_POST['doors']) >= 0) 
                        {
                            if (htmlspecialchars($_POST['spec'])) 
                            {
                                $doors = intval($_POST['doors']);
                                    $spec = $_POST['spec'];
                                    if ($select == 'cars') 
                                    {
                                        $CarManager = new CarManager($db);
                                        $newCar = new Car([
                                            'brand' => $brand,
                                            'type' => $select,
                                            'doors' => $doors,
                                            'color' => $color,
                                            'spec' => $spec,
                                        ]);
                                        $addCar = $CarManager->addCar($newCar);
                                    header('location: index.php');
                                } elseif ($select == 'trucks') 
                                {
                                    $TruckManager = new TruckManager($db);
                                    $newTruck = new Truck([
                                        'brand' => $brand,
                                        'type' => $select,
                                        'doors' => $doors,
                                        'color' => $color,
                                        'spec' => $spec,
                                        ]);
                                        $addTruck = $TruckManager->addTruck($newTruck);
                                        header('location: index.php');
                                        
                                    } elseif ($select == 'motors') 
                                    {
                                        $MotorManager = new MotorManager($db);
                                        $newMotor = new Motor([
                                            'brand' => $brand,
                                            'type' => $select,
                                            'doors' => 0,
                                            'color' => $color,
                                            'spec' => $spec
                                            ]);
                                    $addMotor = $MotorManager->addMotor($newMotor);
                                    // header('location: index.php');

                                }
                                    // header('location: index.php');
                            }
                        }
                    }
                }
            }
        }
    }

include "../views/indexVue.php";
 ?>
