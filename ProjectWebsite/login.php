<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
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
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
        <?php include ('errors.php'); ?>

        <div class="input-group">
            <label>Username</label>
            <label>
                <input type="text" name="username" >
            </label>
        </div>
        <div class="input-group">
            <label>Password</label>
            <label>
                <input type="password" name="password">
            </label>
        </div>
        <div class="input-group">
             <button type="submit" class="btn" name="login">Login</button>
        </div>
        <div class="reset">
            <p>
                Forgot password? <a href="forgot%20password.php">Reset Password</a>
            </p>
        </div>
        <div class="signup">
            <p>
                Not a member? <a href="registration.php">Sign Up</a>
            </p>
        </div>
        <div class="home">
            <p>
                Return home? <a href="index.php">Click Here</a>
            </p>
        </div>
        </form>

</body>
</html>


<?php

