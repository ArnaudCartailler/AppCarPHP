 <?php
  include("template/header.php")
 ?>

 <ul class="list-unstyled m-5">
      <li>Type: <?php echo $objectVehicule->getType(); ?></li>
      <li>Brand: <?php echo $objectVehicule->getBrand(); ?></li>
      <li>Color : <?php echo $objectVehicule->getColor(); ?></li>
      <li>Spec : <?php echo $objectVehicule->getSpec(); ?></li>
      <li>Doors : <?php echo $objectVehicule->getDoors(); ?></li>
      <li><a class="btn btn-info" href="details.php?id=<?php echo $vehicle->getId(); ?>&type=<?php echo $vehicle->getType(); ?>">Modify</a></li>
    </ul>
 
      <button class="btn btn-info" href="details.php?id=<?php echo $vehicle->getId(); ?>&type=<?php echo $vehicle->getType(); ?>">Delete</button>

 <?php
   include("template/footer.php")
   ?>
