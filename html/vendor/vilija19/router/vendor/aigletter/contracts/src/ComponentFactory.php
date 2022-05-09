<?php

namespace Aigletter\Contracts;

abstract class ComponentFactory
{
    protected $arguments;

    public function __construct($arguments = [])
    {
        $this->arguments = $arguments;
    }

    public function createComponent()
    {
        return $this->createConcreteComponent();
    }

    abstract protected function createConcreteComponent();
}