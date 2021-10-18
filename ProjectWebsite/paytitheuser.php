<?php include('server.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Pay Tithe</title>
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
        <h2>Pay Tithe</h2>
    </div>

    <form  method="post" action="paytitheuser.php">

        <?php include ('errors.php'); ?>
        <div class="input-group">
            <label>Date</label>
            <label>
                <input type="date" name="date">
            </label>
        </div>
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
            <label>Amount</label>
            <label>
                <input type="number" name="amount" step="any">
            </label>
        </div>
        <div class="input-group">
            <button type="submit" name="paytithe" class="btn">Pay</button>
        </div>
        <div class="home">
            <p>
                To go back, <a href="profileuser.php">Click Here</a>
            </p>
        </div>
    </form>
    </body>
    </html>
<?php

