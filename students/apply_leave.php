<?php
include "../includes/header.php";
$cnn = mysqli_connect("localhost", "root", "", "smart-hostel");

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
$sid = $_SESSION['student_id'];

// Leave Apply karne ka logic
if (isset($_POST['apply'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $reason = $_POST['reason'];

    mysqli_query(
        $cnn,
        "INSERT INTO student_leave (student_id, from_date, to_date, reason) 
         VALUES ('$sid', '$from', '$to', '$reason')"
    );

    echo "<script>alert('Leave Applied Successfully!'); window.location='apply_leave.php';</script>";
}

// Student ki purani leave requests fetch karna
$leave_history = mysqli_query($cnn, "SELECT * FROM student_leave WHERE student_id = '$sid' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-layout">
        <?php include "../includes/sidebar.php"; ?>
  
        <main class="main-content">
            <div class="leave-container">
                <header class="content-header">
                    <h2><i class="fas fa-paper-plane"></i> Apply for Leave</h2>
                </header>

                <div class="form-card">
                    <form method="post" class="leave-form">
                        <div class="date-row">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt"></i> From Date</label>
                                <input type="date" name="from" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-calendar-check"></i> To Date</label>
                                <input type="date" name="to" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-comment-alt"></i> Reason</label>
                            <textarea name="reason" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="apply" class="btn-submit">Submit Application</button>
                    </form>
                </div>

                <div class="status-section" style="margin-top: 40px;">
                    <header class="content-header">
                        <h2><i class="fas fa-history"></i> My Leave Status</h2>
                    </header>
                    <div class="table_container">
                        <table class="leave_table">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($leave_history)) { ?>
                                <tr>
                                    <td><?= $row['from_date'] ?></td>
                                    <td><?= $row['to_date'] ?></td>
                                    <td class="td-reason"><?= $row['reason'] ?></td>
                                    <td>
                                        <span class="status_badge status-<?= strtolower($row['status']) ?>">
                                            <?= ucfirst($row['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
 <?php include "../includes/footer.php"; ?>
</html>