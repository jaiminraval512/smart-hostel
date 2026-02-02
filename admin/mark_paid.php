<?php
include "../sql/db.php";

$id = mysqli_real_escape_string($cnn, $_GET['id']);

mysqli_query($cnn, "
UPDATE student_fees 
SET status='paid'
WHERE student_id='$id'
");

echo "<script>
alert('Fees marked as PAID');
window.location.href='fees_table.php';
</script>";
?>
