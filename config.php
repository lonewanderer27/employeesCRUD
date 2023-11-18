<?php
require __DIR__ . '/vendor/autoload.php';

// Load environment variables from .env if it exists
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if (file_exists('.env')) {
    $dotenv->load();
}

$user = getenv('DB_USER') ?: 'seed';
$pass = getenv('DB_PASS') ?: 'seed';
$hostname = getenv('DB_HOST') ?: 'database';
$db = getenv('DB_NAME') ?: 'employees';
$port = getenv('DB_PORT') ?: 3306;

$cn = new mysqli($hostname, $user, $pass, $db, $port);
if ($cn->connect_error) {
    die("Connection Error: " . $cn->connect_error);
}
?>