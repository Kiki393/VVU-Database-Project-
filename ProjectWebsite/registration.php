<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Member registration</title>
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
        <h2>Register</h2>
    </div>

    <form  method="post" action="registration.php">

        <?php include ('errors.php'); ?>

        <div class="input-group">
            <label>Username</label>
            <label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </label>
        </div>
        <div class="input-group">
            <label>Password</label>
            <label>
                <input type="password" name="password_1">
            </label>
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <label>
                <input type="password" name="password_2">
            </label>
        </div>
        <div class="input-group">
             <button type="submit" name="register" class="btn">Register</button>
        </div>
        <div class="login">
            <p>
                Already a member? <a href="login.php">Login</a>
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
