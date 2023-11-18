<?php
require __DIR__ . '/vendor/autoload.php';

// load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$hostname = $_ENV['DB_HOST'];
$db = $_ENV['DB_NAME'];
$port = $_ENV['DB_PORT'];

$cn = new mysqli($hostname, $user, $pass, $db, $port);
if ($cn->connect_error) {
    die("Connection Error: " . $cn->connect_error);
}
?>