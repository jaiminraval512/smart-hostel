<?php
include "../sql/db.php";

$q = mysqli_query($cnn, "
SELECT sf.*, sa.full_name
FROM student_fees sf
JOIN student_admission sa 
ON sf.student_id = sa.student_id
WHERE sf.status='pending'
");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
    <?php include "../admin/admin_sidebar.php"; ?>
    <div class="content">
        <h2>Pending Fees Verification</h2>

<table border="1" cellpadding="10">

<tr>
<th>Name</th>
<th>Student ID</th>
<th>Amount</th>

<th>Mode</th>
<th>Transaction / Receipt</th>

<th>Due Date</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($q)){ ?>

<tr>
<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['student_id']; ?></td>

<td><?php echo $row['fixed_fee']; ?></td>

<td>
<?php echo strtoupper($row['payment_mode']); ?>
</td>

<td>
<?php
if($row['payment_mode']=="online")
    echo $row['transaction_id'];
else
    echo $row['receipt_no'];
?>
</td>

<td><?php echo $row['due_date']; ?></td>

<td>
<a href="mark_paid.php?id=<?php echo $row['student_id']; ?>">
Approve
</a>
</td>

</tr>

<?php } ?>

</table>
    </div>
    </div>
</body>
</html>