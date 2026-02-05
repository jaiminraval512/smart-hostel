
<?php
include "../includes/header.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>
<?php
$cnn = mysqli_connect("localhost", "root", "", "smart-hostel") or die("not connect");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Student Registration</title>
</head>

<body>

    <div class="dashboard-layout">

        <?php include "../includes/sidebar.php"; ?>

        <main class="main-content">
            <h1>Student Admission Form</h1>

            <div class="registration-box">
                <form action="" method="post" class="admission-form" enctype="multipart/form-data">
                    <h3>Personal Details</h3>
                    <div class="part-box">
                        <div class="one-line"><label>Full Name</label>
                            <input type="text" name="full_name" placeholder="Enter full name">
                        </div>
                        <div class="one-line">
                            <label>Student ID</label>
                            <input type="text" name="student_id" placeholder="Enter Student ID" required>
                        </div>

                        <div class="one-line"> <label>Gender</label>
                            <select name="gender">
                                <option value="">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="one-line"><label>Date of Birth</label>
                            <input type="date" name="date_of_birth">
                        </div>

                        <div class="one-line"> <label>Mobile Number</label>
                            <input type="text" name="mobile_number" placeholder="Enter mobile number">
                        </div>

                        <div class="one-line"><label>Email</label>
                            <input type="email" name="email" placeholder="Enter email address">
                        </div>

                        <div class="one-line"><label>City</label>
                            <input type="text" name="city" placeholder="Enter city">
                        </div>
                        <div class="one-line"> <label>State</label>
                            <input type="text" name="state" placeholder="Enter state">
                        </div>
                    </div>

                    <h3>Academic Details</h3>
                    <div class="part-box">
                        <div class="one-line"> <label>College / School Name</label>
                            <input type="text" name="college_name" placeholder="Enter college/school name">
                        </div>

                        <div class="one-line"><label>Year / Semester</label>
                            <input type="text" name="year_sem" placeholder="e.g. 1st Year / Sem 2">
                        </div>

                        <div class="one-line"><label>Enrollment No / Roll No</label>
                            <input type="text" name="enrollment_no" placeholder="Enter enrollment or roll number">
                        </div>

                        <div class="one-line"><label>Course Name</label>
                            <input type="text" name="course_name" placeholder="Enter course name">
                        </div>
                    </div>

                    <h3>Hostel Details</h3>
                    <div class="part-box">
                        <div class="one-line"><label>Room Number</label>
                            <input type="text" name="room_number" placeholder="Enter room number">
                        </div>
                        <div class="one-line"><label>Admission Date</label>
                            <input type="date" name="admission_date">
                        </div>

                        <div class="form-group">
                            <div class="one-line"><label for="duration">Stay Duration</label>
                                <select name="duration" id="duration" class="form-control" required>
                                    <option value="">-- Select Duration --</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h3>Guardian Details</h3>
                    <div class="part-box">
                        <div class="one-line"><label>Guardian Name</label>
                            <input type="text" name="guardian_name" placeholder="Enter guardian name">
                        </div>

                        <div class="one-line"> <label>Relation</label>
                            <select name="relation" required>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                                <option value="Guardian">other</option>
                            </select>
                        </div>

                        <div class="one-line"><label>Guardian Mobile Number</label>
                            <input type="text" name="guardian_mobile" placeholder="Enter guardian mobile number">
                        </div>

                        <div class="one-line"><label>Emergency Contact Number</label>
                            <input type="text" name="emergency_contact" placeholder="Enter emergency contact number">
                        </div>
                    </div>

                    <br>
                    <h3>Document Upload</h3>
                    <div class="part-box">
                        <div class="one-line">
                            <label>Passport Size Photo</label>
                            <input type="file" name="passport_photo" accept="image/*" required>
                        </div>

                        <div class="one-line">
                            <label>Aadhaar Card</label>
                            <input type="file" name="aadhar_card" accept="image/*,.pdf" required>
                        </div>

                        <div class="one-line"><label>Previous Year Marksheet</label>
                            <input type="file" name="marksheet" accept="image/*,.pdf" required>
                        </div>
                    </div>

                    <h3>Hostel Rules & Declaration</h3>
                    <div class="part-box">
                        <div class="rules-box">
                            <label id="rull">
                                <input type="checkbox" id="agree_rules" class="check">
                                I hereby declare that all the information provided is true and correct.
                            </label><br>

                            <label id="rull">
                                <input type="checkbox" id="agree_discipline" class="check">
                                I will follow all hostel rules and regulations.
                            </label><br>

                            <label id="rull">
                                <input type="checkbox" id="agree_damage" class="check">
                                I am responsible for any damage caused to hostel property.
                            </label><br>
                            <label id="rull">
                                <input type="checkbox" id="paid_rule" class="check">
                               <strong>Note:</strong> The hostel fee must be paid within 15 days of admission; otherwise, the admission will be automatically cancelled. The student will be held fully responsible for this.
                            </label><br>

                            <label id="rull">
                                <input type="checkbox" id="agree_refund" class="check">
                                Hostel fees are non-refundable as per hostel policy.
                            </label>
   
