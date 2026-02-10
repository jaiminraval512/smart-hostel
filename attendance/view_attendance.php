<?php
include "../includes/header.php";

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel")
   or die("Database Not Connect");

if (!isset($_SESSION['student_id'])) {
   header("Location: ../auth/login.php");
   exit();
}

$sid = $_SESSION['student_id'];

$from = $_POST['from'] ?? '';
$to   = $_POST['to']   ?? '';

$where = "WHERE student_id='$sid'";

if ($from != "" && $to != "") {
   $where .= " AND att_date BETWEEN '$from' AND '$to'";
}

$att = mysqli_query($cnn,
"SELECT * FROM student_attendance $where
 ORDER BY att_date DESC");

$total = mysqli_num_rows($att);

$present_q =
"SELECT * FROM student_attendance
 WHERE student_id='$sid'
 AND status='Present'";

if ($from && $to) {
   $present_q .= " AND att_date BETWEEN '$from' AND '$to'";
}

$present = mysqli_num_rows(mysqli_query($cnn, $present_q));

$absent_q =
"SELECT * FROM student_attendance
 WHERE student_id='$sid'
 AND status='Absent'";

if ($from && $to) {
   $absent_q .= " AND att_date BETWEEN '$from' AND '$to'";
}

$absent = mysqli_num_rows(mysqli_query($cnn, $absent_q));

$per = $total > 0 ? round($present / $total * 100, 2) : 0;
?>
<!DOCTYPE html>
<html>
<head>
<title>My Attendance</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css">

<style>
/* ------- FIXED ATTENDANCE CSS ------- */

.att-container{
   padding:20px;
}

.att-summary{
   display:flex;
   gap:20px;
   margin:15px 0;
}

.att-card{
   width:180px;
   padding:15px;
   background:white;
   text-align:center;
   border-radius:12px;
   box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.att-filter{
   background:#f8f8f8;
   padding:12px;
   border-radius:8px;
   margin:10px 0;
}

.att-table{
   width:100%;
   margin-top:10px;
}

.present{color:green;font-weight:bold}
.absent{color:red;font-weight:bold}

</style>

<script>
function printPage(){
 window.print();
}

function downloadPDF(){
 window.location='download_pdf.php?from=<?= $from ?>&to=<?= $to ?>';
}
</script>

</head>

<body>

<div class="dashboard-layout">

<!-- SIDEBAR LEFT -->
<?php include "../includes/sidebar.php"; ?>

<!-- MAIN RIGHT -->
<main class="main-content">

<div class="att-container">

<h2>My Attendance</h2>

<!-- SUMMARY -->
<div class="att-summary">

<div class="att-card">
Total<br>
<b><?= $total ?></b>
</div>

<div class="att-card">
Present<br>
<b style="color:green"><?= $present ?></b>
</div>

<div class="att-card">
Absent<br>
<b style="color:red"><?= $absent ?></b>
</div>

<div class="att-card">
Percentage<br>
<b><?= $per ?> %</b>
</div>

</div>

<!-- FILTER -->
<div class="att-filter">

<form method="post">

From:
<input type="date" name="from"
 value="<?= $from ?>">

To:
<input type="date" name="to"
 value="<?= $to ?>">

<button class="btn">Search</button>

<a href="" class="btn">Reset</a>

<button type="button" onclick="printPage()" class="btn">
Print
</button>

<button type="button" onclick="downloadPDF()" class="btn">
PDF
</button>

</form>

</div>

<!-- TABLE -->
<table class="att-table">

<tr>
<th>Date</th>
<th>Status</th>
</tr>

<?php while ($a = mysqli_fetch_assoc($att)) { ?>

<tr>
<td><?= $a['att_date']; ?></td>

<td class="<?= strtolower($a['status']); ?>">
<?= $a['status']; ?>
</td>
</tr>

<?php } ?>

</table>

</div>
</main>
</div>
<?php include "../includes/footer.php" ?>
</body>
</html>
