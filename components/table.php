<?php
global $rs, $cn;
$sql = "SELECT * FROM employees";
// execute query
$rs = $cn->query($sql);
?>

<div class="container mt-3 mb-5">
    <?php if ($rs->num_rows > 0): ?>
        <table id="employeeList" class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Hire Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php while ($row = $rs->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['EmployeeID'] ?></td>
                    <td><?= $row['EmployeeFN'] ?></td>
                    <td><?= $row['EmployeeLN'] ?></td>
                    <td><?= $row['JobTitle'] ?></td>
                    <td><?= $row['EmployeeEmail'] ?></td>
                    <td><?= $row['EmployeePhone'] ?></td>
                    <td><?= $row['HireDate'] ?></td>
                    <td class="d-grid gap-2">
                        <a class="btn btn-warning" href="?token=<?php echo $row['EmployeeID'] ?>">Update</a>
                        <a class="btn btn-danger" href="delete.php?token=<?php echo $row['EmployeeID'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </table>
    <?php else: ?>
        <h1>No Employees Found</h1>
    <?php endif ?>
</div>