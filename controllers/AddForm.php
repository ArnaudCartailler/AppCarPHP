<?php

require "../model/Database.php";

function chargerClasse($classbrand)
{
    if (file_exists('../model/'. ucfirst($classbrand).'.php')) 
    {
        require '../model/'. ucfirst($classbrand).'.php';

    } else 
    {
        require '../entities/'. ucfirst($classbrand).'.php';

    }
}

spl_autoload_register('chargerClasse');

$db = Database::DB();


if (isset($_GET['verif'])) 
{
    if (!empty($_POST['brand'])) 
    {
        $brand = htmlspecialchars($_POST['brand']);
        if (!empty($_POST['select'])) 
        {
            $select = htmlspecialchars($_POST['select']);
            if ($_POST['doors'] >= 0) 
            {
                $doors = htmlspecialchars($_POST['doors']);
                if (!empty($_POST['spec'])) 
                {
                    $spec = htmlspecialchars($_POST['spec']);
                        if (intval($_POST['doors']) >= 0) 
                        {
                            if (intval($_POST['spec']) >= 0) 
                            {
                                $doors = intval($_POST['doors']);
                                $spec = intval($_POST['spec']);
                                if ($_POST['select'] == 'Car') 
                                {
                                    $CarManager = new CarManager($db);
                                    $newCar = new Car([
                                        'brand' => $brand,
                                        'type' => $select,
                                        'doors' => $doors,
                                        'spec' => $spec,
                                    ]);
                                    $addCar = $CarManager->addCar($newCar);
                                } elseif ($_POST['select'] == 'Truck') 
                                {
                                    $TruckManager = new TruckManager($db);
                                    $newTruck = new Truck([
                                        'brand' => $brand,
                                        'type' => $select,
                                        'doors' => $doors,
                                        'spec' => $spec,
                                    ]);
                                    $addTruck = $TruckManager->addTruck($newTruck);
                                } elseif ($_POST['select'] == 'Motor') 
                                {
                                    $MotorManager = new MotorManager($db);
                                    $newMotorbike = new Motor([
                                        'brand' => $brand,
                                        'type' => $select,
                                        'doors' => 0,
                                        'spec' => $spec,
                                    ]);
                                    $addMotorbike = $MotorManager->addMotor($newMotorbike);
                                }
                                header('URL=AddForm.php');
                            }
                        }
                    }
                }
            }
        }
}
require "../views/indexVue.php";