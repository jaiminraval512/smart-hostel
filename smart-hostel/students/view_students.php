<?php
include "../sql/db.php";

$sql = "SELECT full_name, student_id, room_number 
        FROM student_admission";

$result = mysqli_query($cnn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($cnn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div class="main">
        <?php include "../admin/admin_sidebar.php"; ?>
        <div class="table" >
             <h2>Student List</h2>
            <table cellpadding="10" cellspacing="0" width="100%" border="1">
                <thead>                <tr>
                    <th>Name</th>
                    <th>student id </th></th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['room_number']; ?></td>
                        <td>
                            <a href="student_view.php?id=<?php echo $row['student_id']; ?>">
                                View Details
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>