<?php

namespace Vilija19\passgen;

include __DIR__ . '/../vendor/autoload.php';

$passGen = new Passgen();

echo $passGen->genRandomPassword(12) . PHP_EOL;