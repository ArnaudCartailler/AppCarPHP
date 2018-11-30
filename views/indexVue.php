<?php
  include("template/header.php")
 ?>

<form id="FormInfo" action="AddForm.php" method="POST">
  <div class="form-row align-items-center w-50 ml-5 mt-3">
    <div class="col-12">
      <label for="inlineFormCustomSelect">Type</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="select">
        <option selected>Choose your vehicule</option>
        <option id="car" value="1" name="car">Car</option>
        <option id="truck" value="2" name="truck">Truck</option>
        <option id="motor" value="3" name="motor">Motorcycle</option>
      </select>
    </div>
  </div>
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

  <button type="submit" class=" w-50 ml-5">Send the vehicle</button>
  </form>

  <?php foreach ($objectVehicle as $vehicle) {
              ?>

    <ul class="list-unstyled mt-3">
      <li>Nom du véhicule: <?php echo $vehicle->getBrand(); ?></li>
      <li>Couleur: <?php echo $vehicle->getColor(); ?></li>
      <li><a class="btn btn-info" href="index.php?id=<?php echo $vehicle->getId(); ?>&type=<?php echo $vehicle->getType(); ?>">Voir plus -></a></li>
    </ul>

<?php
        } ?>

 <?php
   include("template/footer.php")
  ?>
