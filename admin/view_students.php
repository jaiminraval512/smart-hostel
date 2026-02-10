<?php
include "../sql/db.php";

$sql = "SELECT full_name, student_id, room_number 
        FROM student_admission";

$result = mysqli_query($cnn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($cnn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main_container">
        <?php include "../admin/admin_sidebar.php"; ?>

        <div class="content_body">
            <header class="top_header">
                <h1>Student Management</h1>
            </header>

            <div class="table_container">
                <div class="table_header">
                    <h2>Registered Students</h2>
                </div>
                
                <table class="data_table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Room Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <div class="user_info">
                                        <div class="user_avatar"><?php echo substr($row['full_name'], 0, 1); ?></div>
                                        <strong><?php echo $row['full_name']; ?></strong>
                                    </div>
                                </td>
                                <td><span class="id_badge">#<?php echo $row['student_id']; ?></span></td>
                                <td>
                                    <div class="room_info">
                                        <i class="fas fa-bed"></i> <?php echo $row['room_number']; ?>
                                    </div>
                                </td>
                                <td>
                                    <a href="student_view.php?id=<?php echo $row['student_id']; ?>" class="btn_view">
                                        <i class="fas fa-eye"></i> View Details
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>