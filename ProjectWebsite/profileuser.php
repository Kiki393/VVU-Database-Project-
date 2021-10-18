<?php
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: index.php");
    }
?>
<html lang="en">
<head>
    <title> Church Management Site</title>
    <link href="profile.css" rel="stylesheet" type="text/css">

</head>
<body>
<header>
    <div class="row">
        <div class="logo">
            <img src="VVU%20logo.png" alt="logo">
        </div>
    </div>

    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
            </h3>
        </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index.php?logout='1'" style="color: red; text-decoration: none;">logout</a> </p>
        <?php endif ?>
    </div>

    <div class="button">
        <a href="accountuser.php" class="btn btn-row">Home</a>
        <a href="events.php" class="btn btn-row">Events</a>
    </div>

    <div class="hero">
        <h1>To the Glory of God</h1>
        <h2>User Dashboard</h2>
    </div>

    <div class="button">
        <a href="profileupdate.php" class="btn btn-one">Update Info</a>
        <a href="userloginupdate.php" class="btn btn-one">Update Login Details</a>
        <a href="paytitheuser.php" class="btn btn-one">Pay Tithe</a>
        <a href="payofferinguser.php" class="btn btn-one">Pay Offering</a>
        <a href="prayerrequest.php" class="btn btn-one">Submit Prayer Request</a>
    </div>

</header>
</body>
</html>