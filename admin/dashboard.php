<?php
// Database connection
$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("not connect");

// Total Students Query
$sql = "SELECT COUNT(*) as total FROM `student_admission`";
$result = mysqli_query($cnn, $sql);
$data = mysqli_fetch_assoc($result);
$total_students = $data['total'];

// Total Users Query
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
    <title>Smart Hostel | Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="main_container">

        <?php include "admin_sidebar.php"; ?>

        <div class="content_body">

            <header class="top_header">
                <h1>Dashboard Overview</h1>
            </header>

            <div class="cards_container">

                <div class="stat_card">
                    <div class="card_info">
                        <span class="label">Total Students</span>
                        <h2 class="count"><?php echo $total_students; ?></h2>
                    </div>
                    <div class="card_icon student_bg">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>

                <div class="stat_card">
                    <div class="card_info">
                        <span class="label">Total Users</span>
                        <h2 class="count"><?php echo $total_users; ?></h2>
                    </div>
                    <div class="card_icon user_bg">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>