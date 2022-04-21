<?php
namespace Library;

class Engine{

    protected $engineType;
    protected $power;

    public function __construct($engineType,$power)
    {
        $this->engineType = $engineType;
        $this->power = $power;
    }

    public function start()
    {
        echo "I'm have started "; 
    }

    public function stop()
    {
        echo "I'm have stoped "; 
    }   
}