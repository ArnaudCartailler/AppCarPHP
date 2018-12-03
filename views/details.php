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
 
 <?php
   include("template/footer.php")
   ?>
