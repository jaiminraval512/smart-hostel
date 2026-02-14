<?php
include "includes/header.php"; 
include "sql/db.php"; 

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
$sid = $_SESSION['student_id'];

$msg = "";
if (isset($_POST['submit_comp'])) {
    $cat = mysqli_real_escape_string($cnn, $_POST['category']);
    $desc = mysqli_real_escape_string($cnn, $_POST['description']);
    $query = "INSERT INTO student_complaints (student_id, category, description) VALUES ('$sid', '$cat', '$desc')";
    
    if(mysqli_query($cnn, $query)) {
        $msg = "Complaint Registered Successfully!";
    }
}
$my_comps = mysqli_query($cnn, "SELECT * FROM student_complaints WHERE student_id='$sid' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaint Center | Smart Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   
    <div class="dashboard-layout" id="comp-page-layout">
        <?php include "includes/sidebar.php"; ?>
        
        <main class="main-content" id="comp-main-area">
            <div class="comp-header-section" id="header-wrapper">
                <h2 class="comp-main-title"><i class="fas fa-bullhorn"></i> Student Complaint Box</h2>
                <p class="comp-sub-text">Your comfort is our priority. Please explain your issue below.</p>
            </div>

            <?php if($msg != ""): ?>
                <div class="comp-alert-box" id="success-alert">
                    <i class="fas fa-check-circle"></i> <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <div class="comp-card-view" id="complaint-form-card">
                <form method="POST" class="comp-form" id="student-comp-form">
                    <div class="comp-input-group">
                        <label class="comp-label">Issue Category</label>
                        <select name="category" class="comp-select-field" id="issue-category" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="Electricity">Electricity</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Mess/Food">Mess/Food</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="comp-input-group">
                        <label class="comp-label">Explain your problem</label>
                        <textarea name="description" class="comp-textarea-field" id="issue-desc" placeholder="Enter details here..." required></textarea>
                    </div>

                    <button type="submit" name="submit_comp" class="comp-btn-submit" id="submit-btn">
                        <span>Register Complaint</span> <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>

            <div class="comp-history-section" id="complaint-history-area">
                <h3 class="comp-history-title"><i class="fas fa-history"></i> My Complaints Status</h3>
                <div class="comp-table-wrapper" id="history-table-container">
                    <table class="comp-data-table" id="complaints-list">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Problem Details</th>
                                <th>Current Status</th>
                                <th>Admin's Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($my_comps)){ ?>
                            <tr>
                                <td class="col-cat"><strong><?= $row['category'] ?></strong></td>
                                <td class="col-desc"><?= $row['description'] ?></td>
                                <td class="col-status">
                                    <span class="comp-status-badge badge-<?= strtolower(str_replace(' ', '-', $row['status'])) ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td class="col-remark">
                                    <div class="remark-box">
                                        <?= $row['admin_remark'] ? $row['admin_remark'] : '<span class="no-remark">Waiting for response...</span>' ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>