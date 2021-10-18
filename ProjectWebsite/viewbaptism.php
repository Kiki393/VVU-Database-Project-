<?php
$db = mysqli_connect("localhost", "root", "", "church_mgmt");
$query ="select * from baptism ORDER BY id";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Members To Be Baptised</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
    <h1 align="center">Members To Be Baptised Data</h1>

    <div class="table-responsive" id="employee_table">
        <table class="table table-bordered">
            <tr>
                <th width="5%">ID</th>
                <th width="25%">FName</th>
                <th width="25%">LName</th>
                <th width="25%">M.I</th>
                <th width="10%">Gender</th>
                <th width="5%">Date of Birth</th>
                <th width="20%">Phone Number</th>
            </tr>
            <?php

            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["FName"]; ?></td>
                    <td><?php echo $row["LName"]; ?></td>
                    <td><?php echo $row["MI"]; ?></td>
                    <td><?php echo $row["Gender"]; ?></td>
                    <td><?php echo $row["DOB"]; ?></td>
                    <td><?php echo $row["Phone"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
