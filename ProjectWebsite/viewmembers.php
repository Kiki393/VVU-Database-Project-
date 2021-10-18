<?php
$db = mysqli_connect("localhost", "root", "", "church_mgmt");
$query ="select * from members ORDER BY id";
$result = mysqli_query($db, $query);
$query2 ="select * from contact ORDER BY id";
$result2 = mysqli_query($db, $query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Members</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
    <h1 align="center">Members Data</h1>

    <div class="table-responsive" id="employee_table">
        <table class="table table-bordered">
            <tr>
                <th width="5%">ID</th>
                <th width="25%">FName</th>
                <th width="25%">LName</th>
                <th width="25%">M.I</th>
                <th width="35%">Address</th>
                <th width="5%">Date of Birth</th>
                <th width="10%">Gender</th>
                <th width="20%">Phone Number</th>
                <th width="20%">Email</th>
            </tr>
            <?php

            while($row = mysqli_fetch_array($result) and $row2 = mysqli_fetch_array($result2))
            {
                ?>
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["FName"]; ?></td>
                    <td><?php echo $row["LName"]; ?></td>
                    <td><?php echo $row["M.I"]; ?></td>
                    <td><?php echo $row["Address"]; ?></td>
                    <td><?php echo $row["Date of Birth"]; ?></td>
                    <td><?php echo $row["Gender"]; ?></td>
                    <td><?php echo $row2["Number"]; ?></td>
                    <td><?php echo $row2["Email"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>