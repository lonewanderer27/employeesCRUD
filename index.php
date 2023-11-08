<?php
global $cn;
include("config.php");

// fetch variables
$id = $_GET['token'] ?? null;
$fname = $_GET['fname'] ?? '';
$lname = $_GET['lname'] ?? '';
$email = $_GET['email'] ?? '';
$phone = $_GET['phone'] ?? '';
$jobTitle = $_GET['jobTitle'] ?? '';
$action = '';

// if token is there, we're on update mode!
if (isset($id)) {
    // set the action attribute for form
    $action = "update.php?token=$id";

    $sql2 = "SELECT * FROM employees WHERE EmployeeID=$id";
    $rs2 = $cn->query($sql2);
    if ($rs2->num_rows > 0) {
        $row = $rs2->fetch_assoc();
        $fname = $row['EmployeeFN'];
        $lname = $row['EmployeeLN'];
        $email = $row['EmployeeEmail'];
        $phone = $row['EmployeePhone'];
        $jobTitle = $row['JobTitle'];
    } else {
        echo $cn->error;
    }
} else {
    $action = 'add.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Management Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
</head>
<body class="">
<div class="container mt-5">
    <h1>Employee Management Software</h1>
    <?php include('components/alert.php') ?>
    <form action="<?= $action ?>" method="POST" class="d-flex my-4">
        <div class="d-flex">
            <input type="text" name="fname" placeholder="Enter First Name" value="<?php echo $fname ?>" required
                   class="form-control me-2">
            <input type="text" name="lname" placeholder="Enter Last Name" value="<?php echo $lname ?>" required
                   class="form-control me-2">
            <input type="email" name="email" placeholder="Enter Email" value="<?php echo $email ?>" required
                   class="form-control me-2">
            <input type="text" name="jobTitle" placeholder="Enter Job Title" value="<?php echo $jobTitle ?>" required
                   class="form-control me-2">
            <input type="text" name="phone" placeholder="Enter Contact No" value="<?php echo $phone ?>" required
                   class="form-control me-2"><br/>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <button class="btn <?= (isset($id)) ? 'btn-warning' : 'btn-primary' ?>">
                <?= (isset($id)) ? 'UPDATE' : 'SAVE' ?>
            </button>
        </div>
    </form>
</div>
<?php include('components/table.php') ?>
</body>
</html>