<?php
include "../sql/db.php"; 
session_start();

if (isset($_POST['submit'])) {
    extract($_POST);
    $check_user = mysqli_query($cnn, "SELECT * FROM users WHERE student_id='$user_id'");
    
    if(mysqli_num_rows($check_user) > 0) {
        $error = "Student ID already exists!";
    } else {
        $insert = "INSERT INTO users(student_id,username,email,mobile,password) VALUES('$user_id','$user_name','$email','$mobile_number','$password')";
        $input = mysqli_query($cnn, $insert);
        if ($input) {
            header("Location:login.php?msg=success");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body">

    <div class="auth-container register-mode">
        <div class="auth-info-box">
            <div class="info-content">
                <h2>Create Account</h2>
                <p>Join our community to manage your hostel life efficiently and easily.</p>
                <img src="../assets/images/loinn_grapic.png-removebg-preview.png" alt="Sign Up">
                <p class="copyright">© 2026 Management System</p>
            </div>
        </div>

        <div class="auth-form-box">
            <form action="" method="POST">
                <div class="form-header">
                    <h2>Sign Up</h2>
                    <p>Register yourself to get started.</p>
                </div>

                <?php if(isset($error)): ?>
                    <div class="alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <div class="input-grid">
                    <div class="input-group">
                        <label>Student ID</label>
                        <input type="text" name="user_id" placeholder="Create ID" required>
                    </div>
                    <div class="input-group">
                        <label>Username</label>
                        <input type="text" name="user_name" placeholder="Enter Name" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="example@mail.com" required>
                </div>

                <div class="input-group">
                    <label>Mobile Number</label>
                    <input type="number" name="mobile_number" placeholder="Enter Mobile" required>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Min 6 characters" required>
                </div>

                <button type="submit" name="submit" class="auth-btn">Register Account</button>
                <p class="switch-auth">Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

</body>
</html>