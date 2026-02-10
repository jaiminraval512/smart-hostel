<?php
session_start();

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("not connect");

/* ---------- ADMIN SECURITY ---------- */
// if(!isset($_SESSION['admin'])){
//     header("Location: ../auth/login.php");
//     exit();
// }
date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

/* ---------- STUDENT LIST ---------- */
$students = mysqli_query(
  $cnn,
  "SELECT student_id, full_name, room_number
 FROM student_admission"
);
/* ---------- SAVE ATTENDANCE ---------- */
if (isset($_POST['save'])) {

  foreach ($_POST['status'] as $sid => $status) {

    $check = mysqli_query(
      $cnn,
      "SELECT * FROM student_attendance
    WHERE student_id='$sid'
    AND att_date='$today'"
    );

    if (mysqli_num_rows($check) > 0) {

      mysqli_query(
        $cnn,
        "UPDATE student_attendance
      SET status='$status'
      WHERE student_id='$sid'
      AND att_date='$today'"
      );
    } else {

      mysqli_query(
        $cnn,
        "INSERT INTO student_attendance
     (student_id,att_date,status)
     VALUES('$sid','$today','$status')"
      );
    }
  }

  $msg = "Attendance Saved Successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container">
        <?php include 'admin_sidebar.php'; ?>

        <div class="content_body">
            <header class="top_header">
                <h1><i class="fas fa-calendar-check"></i> Daily Attendance</h1>
                <p class="date_display">Date: <strong><?php echo date('d M, Y', strtotime($today)); ?></strong></p>
            </header>

            <?php if (isset($msg)): ?>
                <div class="alert_success">
                    <i class="fas fa-check-circle"></i> <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <div class="table_container">
                <form method="post">
                    <table class="attendance_table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Room</th>
                                <th class="text-center">Present</th>
                                <th class="text-center">Absent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($s = mysqli_fetch_assoc($students)) { ?>
                            <tr>
                                <td class="id_col">#<?= $s['student_id'] ?></td>
                                <td class="name_col"><strong><?= $s['full_name'] ?></strong></td>
                                <td><span class="room_badge"><?= $s['room_number'] ?></span></td>
                                
                                <td class="text-center">
                                    <label class="radio_container">
                                        <input type="radio" name="status[<?= $s['student_id'] ?>]" value="Present" required>
                                        <span class="checkmark present_mark"></span>
                                    </label>
                                </td>

                                <td class="text-center">
                                    <label class="radio_container">
                                        <input type="radio" name="status[<?= $s['student_id'] ?>]" value="Absent">
                                        <span class="checkmark absent_mark"></span>
                                    </label>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="form_actions">
                        <button type="submit" name="save" class="btn_save">
                            <i class="fas fa-save"></i> Save Attendance
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>