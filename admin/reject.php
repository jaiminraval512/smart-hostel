<?php

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel");
if(!isset($_GET['id'])){
    header("Location: leave_manage.php");
    exit;
}

$id = mysqli_real_escape_string($cnn, $_GET['id']);

mysqli_query($cnn,
"UPDATE student_leave
 SET status='Rejected'
 WHERE id='$id'");

header("Location: leave_manage.php");
exit;
?>
