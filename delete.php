<?php
include('config.php');
global $cn;

if (isset($_GET['token'])) {
    $id = $_GET['token'];
    $sql = "DELETE FROM employees WHERE EmployeeID=$id";
    $rs = $cn->query($sql);

    // set the route
    header("location:index.php?success=true&delete=true");

    // indicate to get function that there has been an error
    if (!$rs) {
        header("location:index.php?deleteError=true");
    }
} else {
    header("location:index.php?missingToken=true");
}
?>