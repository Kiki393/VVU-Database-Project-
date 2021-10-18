<?php
$db = mysqli_connect("localhost", "root", "", "church_mgmt");
$query ="select * from prayerrequests ORDER BY id";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Prayer Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
    <h1 align="center">Prayer Requests Data</h1>

    <div class="table-responsive" id="employee_table">
        <table class="table table-bordered">
            <tr>
                <th width="5%">ID</th>
                <th width="25%">First Request</th>
                <th width="25%">Second Request</th>
                <th width="25%">Third Request</th>
            </tr>
            <?php

            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["First"]; ?></td>
                    <td><?php echo $row["Second"]; ?></td>
                    <td><?php echo $row["Third"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>