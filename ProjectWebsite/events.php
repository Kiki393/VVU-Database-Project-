<?php
$db = mysqli_connect("localhost", "root", "", "church_mgmt");
$query = "select * from events ORDER BY ID";
$result = mysqli_query($db, $query);;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Events</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br /><br />
<div class="container" style="width:900px;">
    <h1 align="center">Events</h1>
    <div class="table-responsive" id="employee_table">
        <table class="table table-bordered">
            <tr>
                <th width="5%">ID</th>
                <th width="15%">Date</th>
                <th width="15%">Day</th>
                <th width="5%">Time</th>
                <th width="15%">Coordinator</th>
                <th width="15%">Speaker</th>
                <th width="15%">Topic</th>
            </tr>
            <?php

            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["Date"]; ?></td>
                    <td><?php echo $row["Day"]; ?></td>
                    <td><?php echo $row["Time"]; ?></td>
                    <td><?php echo $row["Coordinator"]; ?></td>
                    <td><?php echo $row["Speaker"]; ?></td>
                    <td><?php echo $row["Topic"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
