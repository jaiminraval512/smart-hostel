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

    <?php include "../includes/header.php"; ?>

    <div class="dashboard-layout">

        <?php include "../includes/sidebar.php"; ?>

        <main class="main-content">
            <h1>Student Admission Form</h1>

            <div class="registration-box">
                <form action="" method="post" class="admission-form">


                    <h3>Personal Details</h3>

                    <label>Full Name</label>
                    <input type="text" name="full_name" placeholder="Enter full name">

                    <label>Gender</label>
                    <select name="gender">
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>

                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth">


                    <!-- <h3>Contact Details</h3> -->

                    <label>Mobile Number</label>
                    <input type="text" name="mobile_number" placeholder="Enter mobile number">

                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email address">

                    <label>City</label>
                    <input type="text" name="city" placeholder="Enter city">

                    <label>State</label>
                    <input type="text" name="state" placeholder="Enter state">


                    <h3>Academic Details</h3>

                    <label>College / School Name</label>
                    <input type="text" name="college_name" placeholder="Enter college/school name">

                    <label>Year / Semester</label>
                    <input type="text" name="year_sem" placeholder="e.g. 1st Year / Sem 2">

                    <label>Enrollment No / Roll No</label>
                    <input type="text" name="enrollment_no" placeholder="Enter enrollment or roll number">

                    <label>Course Name</label>
                    <input type="text" name="course_name" placeholder="Enter course name">

                    <!-- HOSTEL DETAILS -->
                    <h3>Hostel Details</h3>

                    <label>Room Number</label>
                    <input type="text" name="room_number" placeholder="Enter room number">

                    <label>Admission Date</label>
                    <input type="date" name="admission_date">

                    <div class="form-group">
                        <label for="duration">Stay Duration</label>
                        <select name="duration" id="duration" class="form-control" required>
                            <option value="">-- Select Duration --</option>
                            <option value="3 Months">3 Months</option>
                            <option value="6 Months">6 Months</option>
                            <option value="1 Year">1 Year</option>
                            <option value="2 Years">2 Years</option>
                        </select>
                    </div>


                    <h3>Guardian Details</h3>

                    <label>Guardian Name</label>
                    <input type="text" name="guardian_name" placeholder="Enter guardian name">

                    <label>Relation</label>
                    <select name="relation" required>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Guardian">other</option>

                        <label>Guardian Mobile Number</label>
                        <input type="text" name="guardian_mobile" placeholder="Enter guardian mobile number">

                        <label>Emergency Contact Number</label>
                        <input type="text" name="emergency_contact" placeholder="Enter emergency contact number">


                        <br>
                        <input type="submit" name="submit" value="Submit Admission">

                </form>

            </div>
        </main>

    </div>

    <?php include "../includes/footer.php"; ?>

</body>

</html>


<?php
if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $insertt = "INSERT INTO student_admission (
    full_name, gender, date_of_birth, mobile_number, email, 
    city, state, college_name, year_sem, enrollment_no, 
    course_name, room_number, admission_date, duration, 
    guardian_name, relation, guardian_mobile, emergency_contact
) VALUES (
    '$full_name', '$gender', '$date_of_birth', '$mobile_number', '$email', 
    '$city', '$state', '$college_name', '$year_sem', '$enrollment_no', 
    '$course_name', '$room_number', '$admission_date', '$duration', 
    '$guardian_name', '$relation', '$guardian_mobile', '$emergency_contact'
)";

    $input = mysqli_query($cnn, $insertt);

    if ($input) {
    
?>


    <script>
        alert("stuent registration Successfull  🎊");
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
    mysqli_error($cnn);
}
}
?>