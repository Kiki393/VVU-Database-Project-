<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();

//connecting to mysql
    $db = mysqli_connect("localhost", "root", "", "church_mgmt");

// Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Register user
//If the register button is clicked
    if (isset($_POST['register'])){
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        //ensuring required fields
        if (empty($username)) {
            array_push($errors, "Username is required.");
        }
        if (empty($password_1)){
            array_push($errors, "Password is required.");
        }

        if ($password_1 != $password_2){
            array_push($errors, "The two passwords do not match");
        }

        //check if user already exists
        $user_check_query = "select * from users where username = '$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }

        //if no errors, save to the database
        if (count($errors) == 0){
            $sql = "insert into users 
                    values ('', '$username', '$password_1', '')";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have been successfully registered");
            }
        }
    }

// Login user
//If the login button is clicked
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            array_push($errors, "Username is required.");
        }
        if (empty($password)) {
            array_push($errors, "Password is required.");
        }

        if (count($errors) == 0) {
            $sql = "select * from users where username='$username' and password='$password'";
            $results = mysqli_query($db, $sql);

            $sql_query= "select acctype from users where username='$username'";
            $sql_result = mysqli_query($db, $sql_query);
            $account = mysqli_fetch_assoc($sql_result);

            if (mysqli_num_rows($results) == 1) {
                if ($account['acctype'] === "admin"){
                    $_SESSION['username'] = $username;
                    header('location: profileadmin.php');
                }
                if ($account['acctype'] === "user" or $account['acctype'] == empty('acctype')){
                    $_SESSION['username'] = $username;
                    header('location: profileuser.php');
                }
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }

//Password reset
//If the reset button is clicked
    if (isset($_POST['reset'])){
        $username = $_POST['username'];
        $password_3 = $_POST['password_3'];
        $password_4 = $_POST['password_4'];

        //ensuring required fields
        if (empty($password_3)) {
            array_push($errors, "Password is required.");
        }
        if (empty($password_4)){
            array_push($errors, "You need to confirm the password.");
        }

        if ($password_3 != $password_4){
            array_push($errors, "The two passwords do not match");
        }

        //check if username doesn't exist
        $user_check_query = "select * from users where username = '$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user == 0) {
            array_push($errors, "Username does not exist");
        }else{
            //if no errors, save to the database
            if (count($errors) == 0){
                $sql = "update users set password = '$password_3' where username = '$username'";
                $results  = mysqli_query($db, $sql);

                if ($results == 1) {
                    array_push($errors, "You have successfully reset your password.");
                }else {
                    array_push($errors, "Something went wrong. Please try again later.");
                }
            }
        }
    }

//Edit Users
//If the update button is clicked
    if (isset($_POST['update'])){
        $ID = $_POST['ID'];
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        $acctype = $_POST['acctype'];

        //ensuring required fields
        if (empty($ID)) {
            array_push($errors, "ID is required.");
        }
        if (empty($username)) {
            array_push($errors, "Username is required.");
        }
        if (empty($password_1)){
            array_push($errors, "Password is required.");
        }

        if ($password_1 != $password_2){
            array_push($errors, "The two passwords do not match");
        }

        //check if user already exists
        $user_check_query = "select username from users where username = '$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            //if no errors, update the database
            if (count($errors) == 0){
                $sql = "update users 
                        set username = '$username', password = '$password_1', acctype = '$acctype'
                        where ID = '$ID'";
                $results = mysqli_query($db, $sql);

                if ($results == 1) {
                    array_push($errors, "You have successfully updated this user");
                }
            }
        }else{
            array_push($errors, "Username does not exist");
        }
    }

//Manage Finances
//If the enter button is clicked
    if (isset($_POST['submit'])){
        $date = $_POST['date'];
        $day = $_POST['day'];
        $amount = $_POST['amount'];

        //ensuring required fields
        if (empty($date)) {
            array_push($errors, "Date is required.");
        }
        if (empty($day)){
            array_push($errors, "Day is required.");
        }

        if (empty($amount)){
            array_push($errors, "Amount is required");
        }

        //if no errors, save to the database
        if (count($errors) == 0){
            $sql = "insert into finances values ('$date', '$day', '$amount')";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully entered the day's finances.");
            }
        }
    }

//Edit Events
//If the update button is clicked
if (isset($_POST['update_events'])){
    $ID = $_POST['ID'];
    $date = $_POST['Date'];
    $day = $_POST['Day'];
    $time = $_POST['Time'];
    $coordinator = $_POST['Coordinator'];
    $speaker = $_POST['Speaker'];
    $topic = $_POST['Topic'];

    //ensuring required fields
    if (empty($ID)) {
        array_push($errors, "ID is required.");
    }
    if (empty($date)) {
        array_push($errors, "Date is required.");
    }

    //check if event is already in the table
    $event_check_query = "select Coordinator from events where Coordinator = '$coordinator'";
    $result = mysqli_query($db, $event_check_query);
    $event = mysqli_fetch_assoc($result);

    if ($event) { // if event exists
        //if no errors, update the database
        if (count($errors) == 0){
            $sql = "update events 
                        set Date = '$date', Day = '$day', Time = '$time', Coordinator = '$coordinator', 
                        Speaker = '$speaker', Topic = '$topic'
                        where ID = '$ID'";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully updated the event");
            }
        }
    }else{
        array_push($errors, "Event does not exist");
    }
}

