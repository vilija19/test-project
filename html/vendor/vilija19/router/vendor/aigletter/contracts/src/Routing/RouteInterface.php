<?php

namespace Aigletter\Contracts\Routing;

interface RouteInterface
{
    public function route(string $uri): callable;
}