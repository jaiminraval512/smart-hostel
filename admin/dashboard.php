<?php
$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("Database Connection Failed");

// 1. Fetch System Counts
$u_res = mysqli_query($cnn, "SELECT COUNT(*) as t FROM users");
$total_users = ($u_res) ? mysqli_fetch_assoc($u_res)['t'] : 0;

$s_res = mysqli_query($cnn, "SELECT COUNT(*) as t FROM student_admission");
$total_students = ($s_res) ? mysqli_fetch_assoc($s_res)['t'] : 0;

$f_res = mysqli_query($cnn, "SELECT COUNT(*) as t FROM student_fees WHERE status='pending'");
$fees_pending = ($f_res) ? mysqli_fetch_assoc($f_res)['t'] : 0;

$c_res = mysqli_query($cnn, "SELECT COUNT(*) as t FROM student_complaints WHERE status='Pending'");
$total_complaints = ($c_res) ? mysqli_fetch_assoc($c_res)['t'] : 0;

$l_res = mysqli_query($cnn, "SELECT COUNT(*) as t FROM student_leave WHERE status='Pending'");
$total_leaves = ($l_res) ? mysqli_fetch_assoc($l_res)['t'] : 0;

// 2. Fetch Last 5 Students (Fixes the previous boolean error)
$recent_students = mysqli_query($cnn, "SELECT student_id, full_name FROM student_admission ORDER BY student_id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main_container">
    <?php include "admin_sidebar.php"; ?>

    <div class="content_body">
        <header class="dash-header">
            <div class="header-titles">
                <h1>System Overview</h1>
                <p>Monitor and manage hostel operations</p>
            </div>
            <div class="header-clock" id="clock">00:00:00</div>
        </header>

        <div class="stats-grid">
            <a href="manage_users.php" class="stat-card">
                <div class="card-icon"><i class="fas fa-users"></i></div>
                <div class="card-info">
                    <span class="label">System Users</span>
                    <h3 class="value"><?php echo $total_users; ?></h3>
                </div>
            </a>

            <a href="view_student.php" class="stat-card">
                <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
                <div class="card-info">
                    <span class="label">Total Students</span>
                    <h3 class="value"><?php echo $total_students; ?></h3>
                </div>
            </a>

            <a href="fees_table.php" class="stat-card alert">
                <div class="card-icon"><i class="fas fa-receipt"></i></div>
                <div class="card-info">
                    <span class="label">Pending Fees</span>
                    <h3 class="value"><?php echo $fees_pending; ?></h3>
                </div>
            </a>

            <a href="manage_complaints.php" class="stat-card warning">
                <div class="card-icon"><i class="fas fa-headset"></i></div>
                <div class="card-info">
                    <span class="label">Complaints</span>
                    <h3 class="value"><?php echo $total_complaints; ?></h3>
                </div>
            </a>

            <a href="fees_table.php" class="stat-card">
                <div class="card-icon"><i class="fas fa-envelope-open-text"></i></div>
                <div class="card-info">
                    <span class="label">Leave Requests</span>
                    <h3 class="value"><?php echo $total_leaves; ?></h3>
                </div>
            </a>

            <a href="take_attendance.php" class="stat-card action">
                <div class="card-icon"><i class="fas fa-calendar-check"></i></div>
                <div class="card-info">
                    <span class="label">Attendance</span>
                    <h3 class="value">Open</h3>
                </div>
            </a>
        </div>

        <div class="dash-layout">
            <section class="recent-students">
                <div class="section-head">
                    <h2>Recent Enrollments</h2>
                    <a href="view_students.php">View List</a>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Full Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($recent_students && mysqli_num_rows($recent_students) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($recent_students)): ?>
                            <tr>
                                <td><span class="badge">#<?= $row['student_id'] ?></span></td>
                                <td class="text-bold"><?= $row['full_name'] ?></td>
                                <td><span class="status-indicator"></span> Active</td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="3" class="text-center">No data found</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>

            <aside class="quick-health">
                <h2>Quick Health</h2>
                <div class="health-item">
                    <div class="health-meta"><span>Fee Verification</span> <strong>75%</strong></div>
                    <div class="progress-track"><div class="progress-bar" style="width: 75%"></div></div>
                </div>
                <div class="health-item">
                    <div class="health-meta"><span>Issue Resolution</span> <strong>40%</strong></div>
                    <div class="progress-track"><div class="progress-bar warn" style="width: 40%"></div></div>
                </div>
            </aside>
        </div>
    </div>
</div>

<script>
    setInterval(() => {
        document.getElementById('clock').innerText = new Date().toLocaleTimeString();
    }, 1000);
</script>
</body>
</html>