<?php
 
namespace Vilija\hw_9;

class DbFormatter implements FormatterInterface
{

    public function format($level, string $message, array $context = []): string
    {
        $logString = '';
        $logString .= date("d-m-y H:i:s") . ' message: ' . $message;
        if (!empty($context)) { 
            foreach ($context as $key => $value) {
                $logString .= ' ' . $key . ' - ' . $value;
            }
        }
        $logString .= PHP_EOL;
        echo $logString;
        return $logString;
    }
}