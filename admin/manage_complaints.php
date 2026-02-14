<?php
include "../sql/db.php"; 

// Update Action Logic
if (isset($_POST['update_action'])) {
    $id = mysqli_real_escape_string($cnn, $_POST['comp_id']);
    $status = mysqli_real_escape_string($cnn, $_POST['status']);
    $remark = mysqli_real_escape_string($cnn, $_POST['remark']);
    
    $update = "UPDATE student_complaints SET status='$status', admin_remark='$remark' WHERE id='$id'";
    if(mysqli_query($cnn, $update)) {
        echo "<script>alert('Action Updated Successfully'); window.location='manage_complaints.php';</script>";
    }
}

// Fetch all complaints with student details
$all_comps = mysqli_query($cnn, "SELECT c.*, s.full_name, s.room_number 
                                FROM student_complaints c 
                                JOIN student_admission s ON c.student_id = s.student_id 
                                ORDER BY c.id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Complaint Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container" id="admin-comp-layout">
        <?php include "admin_sidebar.php"; ?>

        <div class="content_body" id="admin-comp-body">
            <header class="top_header">
                <h1><i class="fas fa-tools"></i> Manage Student Complaints</h1>
                <p>Review and resolve issues reported by hostel residents.</p>
            </header>

            <div class="table_container" id="admin-table-wrapper">
                <table class="edit_menu_table" id="admin-comp-table">
                    <thead>
                        <tr>
                            <th>Student & Room</th>
                            <th>Complaint Details</th>
                            <th>Action & Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($all_comps)){ ?>
                        <tr>
                            <td class="admin-student-info">
                                <strong><?= $row['full_name'] ?></strong><br>
                                <span class="room_badge">Room: <?= $row['room_number'] ?></span>
                            </td>
                            <td class="admin-comp-details">
                                <span class="category_tag"><?= $row['category'] ?></span>
                                <p class="comp_desc_text"><?= $row['description'] ?></p>
                                <small class="comp_date"><i class="far fa-clock"></i> <?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></small>
                            </td>
                            <td class="admin-action-col">
                                <form method="POST" class="admin-action-form">
                                    <input type="hidden" name="comp_id" value="<?= $row['id'] ?>">
                                    
                                    <textarea name="remark" class="edit_input admin-textarea" placeholder="Write your response..."><?= $row['admin_remark'] ?></textarea>
                                    
                                    <div class="admin-status-row">
                                        <select name="status" class="edit_input admin-status-select">
                                            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="In Progress" <?= $row['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                            <option value="Solved" <?= $row['status'] == 'Solved' ? 'selected' : '' ?>>Solved</option>
                                        </select>
                                        <button type="submit" name="update_action" class="btn_update" id="admin-update-btn">
                                            Update
                                        </button>
                                    </div>
                                </form>
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