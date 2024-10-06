<?php

$dbHost = getenv('DB_HOST');
$dbName = getenv('DB_DATABASE');
$dbUser = getenv('DB_USERNAME');
$dbPass = getenv('DB_PASSWORD');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8";

try {
    $connection = new PDO($dsn, $dbUser, $dbPass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection Failed: ' . $e->getMessage();
}
