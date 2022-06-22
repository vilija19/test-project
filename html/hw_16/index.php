<?php

include __DIR__ . '/../vendor/autoload.php';

$file = '/var/log/apache2/access.log';

try {
    $fileReader = new \Vilija19\hw_16\FileHandler($file);
} catch (\Throwable $th) {
    echo 'Error! - ' . $th->getMessage() . PHP_EOL;
    exit();
}


echo 'Key: ' . (int)$fileReader->key() . '. Content - ' . $fileReader->current() . PHP_EOL;

//$fileReader->next();

echo 'Key: ' . (int)$fileReader->key() . '. Content - ' . $fileReader->current() . PHP_EOL;


exit();
