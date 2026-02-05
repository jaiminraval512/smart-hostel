<?php

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("not connect");
?>

<?php
// total user
    $sql = "SELECT COUNT(*) as total FROM `student_admission`";
    $result = mysqli_query($cnn, $sql);
    $data = mysqli_fetch_assoc($result);
    $total_students = $data['total'];

// total users 

    $users = "SELECT COUNT(*) as total FROM `users`";
    $user_result = mysqli_query($cnn, $users);
    $user_data = mysqli_fetch_assoc($user_result);
    $total_users = $user_data['total'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <?php include "../admin/admin_sidebar.php"; ?>
        <div class="content">
            <div class="cards">
                <div class="card1">

                    <div class="detail">
                        <span>Total Students</span><br>
                        <div class="char"><?php echo $total_students; ?></div>
                    </div>
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card1">

                    <div class="detail">
                        <span>Total users</span><br>
                        <div class="char"><?php echo $total_users; ?></div>
                    </div>
                    <i class="fa-duotone fa-solid fa-user-tie"></i>
                </div>
            </div>
        </div>
    </div>

</body>

</html>