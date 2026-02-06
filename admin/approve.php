$id=$_GET['id'];

mysqli_query($cnn,
"UPDATE student_leave
 SET status='Approved'
 WHERE id='$id'");

header("location:leave_manage.php");
