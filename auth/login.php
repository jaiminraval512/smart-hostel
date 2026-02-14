<?php
include "../sql/db.php"; 
session_start();

if (isset($_POST['submit'])) {
    $user_id = mysqli_real_escape_string($cnn, $_POST['user_id']);
    $password = mysqli_real_escape_string($cnn, $_POST['password']);
    
    $select = "SELECT * FROM users WHERE student_id='$user_id' AND password='$password'";
    $input = mysqli_query($cnn, $select);
    
    if (mysqli_num_rows($input) > 0) {
        $_SESSION['student_id'] = $user_id;
        header("Location:../index.php?name=" . $user_id);
        exit();
    } else {
        $error = "Invalid Student ID or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-info-box">
            <div class="info-content">
                <h2>Smart Hostel</h2>
                <p>Efficiency in managing student accommodation, room allocation, and records.</p>
                <img src="../assets/images/login_graphic_2-removebg-preview.png" alt="Hostel Management">
                <p class="copyright">© 2026 Management System</p>
            </div>
        </div>

        <div class="auth-form-box">
            <form action="" method="POST">
                <div class="form-header">
                    <h2>Sign In</h2>
                    <p>Enter your credentials to access your account.</p>
                </div>

                <?php if(isset($error)): ?>
                    <div class="alert-danger"><i class="fas fa-exclamation-circle"></i> <?php echo $error; ?></div>
                <?php endif; ?>

                <div class="input-group">
                    <label>Student ID</label>
                    <div class="input-field">
                        
                        <input type="text" name="user_id" placeholder="Enter ID" required>
                    </div>
                </div>

                <div class="input-group">
                    
                    <label>Password</label>
                    <div class="input-field">
                       
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="forgot_password.php" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" name="submit" class="auth-btn">Login Now</button>
                
                <p class="switch-auth">New User? <a href="register.php">Create Account</a></p>
            </form>
        </div>
    </div>

</body>
</html>