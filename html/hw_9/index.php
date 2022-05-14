<?php

namespace Vilija\hw_9;

/**
 * Level 1 part start
 */
include __DIR__ . '/../vendor/autoload.php';

function summa($a,$b,$logger)
{
    $logger->notice('Got values',['arg1' => $a,'arg2' => $b]);
    $sum = $a + $b;
    $logger->notice('Result ' . $sum);
    return $sum;
}

$logger = new MyLogger('hw_9_log');
summa(2,2,$logger);

/**
 * Level 1 part end
 */

/**
 * Level 2 part start
 */
$formatter = new FileFormatter();
$writer = new FileWriter($formatter,'hw_9_log');
$advLogger = new MyLoggerAdv($writer);

summa(6,2,$advLogger);

/**
 * Level 2 part end
 */

 /**
 * Level 3 part start
 */

$writers = array(
    'DbWriter'      => new DbWriter(new DbFormatter(),'logDB'),
    'DbFormatter'   => new FileWriter(new FileFormatter(),'hw_9_log') 
);
$multLogger = new MyLoggerMult($writers);

summa(16,12,$multLogger);

/**
 * Level 3 part end
 */