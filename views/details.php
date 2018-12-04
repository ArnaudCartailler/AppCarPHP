 <?php
  include("template/header.php")
 ?>
 <!-- details.php?index=<?php echo $objectVehicle->getId(); ?>&type=<?php echo $objectVehicle->getType(); ?> -->
<h1 class="ml-5">Modify the Vehicle</h1>
 <form id="FormInfo" action="" method="POST">
  <div class="form-row ml-5 m-2 w-50">
    <div class="form-group col-md-6">
      <label for="inputtext">Color</label>
      <input type="text" class="form-control" name="color" id="color" placeholder="Color" required />
    </div>
    <div class="form-group col-md-6">
      <label for="inputtext">Brand</label>
      <input type="text" class="form-control" name="brand" id="brand" placeholder="Brand" required />
    </div>
  </div>
  <div class="form-row ml-5 m-2  w-50">
    <div class="form-group col-md-6">
      <label for="inputtext">Number of doors</label>
      <input type="text" class="form-control" id="doors" name="doors" placeholder="Number of door" required />
    </div>
    <div class="form-group col-md-6">
      <label for="inputtext">Specificities</label>
      <input type="text" class="form-control" id="spec" name="spec" placeholder="Specificities" required />
    </div>
  </div>

  <button type="submit" class=" w-50 ml-5" name="button">Modify</button>
  </form>


 <ul class="list-unstyled m-5">
      <li>Type: <?php echo $objectVehicle->getType(); ?></li>
      <li>Brand: <?php echo $objectVehicle->getBrand(); ?></li>
      <li>Color : <?php echo $objectVehicle->getColor(); ?></li>
      <li>Spec : <?php echo $objectVehicle->getSpec(); ?></li>
      <li>Doors : <?php echo $objectVehicle->getDoors(); ?></li>
    </ul>
 
 
  <a class="btn btn-info ml-5" href="index.php">Back</a>

 <?php
   include("template/footer.php")
   ?>
