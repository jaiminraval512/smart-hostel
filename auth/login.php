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
    <title>Sign-In</title>
</head>

<body class="body">
    <div class="main-login">
        <div class="login-content">
            <h2>Welcome to Smart-Hostel</h2><br>
            <p class="first-p">Manage student accommodation, room allocation, complaints, and leave records efficiently with our Hostel Management System.</p>
            <img src="/php/php_/hostel-management-system/assets/images/login_graphic_2-removebg-preview.png" alt="img" height="250px" class="imgg2">
            <p class="second-p">© 2026 Hostel Management System</p>
        </div>
        <div class="login">
            <form action="">
                <h2 class="h2">Login | Sign in</h2>
                <p class="login-p">Enter your credentials to access the dashboard.</p>
                <input type="text" placeholder="enter student id :" name="user_id"  class="inp inp1 " required><br>
                <input type="password" name="password"  placeholder="enter password :" class="inp inp2" required><br>
                <input type="submit" value="submit" name="submit" class="inp" class="inp3">
                <p class="user">New User?<a href="http://localhost/php/php_/hostel-management-system/auth/register.php">Signup</a></p>
            </form>
        </div>
    </div>


</body>

</html>
<?php

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $select = "select * from users where student_id='$user_id'and password='$password'";
    $input = mysqli_query($cnn, $select);
    if (mysqli_num_rows($input) > 0) {
        $_SESSION['student_id'] = $user_id;
        header("Location:/php/php_/hostel-management-system/index.php?name=" . $user_id);
        exit();
    } else {
        echo"<script>
            alert('please enter enter valid username and password !');
        </script>";
    }
}
?>