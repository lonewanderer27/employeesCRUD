<?php
    $user = "root";
    $pass = "";
    $server = "database";
    $db = "employees";
    $port = 3306;

    $cn = new mysqli($server, $user, $db, $port);
    if ($cn->connect_error) {
        die("Connection Error: " . $cn->connect_error);
    }
?>