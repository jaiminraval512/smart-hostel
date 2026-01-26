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
            <div class="student-con">
                <h1>Student Details </h1>
                <div class="personal boxx">
                    <h3>Personal Details</h3>
                    
                    <div class="field-group">
                        <div class="label">Name:</div>
                        <div class="value"><?php echo $data['full_name']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Gender:</div>
                        <div class="value"><?php echo $data['gender']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Date of Birth:</div>
                        <div class="value"><?php echo $data['date_of_birth']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Mobile:</div>
                        <div class="value"><?php echo $data['mobile_number']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Email:</div>
                        <div class="value"><?php echo $data['email']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">City:</div>
                        <div class="value"><?php echo $data['city']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">State:</div>
                        <div class="value"><?php echo $data['state']; ?></div>
                    </div>
                    
                </div>

                <div class="acadmic boxx">
                    <h3>Academic Details</h3>
                   
                    <div class="field-group">
                        <div class="label">College:</div>
                        <div class="value"><?php echo $data['college_name']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Course:</div>
                        <div class="value"><?php echo $data['course_name']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Year/Sem:</div>
                        <div class="value"><?php echo $data['year_sem']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Enrollment No:</div>
                        <div class="value"><?php echo $data['enrollment_no']; ?></div>
                    </div>
                </div>

                <div class="hostel boxx">
                    <h3>Hostel Details</h3>
                    
                    <div class="field-group">
                        <div class="label">Room Number:</div>
                        <div class="value"><?php echo $data['room_number']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Admission Date:</div>
                        <div class="value"><?php echo $data['admission_date']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Duration:</div>
                        <div class="value"><?php echo $data['duration']; ?></div>
                    </div>
                </div>

                <div class="guardiuns boxx">
                    <h3>Guardian Details</h3>
                    <div class="field-group">
                        <div class="label">Guardian Name:</div>
                        <div class="value"><?php echo $data['guardian_name']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Relation:</div>
                        <div class="value"><?php echo $data['relation']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Guardian Mobile:</div>
                        <div class="value"><?php echo $data['guardian_mobile']; ?></div>
                    </div>
                    <div class="field-group">
                        <div class="label">Emergency Contact:</div>
                        <div class="value"><?php echo $data['emergency_contact']; ?></div>
                    </div>
                </div>

                <div class="documents boxx">
                    <h3>Documents</h3>

                    <div class=" doc-group">
                        <div class="label">Passport Photo:</div>
                        <div class="value">
                            <img src="/php/php_/uploads/students/<?php echo $data['passport_photo']; ?>" width="120">
                        </div>
                    </div>

                    <div class="doc-group">
                        <div class="label">Aadhaar Card:</div>
                        <div class="value">
                            <a href="/php/php_/uploads/students/<?php echo $data['aadhar_card']; ?>" target="_blank">View Aadhaar</a>
                        </div>
                    </div>

                    <div class= "doc-group">
                        <div class="label">Marksheet:</div>
                        <div class="value">
                            <a href="/php/php_/uploads/students/<?php echo $data['marksheet']; ?>" target="_blank">View Marksheet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>