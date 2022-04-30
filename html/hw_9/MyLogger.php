<?php

namespace Vilija\hw_9;

use Stringable;

class MyLogger extends \Psr\Log\AbstractLogger
{
    private $logFile = 'logfile';

    public function __construct($fileName = null)
    {
        if ($fileName) {
            $this->logFile = $fileName; 
        }
    }

    protected function write($logString)
    {
        $handle = fopen($this->logFile, "a+");
        fwrite($handle, $logString); 
        fclose($handle); 
    }

    protected function format($level, string|Stringable $message, array $context = [])
    {
        $logString = '';
        $logString .= date("d-m-y H:i:s") . ' level-*' . strtoupper($level) . '* message: ' . $message;
        if (!empty($context)) { 
            foreach ($context as $key => $value) {
                $logString .= ' ' . $key . ' - ' . $value;
            }
        }
        $logString .= PHP_EOL;
        echo $logString;
        return $logString;
    }

    public function log($level, string|Stringable $message, array $context = []): void
    {

        $this->write($this->format($level,$message,$context));
      
    }

}