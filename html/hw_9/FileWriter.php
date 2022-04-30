<?php
 
namespace Vilija\hw_9;

class FileWriter implements WriterInterface
{
    protected $logFile = 'logfile';
    protected $formatter;
    
    public function __construct(FormatterInterface $formaterObj,$fileName = null)
    {
        if ($fileName) {
            $this->logFile = $fileName; 
        }
        $this->formatter = $formaterObj;       
    }

    public function write($level, string $message, array $context = []): void
    {
        $messageString = $this->formatter->format($level,$message,$context);

        $handle = fopen($this->logFile, "a+");

        fwrite($handle, $messageString);

        fclose($handle);        
    }
}