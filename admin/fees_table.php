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
    <title>Pending Fees Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main_container">
        <?php include "../admin/admin_sidebar.php"; ?>
        
        <div class="content_body">
            <header class="top_header">
                <h1>Pending Fees Verification</h1>
            </header>

            <div class="table_container">
                <table class="fees_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Amount</th>
                            <th>Mode</th>
                            <th>Transaction / Receipt</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_assoc($q)){ ?>
                        <tr>
                            <td><strong><?php echo $row['full_name']; ?></strong></td>
                            <td>#<?php echo $row['student_id']; ?></td>
                            <td class="amount">₹<?php echo $row['fixed_fee']; ?></td>
                            <td>
                                <span class="badge <?php echo $row['payment_mode']; ?>">
                                    <?php echo strtoupper($row['payment_mode']); ?>
                                </span>
                            </td>
                            <td class="ref_no">
                                <?php
                                if($row['payment_mode']=="online")
                                    echo "<i class='fas fa-link'></i> " . $row['transaction_id'];
                                else
                                    echo "<i class='fas fa-receipt'></i> " . $row['receipt_no'];
                                ?>
                            </td>
                            <td><?php echo date('d M, Y', strtotime($row['due_date'])); ?></td>
                            <td>
                                <a href="mark_paid.php?id=<?php echo $row['student_id']; ?>" class="btn_approve">
                                    <i class="fas fa-check-circle"></i> Approve
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