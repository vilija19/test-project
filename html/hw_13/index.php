<?php
/**
 * Пример работы с пакетом vilija19/db_component
 * Пакет расчитан на работу с БД SQLite
 * Файл БД logDB скопирован с ДЗ 9 и содержит записи логов
 * 
 * В билдере могут отсутствовать методы ->where, ->order , ->limit , ->offset .
 * Остальные методы обязательны. 
 * 
 * @package vilija19/db_component
 */

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
