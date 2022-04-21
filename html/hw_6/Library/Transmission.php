<?php
namespace Library;

class Transmission
{

    protected $transmissionType;
    protected $maxSteps;
    protected $currentStep;

    public function __construct($transmissionType,$maxSteps)
    {
        $this->transmissionType = $transmissionType;
        $this->maxSteps = $maxSteps;
        $this->currentStep = 0;
    }    

    public function setNeutral()
    {
        echo "Transmission is off<br>"; 
    }

    public function gearUp()
    {
        if ($this->currentStep < $this->maxSteps) {
            $this->currentStep++;
            echo "Gear is UP  <br>"; 
        }else{
            echo "You on the max step <br>"; 
        }
        echo "Current step is " . $this->currentStep . '<br>'; 
    }   

    public function gearDown()
    {
        if ($this->currentStep > 0) {
            $this->currentStep--;
            echo "Gear is DOWN  <br>"; 
        }else{
            echo "You on the lowest step <br>"; 
        }
        echo "Current step is " . $this->currentStep. '<br>'; 
    }     
}