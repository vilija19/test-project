<?php
namespace Library;

abstract class Vehicle
{
    protected $speed = 0;
    protected $vendor;
    protected $maxSpeed;
    protected $vehicleType;

    abstract public function setSpeed(int $speed);

    abstract public function currentSpeed();
    
    public function get_vehicleType(){
        return $this->vehicleType;
    }

    public function get_speed(){
        return $this->speed;
    }  

}