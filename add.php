<?php
include('config.php');
global $cn, $fname, $lname, $email, $phone, $jobTitle;
$date_now = date("Y-m-d");

if (isset($_POST['fname'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $jobTitle = trim($_POST['jobTitle']);

    // find duplicates first
    $sql = "SELECT EmployeeID FROM employees WHERE EmployeeFN = '$fname' AND EmployeeLN = '$lname'";
    $rs = $cn->query($sql);

    if ($rs->num_rows == 0) {
        // no duplicate record has been found! proceed
        $sql2 = "INSERT INTO employees (EmployeeFN, EmployeeLN, EmployeeEmail, EmployeePhone, HireDate, ManagerID, JobTitle) 
            VALUES ('$fname', '$lname', '$email', '$phone', '$date_now', 50, '$jobTitle')";
        $rs2 = $cn->query($sql2);

        // set the route
        header("location:index.php?success=true&add=true");

        // indicate to get function that there has been an error
        if (!$rs2) {
            header("location:index.php?addError=true");
        }
    } else {
        // return duplicate error as well as the values so that it can be displayed again in index.php page!
        header("location:index.php?duplicate=true&fname=$fname&lname=$lname&email=$email&phone=$phone&jobTitle=$jobTitle");
    }
}
?>