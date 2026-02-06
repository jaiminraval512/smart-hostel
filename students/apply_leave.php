<?php
include "../includes/header.php";

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel");

$sid = $_SESSION['student_id'];

if (isset($_POST['apply'])) {

    $from = $_POST['from'];
    $to = $_POST['to'];
    $reason = $_POST['reason'];

    mysqli_query(
        $cnn,
        "INSERT INTO student_leave
  (student_id,from_date,to_date,reason)
  VALUES('$sid','$from','$to','$reason')"
    );

    echo "<script>alert('Leave Applied');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/style.css">
<body>
    <div class="dashboard-layout">
        <?php include "../includes/sidebar.php"; ?>
  
         <main class="main-content" name="main-content">
    <h2>Apply Leave</h2>

    <form method="post">

        From:
        <input type="date" name="from" required>

        To:
        <input type="date" name="to" required>

        Reason:
        <textarea name="reason" required></textarea>

        <button name="apply">Submit</button>

    </form>
         </main>
    </div>
</body>

</html>