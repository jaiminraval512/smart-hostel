<?php
include "../includes/header.php";
include "../sql/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/Login.php");
    exit;
}

$student_id = $_SESSION['student_id'];

$q = mysqli_query($cnn, "SELECT * FROM student_fees WHERE student_id='$student_id'");
$fee = mysqli_fetch_assoc($q);

if (!$fee) {
    $admission_date = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime('+15 days'));
    $fixed_fee = 30000;

    mysqli_query($cnn, "INSERT INTO student_fees 
        (student_id, admission_date, due_date, fixed_fee, status) 
        VALUES ('$student_id', '$admission_date', '$due_date', '$fixed_fee', 'unpaid')");

    $q = mysqli_query($cnn, "SELECT * FROM student_fees WHERE student_id='$student_id'");
    $fee = mysqli_fetch_assoc($q);
}

$status_message = "";
$status_class = "";
$hide_form = false;
$disable_form = false;

if ($fee['status'] == 'paid') {
    $status_message = "Fees Already Paid ✅";
    $status_class = "success";
    $hide_form = true;
}

if ($fee['status'] == 'pending') {
    $status_message = "Verification in Progress ⏳";
    $status_class = "pending";
    $disable_form = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pay Fees</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body id="fee-body">

    <div id="layout" class="dashboard-layout">

        <?php include "../includes/sidebar.php"; ?>

        <main id="main" class="main-content">

            <div id="fee-box" class="fee-box">

                <?php if ($status_message != "") { ?>
                    <div id="status-msg" class="msg <?php echo $status_class; ?>">
                        <?php echo $status_message; ?>
                    </div>
                <?php } ?>

                <h2 id="title">Pay Hostel Fees</h2>

                <p id="sid">Student ID: <b><?php echo $student_id; ?></b></p>

                <p id="amount" class="amount">
                    Amount: ₹<?php echo $fee['fixed_fee']; ?>
                </p>

                <?php if (!$hide_form) { ?>

                    <div id="tabs" class="tabs">

                        <button id="tab-online"
                            onclick="show('online')">
                            Online Payment
                        </button>

                        <button id="tab-offline"
                            onclick="show('offline')">
                            Offline Payment
                        </button>

                    </div>

                    <!-- ONLINE -->
                    <div id="online" class="pay-section">

                        <img id="qr" src="../assets/images/my_qr.jpg">

                        <form id="online-form"
                            action="submit_fee.php"
                            method="post">

                            <input id="txn"
                                type="text"
                                name="txn_id"
                                placeholder="Enter Transaction ID"
                                <?php if ($disable_form) echo "disabled"; ?>
                                required>

                            <input type="hidden"
                                name="mode"
                                value="online">

                            <button id="online-btn"
                                type="submit"
                                <?php if ($disable_form) echo "disabled"; ?>>
                                Submit Online Payment
                            </button>

                        </form>
                    </div>

                    <!-- OFFLINE -->
                    <div id="offline"
                        class="pay-section"
                        style="display:none">

                        <p id="note">
                            Visit Hostel Office & Pay Cash
                        </p>

                        <form id="offline-form"
                            action="submit_fee.php"
                            method="post">

                            <input id="receipt"
                                type="text"
                                name="receipt_no"
                                placeholder="Enter Receipt No"
                                <?php if ($disable_form) echo "disabled"; ?>
                                required>

                            <input type="hidden"
                                name="mode"
                                value="offline">

                            <button id="offline-btn"
                                type="submit"
                                <?php if ($disable_form) echo "disabled"; ?>>
                                Submit Offline Details
                            </button>

                        </form>
                    </div>

                <?php } else { ?>

                    <div id="paid-box" class="paid-box">
                        Payment Completed Successfully ✔
                    </div>

                <?php } ?>

            </div>

        </main>
    </div>

    <script>
        function show(id) {

            document.getElementById('online').style.display = 'none';
            document.getElementById('offline').style.display = 'none';

            document.getElementById(id).style.display = 'block';

        }
    </script>

    <?php include "../includes/footer.php"; ?>

</body>

</html>