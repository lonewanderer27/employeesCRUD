<?php
$user = "seed";
$pass = "seed";
$hostname = "database";
$db = "employees";
$port = 3306;

$cn = new mysqli($hostname, $user, $pass, $db, $port);
if ($cn->connect_error) {
    die("Connection Error: " . $cn->connect_error);
}
?>