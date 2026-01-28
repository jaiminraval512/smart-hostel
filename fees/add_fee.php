<?php
session_start();
include "../sql/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/Login.php");
    exit;
}

$student_id = $_SESSION['student_id'];

// 1. Pehle check karein ki kya record exist karta hai?
$q = mysqli_query($cnn, "SELECT * FROM student_fees WHERE student_id='$student_id'");
$fee = mysqli_fetch_assoc($q);

// 2. AGAR RECORD NAHI MILA, TO NAYA BANAO (Auto-Create)
if (!$fee) {
    $admission_date = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime('+15 days'));
    $fixed_fee = 30000;

    // Naya record insert karein
    $ins = mysqli_query($cnn, "INSERT INTO student_fees (student_id, admission_date, due_date, fixed_fee, status) 
                               VALUES ('$student_id', '$admission_date', '$due_date', '$fixed_fee', 'unpaid')");
    
    if($ins) {
        // Dubara fetch karein naye record ko
        $q = mysqli_query($cnn, "SELECT * FROM student_fees WHERE student_id='$student_id'");
        $fee = mysqli_fetch_assoc($q);
    } else {
        die("Error creating fee record: " . mysqli_error($cnn));
    }
}

// 3. Status checks
if ($fee['status'] == 'paid') {
    echo "<div style='text-align:center;margin-top:50px;'><h2>Fees Already Paid ✅</h2></div>";
    exit;
}

if ($fee['status'] == 'pending' && !empty($fee['transaction_id'])) {
    echo "<div style='text-align:center;margin-top:50px;'><h2>Verification in Progress ⏳</h2><p>Admin is checking your Transaction ID.</p></div>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pay Fees</title>
</head>
<body style="font-family: Arial; background: #f4f4f4;">

    <div style="max-width:400px;margin:60px auto;text-align:center;border:1px solid #ccc;padding:20px;border-radius:10px; background:white;">
        <h2>Pay Hostel Fees</h2>
        <p>Student ID: <b><?php echo $student_id; ?></b></p>
        <p><strong>Amount:</strong> ₹<?php echo $fee['fixed_fee']; ?></p>

        <img src="../assets/images/my_qr.jpg" width="250" style="border:1px solid #ddd; padding:5px;"><br><br>

        <form action="submit_fee.php" method="post">
            <input type="text" name="txn_id" placeholder="Enter Transaction ID" required
                style="width:90%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;"><br>
            <button type="submit" style="padding:10px 20px;background:green;color:white;border:none;border-radius:5px;cursor:pointer;">Submit Payment</button>
        </form>
    </div>

</body>
</html>