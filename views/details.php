 <?php
  include("template/header.php")
 ?>

 <ul class="list-unstyled m-5">
      <li>Type: <?php echo $objectVehicle->getType(); ?></li>
      <li>Brand: <?php echo $objectVehicle->getBrand(); ?></li>
      <li>Color : <?php echo $objectVehicle->getColor(); ?></li>
      <li>Spec : <?php echo $objectVehicle->getSpec(); ?></li>
      <li>Doors : <?php echo $objectVehicle->getDoors(); ?></li>
    </ul>
 
      <button class="btn btn-info" href="delete.php?id=<?php echo $vehicle->getId(); ?>&type=<?php echo $vehicle->getType(); ?>">Delete</button>

 <?php
   include("template/footer.php")
   ?>
