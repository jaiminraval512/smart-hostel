$res=mysqli_query($cnn,
"SELECT l.*, s.full_name
 FROM student_leave l
 JOIN student_admission s
 ON l.student_id=s.student_id");
<table>
<tr>
<th>Name</th>
<th>From</th>
<th>To</th>
<th>Reason</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($r=mysqli_fetch_assoc($res)){ ?>

<tr>
<td><?= $r['full_name'] ?></td>
<td><?= $r['from_date'] ?></td>
<td><?= $r['to_date'] ?></td>
<td><?= $r['reason'] ?></td>
<td><?= $r['status'] ?></td>

<td>
<a href="approve.php?id=<?= $r['id'] ?>">Approve</a>
<a href="reject.php?id=<?= $r['id'] ?>">Reject</a>
</td>

</tr>

<?php } ?>
</table>
