<?php
require __DIR__ . '/vendor/autoload.php';

// Load environment variables from .env if it exists
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if (file_exists('.env')) {
    $dotenv->load();
}

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