<?php
  include("template/header.php")
 ?>

<form id="FormInfo">
  <div class="form-row align-items-center w-50 ml-5 mt-3">
    <div class="col-12">
      <label for="inlineFormCustomSelect">Type</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Choose your vehicule</option>
        <option id="car" value="1" name="car">Car</option>
        <option id="truck" value="2" name="truck">Truck</option>
        <option id="motorcycle" value="3" name="motor" onchange="disable()">Motorcycle</option>
      </select>
    </div>
  </div>
  <div class="form-row ml-5 m-2 w-50">
    <div class="form-group col-md-6">
      <label for="inputtext">Color</label>
      <input type="text" class="form-control" id="color" placeholder="Color" required />
    </div>
    <div class="form-group col-md-6">
      <label for="inputtext">Brand</label>
      <input type="text" class="form-control" id="brand" placeholder="Brand" required />
    </div>
  </div>
  <div class="form-row ml-5 m-2  w-50">
    <div class="form-group col-md-6">
      <label for="inputtext">Number of door</label>
      <input type="text" class="form-control" id="door" placeholder="Number of door" required />
    </div>
    <div class="form-group col-md-6">
      <label for="inputtext">Specificities</label>
      <input type="text" class="form-control" id="spec" placeholder="Specificities" required />
    </div>
  </div>
  </form>

  

 <?php
   include("template/footer.php")
  ?>