//Delete user
//If the delete button is clicked
if (isset($_POST['delete_user'])){
    $username = $_POST['username'];

    //ensuring required fields
    if (empty($username)) {
        array_push($errors, "Username is required.");
    }

    //check if user already exists
    $user_check_query = "select username from users where username = '$username'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        //if no errors, delete from the database
        if (count($errors) == 0){
            $sql = "delete from users where username = '$username'";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully deleted the user");
            }
        }
    }else{
        array_push($errors, "Username does not exist");
    }
}

//Delete member
//If the delete button is clicked
if (isset($_POST['delete_member'])){
    $ID = $_POST['ID'];

    //ensuring required fields
    if (empty($ID)) {
        array_push($errors, "ID is required.");
    }

    //check if user already exists
    $user_check_query = "select ID from members where ID = '$ID'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if member exists
        //if no errors, delete from the database
        if (count($errors) == 0){
            $sql = "delete from members where ID = '$ID'";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully deleted the member");
            }
        }
    }else{
        array_push($errors, "Username does not exist");
    }
}

//Edit Members
//If the update button is clicked
if (isset($_POST['update_members'])){
    $ID = $_POST['ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //ensuring required fields
    if (empty($ID)) {
        array_push($errors, "ID is required.");
    }

    //check if member exists
    $user_check_query = "select FName, LName from members where ID = '$ID'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        //if no errors, update the database
        if (count($errors) == 0){
            $sql = "update members 
                        set FName = '$fname', LName = '$lname', `M.I` = '$mi', Address = '$address', 
                        `Date of Birth` = '$dob', Gender = '$gender'
                        where ID = '$ID'";
            $results = mysqli_query($db, $sql);
            $sql2 = "update contact 
                        set Number = '$phone', Email = '$email' 
                        where ID = '$ID'";
            $results2 = mysqli_query($db, $sql2);

            if ($results == 1 and $results2 == 1) {
                array_push($errors, "You have successfully updated the member record.");
            }else{
                array_push($errors, "Member does not exist");
            }
        }
    }
}

//Profile Update
//If the update button is clicked
if (isset($_POST['update_profile'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //ensuring required fields
    if (empty($fname)) {
        array_push($errors, "Please fill in form to update record.");
    }
    if (empty($gender)) {
        array_push($errors, "Please choose a gender.");
    }

    //check if user already exists
    $user_check_query = "select FName, LName from members where FName = '$fname' and LName = '$lname' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['Fname'] === $fname and $user['LName'] === $lname) {
            array_push($errors, "Member already exists");
        }
    }

    //if no errors, update the database
    if (count($errors) == 0){
        $sql = "insert into members 
                    values ('', '$fname', '$lname', '$mi', '$address', '$dob', '$gender')";
        $results = mysqli_query($db, $sql);
        $sql2 = "insert into contact 
                    values ('', '$phone', '$email')";
        $results2 = mysqli_query($db, $sql2);

        if ($results == 1 and $results2 == 1) {
            array_push($errors, "You have successfully updated your profile.");
        }
    }
}

//Login Update
//If the update button is clicked
if (isset($_POST['update_login'])){
    $username_1 = $_POST['username_1'];
    $username_2 = $_POST['username_2'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $password_3 = $_POST['password_3'];

    //ensuring required fields
    if (empty($username_1)) {
        array_push($errors, "Old username is required.");
    }
    if (empty($password_1)) {
        array_push($errors, "Old password is required.");
    }
    if ($password_2 != $password_3){
        array_push($errors, "The two passwords do not match");
    }

    //check if member exists
    $user_check_query = "select username from users where username = '$username_1'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        //if no errors, update the database
        if (count($errors) == 0){
            $sql = "update users 
                        set username = '$username_2', password = '$password_2'
                        where username = '$username_1'";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully updated your login details.");
            }
        }else{
            array_push($errors, "User does not exist");
        }
    }
}

// Create user
//If the create button is clicked
if (isset($_POST['add'])){
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $acctype = $_POST['acctype'];

    //ensuring required fields
    if (empty($username)) {
        array_push($errors, "Username is required.");
    }
    if (empty($password_1)){
        array_push($errors, "Password is required.");
    }

    if ($password_1 != $password_2){
        array_push($errors, "The two passwords do not match");
    }

    //check if user already exists
    $user_check_query = "select * from users where username = '$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
    }
    //if no errors, save to the database
    if (count($errors) == 0){
        $sql = "insert into users 
                    values ('', '$username', '$password_1', '$acctype')";
        $results = mysqli_query($db, $sql);

        if ($results == 1) {
            array_push($errors, "You have successfully created the user");
        }
    }else {
        array_push($errors, "Something went wrong.");
    }
}