</div>
                        </div>
                    </div>

                    <div class="sbm">
                        <input type="submit" name="submit" value="Submit Admission" id="submitBtn" disabled>
                        <input type="reset" value="↻ reset-form" id="reset">
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php include "../includes/footer.php"; ?>

</body>
<script>
    const checkboxes = document.querySelectorAll('.rules-box input[type="checkbox"]');
    const submitBtn = document.getElementById('submitBtn');

    function checkRules() {
        let allChecked = true;
        checkboxes.forEach(cb => {
            if (!cb.checked) {
                allChecked = false;
            }
        });
        submitBtn.disabled = !allChecked;
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', checkRules);
    });
</script>

</html>

<?php
if (isset($_POST['submit'])) {
    $student_id = mysqli_real_escape_string($cnn, $_POST['student_id']);

    $user_exists = mysqli_query($cnn, "SELECT * FROM users WHERE student_id = '$student_id'");
    if (mysqli_num_rows($user_exists) == 0) {
        echo "<script>
        alert('Invalid Student ID! Please register your account first.');
        window.history.back();
        </script>";
        exit;
    }

    $already_admitted = mysqli_query($cnn, "SELECT * FROM student_admission WHERE student_id = '$student_id'");
    if (mysqli_num_rows($already_admitted) > 0) {
        echo "<script>
        alert('This Student ID is already registered for admission!');
        window.history.back();
        </script>";
        exit;
    }

    $full_name = mysqli_real_escape_string($cnn, $_POST['full_name']);
    $folder_name = strtolower($full_name);
    $folder_name = preg_replace('/[^a-z0-9 ]/i', '', $folder_name);
    $folder_name = str_replace(' ', '_', $folder_name);

    $base_upload_dir = "C:/wamp/www/php/php_/uploads/students/";
    $student_folder = $base_upload_dir . $folder_name . "/";

    if (!is_dir($student_folder)) {
        mkdir($student_folder, 0777, true);
    }

    $passport_ext  = pathinfo($_FILES['passport_photo']['name'], PATHINFO_EXTENSION);
    $aadhar_ext    = pathinfo($_FILES['aadhar_card']['name'], PATHINFO_EXTENSION);
    $marksheet_ext = pathinfo($_FILES['marksheet']['name'], PATHINFO_EXTENSION);

    $passport_name  = "passport." . $passport_ext;
    $aadhar_name    = "aadhar." . $aadhar_ext;
    $marksheet_name = "marksheet." . $marksheet_ext;

    $passport_path  = $student_folder . $passport_name;
    $aadhar_path    = $student_folder . $aadhar_name;
    $marksheet_path = $student_folder . $marksheet_name;

    move_uploaded_file($_FILES['passport_photo']['tmp_name'], $passport_path);
    move_uploaded_file($_FILES['aadhar_card']['tmp_name'], $aadhar_path);
    move_uploaded_file($_FILES['marksheet']['tmp_name'], $marksheet_path);

    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $college_name = $_POST['college_name'];
    $year_sem = $_POST['year_sem'];
    $enrollment_no = $_POST['enrollment_no'];
    $course_name = $_POST['course_name'];
    $room_number = $_POST['room_number'];
    $admission_date = $_POST['admission_date'];
    $duration = $_POST['duration'];
    $guardian_name = $_POST['guardian_name'];
    $relation = $_POST['relation'];
    $guardian_mobile = $_POST['guardian_mobile'];
    $emergency_contact = $_POST['emergency_contact'];

    $passport_db  = $folder_name . "/" . $passport_name;
    $aadhar_db    = $folder_name . "/" . $aadhar_name;
    $marksheet_db = $folder_name . "/" . $marksheet_name;

    $insertt = "INSERT INTO student_admission (
        full_name, student_id, gender, date_of_birth, mobile_number, email,
        city, state, college_name, year_sem, enrollment_no,
        course_name, room_number, admission_date, duration,
        guardian_name, relation, guardian_mobile, emergency_contact,
        passport_photo, aadhar_card, marksheet
    ) VALUES (
        '$full_name', '$student_id', '$gender', '$date_of_birth', '$mobile_number', '$email',
        '$city', '$state', '$college_name', '$year_sem', '$enrollment_no',
        '$course_name', '$room_number', '$admission_date', '$duration',
        '$guardian_name', '$relation', '$guardian_mobile', '$emergency_contact',
        '$passport_db', '$aadhar_db', '$marksheet_db'
    )";

    $input = mysqli_query($cnn, $insertt);

    $admission_date_fees = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime('+15 days'));
    $fixed_fee = 30000;

    
    mysqli_query($cnn, "INSERT INTO student_fees 
(student_id, admission_date, due_date, fixed_fee, status) 
VALUES 
('$student_id','$admission_date_fees','$due_date','$fixed_fee','unpaid')");

    if ($input) {
?>
        <script>
            alert("student registration Successful !");
            window.location.href = "http://localhost/php/php_/hostel-management-system/index.php";
        </script>
    <?php
        exit();
    } else {
    ?>
        <script>
            alert("registration failed ❌❌");
        </script>
<?php
        echo mysqli_error($cnn);
    }
}
?>