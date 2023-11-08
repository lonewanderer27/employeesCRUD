<?php
include('config.php');
global $cn;

if (isset($_GET['token'])) {
    $id = $_GET['token'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $jobTitle = trim($_POST['jobTitle']);

    // check first if the updated values conflict with someone else's record
    $sql2 = "SELECT * FROM employees WHERE EmployeeFN = '$fname' AND EmployeeLN = '$lname' AND EmployeeID != $id";
    $rs2 = $cn->query($sql2);

    if ($rs2->num_rows != 0) {
        // a duplicate record has been found! do not proceed
        header("location:index.php?conflictError=true");
        return;
    }

    $sql = "UPDATE employees SET EmployeeFN = '$fname', EmployeeLN = '$lname', Employeeemail = '$email', Employeephone = '$phone', JobTitle = '$jobTitle'
                WHERE EmployeeID = $id";
    $rs = $cn->query($sql);

    // set the route
    header("location:index.php?success=true&update=true");

    // indicate to get function that there has been an error
    if (!$rs) {
        header("location:index.php?updateError=true");
    }
} else {
    header("location:index.php?missingToken=true");
}
?>