<?php
namespace Library;

class Car extends Vehicle implements MovableInterface
{
    //Added constants
    public const MAX_WIGHT = 1500;

    //Added static 
    public static $fuelType;

    protected $engine;
    protected $transmission;

    public static function setFuelType($fuelType){
        self::$fuelType = $fuelType;
    }       

    public function __construct($vendor,$maxSpeed,Engine $engine)
    {
        $this->vendor = $vendor;
        $this->maxSpeed = $maxSpeed;
        $this->vehicleType = 'Sport Car';
        echo "I'm ".$this->vehicleType.". My current speed is " . $this->speed . "<br>";
        $this->engine = $engine;// <<<<<<<
        $this->transmission = new Transmission('manual',5);// <<<<<<<
    }

    public function currentSpeed()
    {
        echo 'Current Speed is ' . $this->speed . "<br>";
    }
    
    public function start()
    {
        $this->engine->start();// <<<<<<<
        echo 'I am starting';
    }
    public function stop()
    {
        $this->engine->stop();// <<<<<<<
        echo 'I am stoping';
    } 
    public function up(int $unit)
    {
        $this->currentSpeed();
        if ($unit > $this->maxSpeed) {
            $unit =  $this->maxSpeed;
            $this->transmission->gearUp();// <<<<<<<
        }
        $this->speed =   $unit;    
        echo 'Ok.Speed UP. Current speed is ' . $unit. "<br>";
    }
    public function down(int $unit)
    {
        $this->currentSpeed();
        $this->speed =   $unit;    
        if ($unit < 0) {
            $unit =  0;
        }else{
            $this->transmission->gearDown();// <<<<<<<
        }
        echo 'Ok.Speed DOWN. Current speed is ' . $unit. "<br>";
    }

    public function setSpeed(int $speed)
    {
        if ($speed > $this->speed) {
            $this->up($speed);
        }else{
            $this->down($speed);
        }
    }   

}