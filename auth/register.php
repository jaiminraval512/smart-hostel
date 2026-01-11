<?php
$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("not connect");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php/php_/hostel-management-system/assets/css/style.css">
    <title>Sign-Up</title>
</head>

<body class="body">
    <div class="main-login2">
        <div class="login-content2">
            <h2>Create an Account</h2><br>
            <p class="first-p">Join the Hostel Management System to easily manage rooms, students, fees, leave requests, and more — whether you're a student or an admin.</p>
             <img src="/php/php_/hostel-management-system/assets/images/loinn_grapic.png-removebg-preview.png" alt="img" height="250px" class="imgg">
            <p class="second-p">© 2026 Hostel Management System</p>
           
        </div>
        <div class="login2">
            <form action="">
                <h2 class="h2">Register | Sign Up</h2>
                <p class="login-p">Fill in your details to create a new HMS account.</p>
                <input type="text" placeholder="create user id :" name="user_id" class="inp" required><br>
                <input type="text" placeholder="enter user name : " name="user_name" class="inp" required><br>
                <input type="email" placeholder="enter email :" name="email" class="inp" required><br>
                <input type="number"  class="inp" placeholder="enter mobile number :" name="mobile_number" required><br>
                <input type="password" name="password" class="inp" placeholder="create password :" required>
                <input type="submit" value="Sign Up" name="submit" class="inp" class="inp3" required>
                <p class="user">Already have an account?<a href="http://localhost/php/php_/hostel-management-system/auth/Login.php">Login</a></p>
                
            </form>
        </div>
    </div>

</body>

</html>
<?php

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $insert = "insert into users(user_id,username,email,mobile,password)values('$user_id','$user_name','$email','$mobile_number','$password')";
    $input = mysqli_query($cnn, $insert) or die(mysqli_error($cnn));

    if ($input) {
        header("Location:http://localhost/php/php_/hostel-management-system/auth/Login.php");
    } else {
        echo "data not inserted";
    }
}
?>