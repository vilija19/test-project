<?php

//include 'Library/MovableInterface.php';
//include 'Library/Vehicle.php';
//include 'Car.php';
//include 'Truck.php';


// Added autoloader
function autoload($className) 
{
  $path = str_replace('\\','/',$className);

	$filename = __DIR__  . '/' . $path . '.php';
  if (file_exists($filename)) {
    include $filename;
  }
}

spl_autoload_register('autoload');
// Added autoloader


Library\Truck::setFuelType('Diesel');
Library\Car::setFuelType('Gas');

//Set fuel type for whole class
$truck = new Library\Truck('MAN',150, new Library\Engine('V16',300));
$car = new Library\Car('BMW',250,new Library\Engine('V8',120));
$driver = new Library\Driver('Petr',38,$car);


if (isset($_POST['set_speed']) || isset($_POST['start_point'])) {
    if($_GET['for'] == 'car'){
        $car->setSpeed((int)$_POST['set_speed']);
    }elseif($_GET['for'] == 'truck'){
        $truck->setSpeed((int)$_POST['set_speed']);
    }else{
        $driver->drive($_POST['start_point'],$_POST['finish_point']);
    }
}

echo '
<form class="generated-form"  method="POST" action="index.php?for=truck"  target="_self">
<fieldset>
  <legend> Control for '.$truck->get_vehicleType().' >>>> Fuel - '.Library\Truck::$fuelType.'</legend>
  Input speed:<input type="text" name="set_speed" value="'.$truck->get_speed().'">
  <input type="submit" value="Submit">
</fieldset>
</form>
';

echo '
<form class="generated-form"  method="POST" action="index.php?for=car"  target="_self">
<fieldset>
  <legend> Control for '.$car->get_vehicleType().' >>>> Fuel - '.Library\Car::$fuelType.'</legend>
  Input speed:<input type="text" name="set_speed" value="'.$car->get_speed().'">
  <input type="submit" value="Submit">
</fieldset>
</form>
';

echo '
<form class="generated-form"  method="POST" action="index.php?for=driver"  target="_self">
<fieldset>
  <legend> Control for dreiver >>>></legend>
  Input Start Point:<input type="text" name="start_point" value="">
  Input Finish Point:<input type="text" name="finish_point" value="">
  <input type="submit" value="Submit">
</fieldset>
</form>
';
