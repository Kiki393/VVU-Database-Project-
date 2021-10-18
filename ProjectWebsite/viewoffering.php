<?php
$db = mysqli_connect("localhost", "root", "", "church_mgmt");
$query ="select * from offering ORDER BY id";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Offering</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
    <h1 align="center">Offering Data</h1>

    <div class="table-responsive" id="employee_table">
        <table class="table table-bordered">
            <tr>
                <th width="5%">ID</th>
                <th width="25%">Date</th>
                <th width="25%">FName</th>
                <th width="25%">LName</th>
                <th width="25%">M.I</th>
                <th width="20%">Amount</th>
            </tr>
            <?php

            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["Date"]; ?></td>
                    <td><?php echo $row["FName"]; ?></td>
                    <td><?php echo $row["LName"]; ?></td>
                    <td><?php echo $row["MI"]; ?></td>
                    <td><?php echo $row["Amount"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>