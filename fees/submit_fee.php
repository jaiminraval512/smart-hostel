<?php
session_start();
include "../sql/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/Login.php");
    exit;
}

$student_id = $_SESSION['student_id'];
$mode = $_POST['mode'];

if($mode == "online"){

    $txn_id = mysqli_real_escape_string($cnn, $_POST['txn_id']);

    mysqli_query($cnn, "UPDATE student_fees 
        SET transaction_id='$txn_id',
            payment_mode='online',
            status='pending'
        WHERE student_id='$student_id'");

}

else if($mode == "offline"){

    $receipt = mysqli_real_escape_string($cnn, $_POST['receipt_no']);

    mysqli_query($cnn, "UPDATE student_fees 
        SET receipt_no='$receipt',
            payment_mode='offline',
            status='pending'
        WHERE student_id='$student_id'");
}

echo "<script>
alert('Details submitted. Waiting for admin approval.');
window.location.href='../index.php';
</script>";
?>
