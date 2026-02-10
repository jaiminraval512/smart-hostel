<?php
include "../sql/db.php";

if (!isset($_GET['id'])) {
    header("Location: view_students.php");
    exit;
}

$id = mysqli_real_escape_string($cnn, $_GET['id']);
$sql = "SELECT * FROM student_admission WHERE student_id='$id'";
$result = mysqli_query($cnn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Student Not Found'); window.location='view_students.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | <?php echo $data['full_name']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container">
        <?php include "../admin/admin_sidebar.php"; ?>

        <div class="content_body">
            <header class="top_header profile_top">
                <div class="header_info">
                    <h1>Student Details</h1>
                    <span>ID: #<?php echo $data['student_id']; ?></span>
                </div>
                <a href="view_students.php" class="btn_back"><i class="fas fa-arrow-left"></i> Back to List</a>
            </header>

            <div class="profile_wrapper">
                
                <div class="profile_side">
                    <div class="info_card photo_card text-center">
                        <p class="doc_label_top">Passport Photo</p>
                        <div class="profile_image_container">
                            <?php 
                                $img_path = "/php/php_/uploads/students/" . $data['passport_photo']; 
                            ?>
                            <img src="<?php echo $img_path; ?>" alt="Profile" class="student_profile_img">
                        </div>
                        <h2 class="student_name_title"><?php echo $data['full_name']; ?></h2>
                        <span class="room_tag">Room: <?php echo $data['room_number']; ?></span>
                    </div>

                    <div class="info_card">
                        <h3 class="card_title"><i class="fas fa-file-pdf"></i> Documents</h3>
                        <div class="doc_links">
                            <?php if(!empty($data['aadhar_card'])): ?>
                                <a href="/php/php_/uploads/students/<?php echo $data['aadhar_card']; ?>" target="_blank" class="doc_item">
                                    <i class="fas fa-id-card"></i> View Aadhaar Card <i class="fas fa-external-link-alt"></i>
                                </a>
                            <?php else: ?>
                                <div class="error_msg"><i class="fas fa-exclamation-circle"></i> Aadhaar not uploaded</div>
                            <?php endif; ?>

                            <?php if(!empty($data['marksheet'])): ?>
                                <a href="/php/php_/uploads/students/<?php echo $data['marksheet']; ?>" target="_blank" class="doc_item">
                                    <i class="fas fa-graduation-cap"></i> View Marksheet <i class="fas fa-external-link-alt"></i>
                                </a>
                            <?php else: ?>
                                <div class="error_msg"><i class="fas fa-exclamation-circle"></i> Marksheet not uploaded</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="profile_main">
                    
                    <div class="info_card">
                        <h3 class="card_title"><i class="fas fa-user-circle"></i> Personal Details</h3>
                        <div class="detail_grid">
                            <div class="detail_item"><label>Gender</label> <span><?php echo $data['gender']; ?></span></div>
                            <div class="detail_item"><label>DOB</label> <span><?php echo $data['date_of_birth']; ?></span></div>
                            <div class="detail_item"><label>Mobile</label> <span><?php echo $data['mobile_number']; ?></span></div>
                            <div class="detail_item"><label>Email</label> <span><?php echo $data['email']; ?></span></div>
                            <div class="detail_item"><label>City</label> <span><?php echo $data['city']; ?></span></div>
                            <div class="detail_item"><label>State</label> <span><?php echo $data['state']; ?></span></div>
                        </div>
                    </div>

                    <div class="info_card">
                        <h3 class="card_title"><i class="fas fa-university"></i> Academic Details</h3>
                        <div class="detail_grid">
                            <div class="detail_item"><label>College</label> <span><?php echo $data['college_name']; ?></span></div>
                            <div class="detail_item"><label>Course</label> <span><?php echo $data['course_name']; ?></span></div>
                            <div class="detail_item"><label>Year/Sem</label> <span><?php echo $data['year_sem']; ?></span></div>
                            <div class="detail_item"><label>Enrollment No</label> <span><?php echo $data['enrollment_no']; ?></span></div>
                        </div>
                    </div>

                    <div class="info_card">
                        <h3 class="card_title"><i class="fas fa-users"></i> Hostel & Guardian</h3>
                        <div class="detail_grid">
                            <div class="detail_item"><label>Admission Date</label> <span><?php echo $data['admission_date']; ?></span></div>
                            <div class="detail_item"><label>Duration</label> <span><?php echo $data['duration']; ?> Month(s)</span></div>
                            <div class="detail_item"><label>Guardian Name</label> <span><?php echo $data['guardian_name']; ?></span></div>
                            <div class="detail_item"><label>Relation</label> <span><?php echo $data['relation']; ?></span></div>
                            <div class="detail_item"><label>G. Mobile</label> <span><?php echo $data['guardian_mobile']; ?></span></div>
                            <div class="detail_item"><label>Emergency Contact</label> <span><?php echo $data['emergency_contact']; ?></span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>