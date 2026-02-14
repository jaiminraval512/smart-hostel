<?php
include "../sql/db.php";
session_start();

if(isset($_POST['submit'])){

    $student_id = mysqli_real_escape_string($cnn, $_POST['student_id']);
    $email = mysqli_real_escape_string($cnn, $_POST['email']);
    $mobile = mysqli_real_escape_string($cnn, $_POST['mobile']);
    $new_password = mysqli_real_escape_string($cnn, $_POST['new_password']);

    $check = mysqli_query($cnn, 
        "SELECT * FROM users 
         WHERE student_id='$student_id' 
         AND email='$email' 
         AND mobile='$mobile'"
    );

    if(mysqli_num_rows($check) > 0){

        $update = mysqli_query($cnn,
            "UPDATE users SET password='$new_password' 
             WHERE student_id='$student_id'"
        );

        if($update){
            $success = "Password updated successfully!";
        }

    } else {
        $error = "Details not matched! Please check again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recover Account | Smart Hostel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body">

<div class="auth-container">
    
    <div class="auth-info-box">
        <div>
            <h2>Account Recovery</h2>
            <p>Verify your details to reset password securely.</p>
            <img src="../assets/images/login_graphic_2-removebg-preview.png">
            <p class="copyright">© 2026 Smart Hostel</p>
        </div>
    </div>

    <div class="auth-form-box">
        <form method="POST">

            <div class="form-header">
                <h2>Recover Password</h2>
                <p>Enter correct details to continue</p>
            </div>

            <?php if(isset($error)): ?>
                <div class="alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if(isset($success)): ?>
                <div class="alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <div class="input-group">
                <label>Student ID</label>
                <input type="text" name="student_id" required>
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" required>
            </div>

            <div class="input-group">
                <label>New Password</label>
                <input type="password" name="new_password" required>
            </div>

            <button type="submit" name="submit" class="auth-btn">
                Verify & Reset Password
            </button>

            <p class="switch-auth">
                Back to <a href="login.php">Login</a>
            </p>

        </form>
    </div>

</div>

</body>
</html>
