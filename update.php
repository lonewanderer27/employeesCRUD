<?php
include('config.php');
global $cn;

if (isset($_GET['token'])) {
    $id = $_GET['token'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $jobTitle = $_POST['jobTitle'];

    // check first if the updated values conflict with someone else's record
    $sql2 = "SELECT * FROM employees WHERE EmployeeFN = '$fname' AND EmployeeLN = '$lname' AND EmployeeID != $id";
    $rs2 = $cn->query($sql2);

    if ($rs2->num_rows != 0) {
        // a duplicate record has been found! do not proceed
        header("location:index.php?conflictError=true&fname=$fname&lname=$lname&email=$email&phone=$phone&jobTitle=$jobTitle");
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