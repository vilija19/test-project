<?php

include 'MovableInterface.php';
include 'Vehicle.php';
include 'Car.php';
include 'Truck.php';



$truck = new Truck('MAN',150);
$car = new Car('BMW',250);

if (isset($_POST['set_speed'])) {
    if($_GET['for'] == 'car'){
        $car->setSpeed((int)$_POST['set_speed']);
    }else{
        $truck->setSpeed((int)$_POST['set_speed']);
    }
}

echo '
<form class="generated-form"  method="POST" action="index.php?for=truck"  target="_self">
<fieldset>
  <legend> Control for '.$truck->get_vehicleType().' </legend>
  Input speed:<input type="text" name="set_speed" value="'.$truck->get_speed().'">
  <input type="submit" value="Submit">
</fieldset>
</form>
';

echo '
<form class="generated-form"  method="POST" action="index.php?for=car"  target="_self">
<fieldset>
  <legend> Control for '.$car->get_vehicleType().' </legend>
  Input speed:<input type="text" name="set_speed" value="'.$car->get_speed().'">
  <input type="submit" value="Submit">
</fieldset>
</form>
';

