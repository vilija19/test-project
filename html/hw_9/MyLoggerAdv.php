<?php

namespace Vilija\hw_9;

use Stringable;

class MyLoggerAdv extends \Psr\Log\AbstractLogger
{
    protected $writer;

    public function __construct(WriterInterface $writerObj)
    {
        $this->writer = $writerObj;
    }


    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->writer->write($level,$message,$context);
      
    }

}