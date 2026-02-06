<?php
session_start();

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("not connect");

/* ---------- ADMIN SECURITY ---------- */
// if(!isset($_SESSION['admin'])){
//     header("Location: ../auth/login.php");
//     exit();
// }

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
<html>

<head>
  <title>Take Attendance</title>
  <link rel="stylesheet" href="style.css">
 
</head>

<body>
 <div class="main">
  <?php include 'admin_sidebar.php'; ?>
  <div class="content">
 

    <h2>Take Attendance : <?php echo $today; ?></h2>

    <?php if (isset($msg)) echo "<p class='success'>$msg</p>"; ?>

    <form method="post">

      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Room</th>
          <th>Present</th>
          <th>Absent</th>
        </tr>

        <?php while ($s = mysqli_fetch_assoc($students)) { ?>

          <tr>
            <td><?= $s['student_id'] ?></td>
            <td><?= $s['full_name'] ?></td>
            <td><?= $s['room_number'] ?></td>

            <td>
              <input type="radio"
                name="status[<?= $s['student_id'] ?>]"
                value="Present" required>
            </td>

            <td>
              <input type="radio"
                name="status[<?= $s['student_id'] ?>]"
                value="Absent">
            </td>

          </tr>

        <?php } ?>

      </table>

      <button name="save" class="btn">Save Attendance</button>

    </form>
  </div>
  </div>

</body>

</html>