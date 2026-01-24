<?php
include "../sql/db.php";

if (!isset($_GET['id'])) {
    echo " invalid id ";
    exit;
}
$id = $_GET['id'];
$sql = " select * from student_admission where enrollment_no='$id' ";
$result = mysqli_query($cnn, $sql);
if (!$result) {
    die("Query Failed: " . mysqli_error($cnn));
}
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Student not found";
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/style.css">
</head>

<body>
    <div class="main">
        <?php include "../admin/admin_sidebar.php"; ?>
    <div class="detail-box">
        <div class="personal">
            <h3>Personal Details</h3>
            <p><strong>Name:</strong> <?php echo $data['full_name']; ?></p>
            <p><strong>Gender:</strong> <?php echo $data['gender']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $data['date_of_birth']; ?></p>
            <p><strong>Mobile:</strong> <?php echo $data['mobile_number']; ?></p>
            <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
            <p><strong>City:</strong> <?php echo $data['city']; ?></p>
            <p><strong>State:</strong> <?php echo $data['state']; ?></p>
        </div>
        <div class="acadmic">
            <h3>Academic Details</h3>
            <p><strong>College:</strong> <?php echo $data['college_name']; ?></p>
            <p><strong>Course:</strong> <?php echo $data['course_name']; ?></p>
            <p><strong>Year/Sem:</strong> <?php echo $data['year_sem']; ?></p>
            <p><strong>Enrollment No:</strong> <?php echo $data['enrollment_no']; ?></p>

        </div>
        <div class="hostel">
            <h3>Hostel Details</h3>
            <p><strong>Room Number:</strong> <?php echo $data['room_number']; ?></p>
            <p><strong>Admission Date:</strong> <?php echo $data['admission_date']; ?></p>
            <p><strong>Duration:</strong> <?php echo $data['duration']; ?></p>
        </div>
        <div class="guardiuns">
            <h3>Guardian Details</h3>
            <p><strong>Guardian Name:</strong> <?php echo $data['guardian_name']; ?></p>
            <p><strong>Relation:</strong> <?php echo $data['relation']; ?></p>
            <p><strong>Guardian Mobile:</strong> <?php echo $data['guardian_mobile']; ?></p>
            <p><strong>Emergency Contact:</strong> <?php echo $data['emergency_contact']; ?></p>
        </div>
        <div class="documents">
            <h3>Documents</h3>

            <p>
                <strong>Passport Photo:</strong><br>
                <img src="/php/php_/uploads/students/<?php echo $data['passport_photo']; ?>" width="120">
            </p>

            <p>
                <strong>Aadhaar Card:</strong>
                <a href="/php/php_/uploads/students/<?php echo $data['aadhar_card']; ?>" target="_blank">
                    View Aadhaar
                </a>
            </p>

            <p>
                <strong>Marksheet:</strong>
                <a href="/php/php_/uploads/students/<?php echo $data['marksheet']; ?>" target="_blank">
                    View Marksheet
                </a>
            </p>

        </div>
    </div>
    </div>
</body>

</html>