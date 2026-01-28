<?php
include "../sql/db.php";

$q = mysqli_query($cnn, "
SELECT sf.student_id, sa.full_name, sf.fixed_fee, sf.transaction_id, sf.due_date
FROM student_fees sf
JOIN student_admission sa ON sf.student_id = sa.student_id
WHERE sf.status='pending'
");
if (!$q) {
    die("Query Failed: " . mysqli_error($cnn));
}
?>

<h2>Pending Fees Verification</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Student ID</th>
    <th>Amount</th>
    <th>Transaction ID</th>
    <th>Due Date</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($q)){ ?>
<tr>
    <td><?php echo $row['full_name']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['fixed_fee']; ?></td>
    <td><?php echo $row['transaction_id']; ?></td>
    <td><?php echo $row['due_date']; ?></td>
    <td>
        <a href="mark_paid.php?id=<?php echo $row['student_id']; ?>">Mark Paid</a>
    </td>
</tr>
<?php } ?>
</table>
