<?php

namespace Vilija19\DbComponent;

include __DIR__ . '/../vendor/autoload.php';

$dbConn = new \SQLite3('logDB');

$db = new DbComponent($dbConn);
$builder = new QueryBuilder();

$query = $builder
->table('logMessages')
->select(['level', 'message'])
->where(['level' => 'notice'])
->order(['id' => 'DESC'])
->limit(4)
->build();

$message = $db->one($query);
print_r($message);
$messages = $db->all($query);
print_r($messages);
