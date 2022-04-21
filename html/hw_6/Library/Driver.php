<?php
namespace Library;

class Driver
{
    protected $name;
    protected $age;
    protected $car;

    public function __construct($name,$age,Car $car)
    {
       $this->name = $name;
       $this->age = $age;
       $this->car = $car; 
       echo "Hello. I'm your driver. My name is ".$this->name.". My car is " . $this->car->get_vendor() . "<br>";
    }

    public function drive(string $a,string $b)
    {
        $this->car->start();
        $this->car->up(100);
        $this->car->down(1);
        $this->car->stop();
        echo 'You are was transfered from ' . $a . ' to ' . $b . '<br> Bye, Bye<br>';
    }

}