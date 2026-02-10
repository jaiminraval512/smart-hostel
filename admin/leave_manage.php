
<?php

$cnn = mysqli_connect("localhost", "root", "", "smart-hostel");



if (!$cnn) {

    die("Connection Failed");

}



$res = mysqli_query(

    $cnn,

    "SELECT l.*, s.full_name

     FROM student_leave l

     JOIN student_admission s

     ON l.student_id = s.student_id"

);



if (!$res) {

    die("Query Error: " . mysqli_error($cnn));

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main_container">
        <?php include "../admin/admin_sidebar.php"; ?>

        <div class="content_body">
            <header class="top_header">
                <h1>Student Leave Requests</h1>
            </header>

            <div class="table_container">
                <table class="leave_table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <td><strong><?= $r['full_name'] ?></strong></td>
                            <td><i class="far fa-calendar-alt"></i> <?= date('d M, Y', strtotime($r['from_date'])) ?></td>
                            <td><i class="far fa-calendar-check"></i> <?= date('d M, Y', strtotime($r['to_date'])) ?></td>
                            <td class="td-reason"><?= $r['reason'] ?></td>
                            <td>
                                <span class="status_badge status-<?= strtolower($r['status']) ?>">
                                    <?= ucfirst($r['status']) ?>
                                </span>
                            </td>
                            <td class="action_btns">
                                <a class="btn_action approve" href="approve.php?id=<?= $r['id'] ?>" title="Approve">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a class="btn_action reject" href="reject.php?id=<?= $r['id'] ?>" title="Reject">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>