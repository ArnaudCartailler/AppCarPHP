<!-- <?php

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


        $brand = htmlspecialchars($_POST['brand']);
        if (!empty($_POST['select'])) 
        {
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
                                    header('location : index.php');
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
                                    header('location : index.php');

                                } elseif ($_POST['select'] == 'Motor') 
                                {
                                    $MotorManager = new MotorManager($db);
                                    $newMotor = new Motor([
                                        'brand' => $brand,
                                        'type' => $select,
                                        'doors' => 0,
                                        'spec' => $spec,
                                    ]);
                                    $addMotor = $MotorManager->addMotor($newMotor);
                                    header('location : index.php');

                                }
                                    header('location : index.php');
                            }
                        }
                    }
                }
            }
 -->
