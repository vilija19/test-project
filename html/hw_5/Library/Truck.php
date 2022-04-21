<?php
namespace Library;

class Truck extends Vehicle implements MovableInterface
{
    //Added constants
    public const MAX_WIGHT = 3500;

    //Added static 
    public static $fuelType;

    public static function setFuelType($fuelType){
        self::$fuelType = $fuelType;
    }           

    public function __construct($vendor,$maxSpeed)
    {
        $this->vendor = $vendor;
        $this->maxSpeed = $maxSpeed;
        $this->vehicleType = 'Truck';
        echo "I'm big ".$this->vehicleType.". My current speed is " . $this->speed .  "<br>";
    }

    public function currentSpeed(){
        echo 'Current Speed is ' . $this->speed . "<br>";
    }

    public function start(){
        echo 'I am starting';
    }
    public function stop(){
        echo 'I am stoping';
    } 
    public function up(int $unit){
        $this->currentSpeed();
        if ($unit > $this->maxSpeed) {
            $unit =  $this->maxSpeed;
        }
        $this->speed =   $unit;    
        echo 'Ok.Speed UP. Current speed is ' . $unit . "<br>";
    }
    public function down(int $unit){
        $this->currentSpeed();
        if ($unit < 0) {
            $unit =  0;
        }  
        $this->speed =   $unit;    
        echo 'Ok.Speed DOWN. Current speed is ' . $unit . "<br>";
    }

    public function setSpeed(int $speed){
        if ($speed > $this->speed) {
            $this->up($speed);
        }else{
            $this->down($speed);
        }
    }    

}