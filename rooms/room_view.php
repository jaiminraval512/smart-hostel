<?php
include "../sql/db.php";

if(!isset($_GET['room'])){
    die("Room not selected.");
}

$room_number = mysqli_real_escape_string($cnn, $_GET['room']);

$roomQuery = "
SELECT r.room_number, r.capacity, r.floor, r.room_type,
COUNT(ra.student_id) AS occupied
FROM rooms r
LEFT JOIN room_allocation ra
ON r.room_number = ra.room_number
AND ra.status = 'Active'
WHERE r.room_number = '$room_number'
GROUP BY r.room_number
";

$result = mysqli_query($cnn, $roomQuery);

if(!$result){
    die("Room Query Error: " . mysqli_error($cnn));
}

$room = mysqli_fetch_assoc($result);

if(!$room){
    die("Room not found.");
}

$available = $room['capacity'] - $room['occupied'];

$studentsQuery = "
SELECT sa.student_id, sa.full_name, sa.course_name
FROM room_allocation ra
JOIN student_admission sa
ON ra.student_id = sa.student_id
WHERE ra.room_number = '$room_number'
AND ra.status = 'Active'
";

$students = mysqli_query($cnn, $studentsQuery);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Room Details</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include "../includes/header.php"; ?>

<div class="dashboard-layout">

<?php include "../includes/sidebar.php"; ?>

<main class="main-content">

<h2 class="hos-main">
    🛏 Room <?php echo $room['room_number']; ?> Details
</h2>

<!-- ROOM SUMMARY CARD -->
<div class="room-summary-card">

    <div class="room-info-box">
        <div class="info-item">
            <i class="fas fa-layer-group"></i>
            <span>Floor:</span>
            <strong><?php echo $room['floor']; ?></strong>
        </div>

        <div class="info-item">
            <i class="fas fa-users"></i>
            <span>Total Capacity:</span>
            <strong><?php echo $room['capacity']; ?></strong>
        </div>

        <div class="info-item">
            <i class="fas fa-user-check"></i>
            <span>Occupied:</span>
            <strong><?php echo $room['occupied']; ?></strong>
        </div>

        <div class="info-item">
            <i class="fas fa-bed"></i>
            <span>Available Beds:</span>
            <strong><?php echo $available; ?></strong>
        </div>
    </div>

    <div class="room-status">
        <?php if($available == 0){ ?>
            <span class="status-badge full">Room Full</span>
        <?php } else { ?>
            <span class="status-badge available">Available</span>
        <?php } ?>
    </div>

</div>

<!-- STUDENT TABLE -->
<div class="tbl-container">
    <h3 class="tbl-title"><i class="fas fa-users"></i> Students in this Room</h3>

    <table class="tbl">
        <thead class="t-header">
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody class="t-body">
            <?php while($row = mysqli_fetch_assoc($students)){ ?>
                <tr>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</main>
</div>

<?php include "../includes/footer.php"; ?>

</body>
</html>
