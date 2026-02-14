<?php
include "../includes/header.php";
if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
include "../sql/db.php";

$query = "SELECT * FROM rooms";
$result = mysqli_query($cnn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Hostel | Rooms</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-layout">
    <?php include "../includes/sidebar.php"; ?>

    <main class="main-content">
        <div class="main2">
        <header class="content-header">
            <h2 id="room-heading">🛏 Hostel Rooms</h2>
            <p class="subtitle">Manage and view all available hostel accommodations</p>
        </header>

        <div class="room-grid" id="roomGrid">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="room-card">
                    <div class="room-status-badge">Available</div>
                    
                    <div class="room-card-header">
                        <div class="icon-box">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <h3 class="room-number">Room <?php echo $row['room_number']; ?></h3>
                    </div>

                    <div class="room-card-body">
                        <div class="info-row">
                            <i class="fas fa-users"></i>
                            <span>Capacity: <strong><?php echo $row['capacity']; ?> Persons</strong></span>
                        </div>
                        <div class="info-row">
                            <i class="fas fa-check-circle"></i>
                            <span>Type: Standard </span>
                        </div>
                    </div>

                    <div class="room-card-footer">
                        <a class="view-btn" href="room_view.php?room=<?php echo $row['room_number']; ?>">
                            View Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>