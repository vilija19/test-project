<?php

namespace Vilija\hw_9;

interface FormatterInterface
{
    public  function format($level, string $message, array $context = []): string;
    /**
     *
     * Creating string from message parameters for write to log
     *
     * @param mixed[] $context
     *
     * @return string
     */    
}