//Add Members To be baptised
//If the add button is clicked
if (isset($_POST['add_bap'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    //ensuring required fields
    if (empty($fname)) {
        array_push($errors, "Please fill the form.");
    }

    //if no errors, update the database
    if (count($errors) == 0){
        $sql = "insert into baptism 
                    values ( '', '$date', '$day', '$mi', '$gender', '$dob', '$phone')";
        $results = mysqli_query($db, $sql);

        if ($results == 1) {
            array_push($errors, "You have successfully added the baptism record.");
        }
    }else{
        array_push($errors, "Member already exists");
    }
}

//Edit Members To be baptised
//If the edit button is clicked
if (isset($_POST['edit_bap'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    //ensuring required fields
    if (empty($fname)) {
        array_push($errors, "Please fill the form.");
    }

    //check if member exists
    $user_check_query = "select FName, LName from members where FName = '$fname' and LName = '$lname'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        //if no errors, update the database
        if (count($errors) == 0){
            $sql = "update baptism 
                        set FName = '$fname', LName = '$lname', MI = '$mi', 
                        DOB = '$dob', Gender = '$gender', Phone = '$phone'
                        where FName = '$fname' and LName = '$lname'";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully updated the baptism record.");
            }
        }else{
            array_push($errors, "Member does not exist");
        }
    }
}

//Delete baptism member
//If the delete button is clicked
if (isset($_POST['delete_bap'])){
    $ID = $_POST['ID'];

    //ensuring required fields
    if (empty($ID)) {
        array_push($errors, "ID is required.");
    }

    //check if user already exists
    $user_check_query = "select ID from baptism where ID = '$ID'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if member exists
        //if no errors, delete from the database
        if (count($errors) == 0){
            $sql = "delete from baptism where ID = '$ID'";
            $results = mysqli_query($db, $sql);

            if ($results == 1) {
                array_push($errors, "You have successfully deleted the baptism member");
            }
        }
    }else{
        array_push($errors, "Member does not exist");
    }
}

//Add Members
//If the add button is clicked
if (isset($_POST['add_mem'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //ensuring required fields
    if (empty($fname)) {
        array_push($errors, "Please fill the form.");
    }

    if (count($errors) == 0){
        $sql = "insert into members 
                    values ('', '$fname', '$lname', '$mi', '$address', '$dob', '$gender')";
        $results = mysqli_query($db, $sql);
        $sql2 = "insert into contact 
                    values ('', '$phone', '$email')";
        $results2 = mysqli_query($db, $sql2);

        if ($results == 1 and $results2 == 1) {
            array_push($errors, "You have successfully added the member record.");
        }else{
            array_push($errors, "Oops something went wrong.");
        }
    }
}

//Pay tithe
//If the pay button is clicked
if (isset($_POST['paytithe'])){
    $date = $_POST['date'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $amount = $_POST['amount'];

    //ensuring required fields
    if (empty($date)) {
        array_push($errors, "The date is required.");
    }
    if (empty($fname)) {
        array_push($errors, "First Name is required.");
    }
    if (empty($lname)){
        array_push($errors, "Last Name is required.");
    }
    if (empty($amount)){
        array_push($errors, "Amount is required");
    }

    //if no errors, save to the database
    if (count($errors) == 0){
        $sql = "insert into tithe values ('', '$date', '$fname', '$lname', '$mi', '$amount')";
        $results = mysqli_query($db, $sql);

        if ($results == 1) {
            array_push($errors, "You have successfully paid your tithe.");
        }
    }
}

//Pay offering
//If the pay button is clicked
if (isset($_POST['payoffering'])){
    $date = $_POST['date'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];
    $amount = $_POST['amount'];

    //ensuring required fields
    if (empty($date)) {
        array_push($errors, "The date is required.");
    }
    if (empty($fname)) {
        array_push($errors, "First Name is required.");
    }
    if (empty($lname)){
        array_push($errors, "Last Name is required.");
    }
    if (empty($amount)){
        array_push($errors, "Amount is required");
    }

    //if no errors, save to the database
    if (count($errors) == 0){
        $sql = "insert into offering values ('', '$date', '$fname', '$lname', '$mi', '$amount')";
        $results = mysqli_query($db, $sql);

        if ($results == 1) {
            array_push($errors, "You have successfully paid your offering.");
        }
    }
}

//Prayer Request
//If the submit button is clicked
if (isset($_POST['prayreq'])){
    $req1 = $_POST['req1'];
    $req2 = $_POST['req2'];
    $req3 = $_POST['req3'];

    $sql = "insert into prayerrequests values ('', '$req1', '$req2', '$req3')";
    $results = mysqli_query($db, $sql);

    if ($results == 1) {
        array_push($errors, "You have successfully submitted your prayer request(s).");
    }

}