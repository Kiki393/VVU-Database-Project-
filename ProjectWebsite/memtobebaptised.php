<?php include('server.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Add Members To Be Baptised</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            a:link, a:visited {
                background-color: #5F9EA0;
                color: white;
                padding: 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                border: none;
                border-radius: 5px;
            }
            a:hover, a:active {
                background-color: #407173;
            }
        </style>
    </head>
    <body class="body">
    <div class="header">
        <h2>Add Members To Be Baptised</h2>
    </div>

    <form  method="post" action="memtobebaptised.php">

        <?php include ('errors.php'); ?>
        <div class="input-group">
            <label>First Name</label>
            <label>
                <input type="text" name="fname">
            </label>
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <label>
                <input type="text" name="lname">
            </label>
        </div>
        <div class="input-group">
            <label>Middle Initials</label>
            <label>
                <input type="text" name="mi">
            </label>
        </div>
        <div class="input-group">
            <label>Gender</label>
            <label>
                <input type="text" name="gender">
            </label>
        </div>
        <div class="input-group">
            <label>Date of Birth</label>
            <label>
                <input type="date" name="dob">
            </label>
        </div>
        <div class="input-group">
            <label>Phone Number</label>
            <label>
                <input type="number" name="phone" min="0">
            </label>
        </div>
        <div class="input-group">
            <button type="submit" name="add_bap" class="btn">Add</button>
        </div>
        <div class="home">
            <p>
                To go back, <a href="profileadmin.php">Click Here</a>
            </p>
        </div>
    </form>
    </body>
    </html>
<?php

