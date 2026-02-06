<?php
$sid=$_SESSION['student_id'];

$res=mysqli_query($cnn,
"SELECT * FROM student_leave
 WHERE student_id='$sid'
 ORDER BY id DESC");
?>
<table>
<tr>
<th>From</th>
<th>To</th>
<th>Reason</th>
<th>Status</th>
</tr>

<?php while($r=mysqli_fetch_assoc($res)){ ?>

<tr>
<td><?= $r['from_date'] ?></td>
<td><?= $r['to_date'] ?></td>
<td><?= $r['reason'] ?></td>
<td><?= $r['status'] ?></td>
</tr>

<?php } ?>
</table>
