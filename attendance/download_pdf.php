<?php
session_start();
include "../sql/db.php"; 

$sid=$_SESSION['student_id'];

$from=$_GET['from'];
$to=$_GET['to'];

$sql="
SELECT * FROM student_attendance
WHERE student_id='$sid'
AND att_date BETWEEN '$from' AND '$to'
";

$res=mysqli_query($cnn,$sql);

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=attendance.xls");
?>

<table border="1">
<tr>
<th>Date</th>
<th>Status</th>
</tr>

<?php while($r=mysqli_fetch_assoc($res)){ ?>

<tr>
<td><?= $r['att_date'] ?></td>
<td><?= $r['status'] ?></td>
</tr>

<?php } ?>
</table>
