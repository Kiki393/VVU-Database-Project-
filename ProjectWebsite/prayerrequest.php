<?php include('server.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Prayer Request</title>
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
        <h2>Submit Prayer Request</h2>
        <h2>Please limit each request to 150 characters. Thank you.</h2>
    </div>

    <form  method="post" action="prayerrequest.php">

        <?php include ('errors.php'); ?>

        <div class="input-group">
            <label>First:</label>
            <label>
                <textarea class="userInput" name="req1"></textarea>
            </label>
        </div>
        <div class="input-group">
            <label>Second:</label>
            <label>
                <textarea class="userInput" name="req2"></textarea>
            </label>
        </div>
        <div class="input-group">
            <label>Third:</label>
            <label>
                <textarea class="userInput" name="req3"></textarea>
            </label>
        </div>
        <div class="input-group">
            <button type="submit" name="prayreq" class="btn">Submit</button>
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

