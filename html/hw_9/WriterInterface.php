<?php

namespace Vilija\hw_9;

interface WriterInterface
{
    public  function write($level, string $message, array $context = []): void;

}