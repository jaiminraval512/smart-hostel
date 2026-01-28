<?php
session_start();
include "../sql/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/Login.php");
    exit;
}

$student_id = $_SESSION['student_id'];
$txn_id = $_POST['txn_id'];

mysqli_query($cnn, "UPDATE student_fees 
SET transaction_id='$txn_id', status='pending' 
WHERE student_id='$student_id'");

echo "<script>
alert('Transaction submitted successfully. Waiting for admin approval.');
window.location.href='http://localhost/php/php_/hostel-management-system/index.php';
</script>";
?>
