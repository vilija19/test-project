<?php

namespace Vilija\hw_9;

use Stringable;

class MyLoggerMult extends \Psr\Log\AbstractLogger
{
    protected $writers;

    public function __construct(array $writersArray)
    {
        $this->writers = $writersArray;
    }


    public function log($level, string|Stringable $message, array $context = []): void
    {
        foreach ($this->writers as $writer) { 
            $writer->write($level,$message,$context);
        }
    }

}