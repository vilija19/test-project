<?php
namespace Library;

class Engine
{

    protected $engineType;
    protected $power;

    public function __construct($engineType,$power)
    {
        $this->engineType = $engineType;
        $this->power = $power;
    }

    public function start()
    {
        echo "Engine ON <br>"; 
    }

    public function stop()
    {
        echo "Engine OFF <br>"; 
    }   
}