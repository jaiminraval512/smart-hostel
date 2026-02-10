<?php
include "../sql/db.php"; // Database connection

// Menu Update karne ka logic
if(isset($_POST['update_menu'])){
    $id = mysqli_real_escape_string($cnn, $_POST['menu_id']);
    $breakfast = mysqli_real_escape_string($cnn, $_POST['breakfast']);
    $lunch = mysqli_real_escape_string($cnn, $_POST['lunch']);
    $dinner = mysqli_real_escape_string($cnn, $_POST['dinner']);

    $update = "UPDATE mess_menu SET breakfast='$breakfast', lunch='$lunch', dinner='$dinner' WHERE id='$id'";
    
    if(mysqli_query($cnn, $update)){
        echo "<script>alert('Menu Updated Successfully'); window.location='edit_menu.php';</script>";
    } else {
        echo "<script>alert('Error updating menu');</script>";
    }
}

$query = mysqli_query($cnn, "SELECT * FROM mess_menu");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Update Mess Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container">
        <?php include "admin_sidebar.php"; ?>

        <div class="content_body">
            <header class="top_header">
                <h1><i class="fas fa-edit"></i> Update Weekly Mess Menu</h1>
            </header>

            <div class="table_container">
                <table class="edit_menu_table">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Breakfast (Savar)</th>
                            <th>Lunch (Bapor)</th>
                            <th>Dinner (Raat)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($query)){ ?>
                        <form method="POST">
                            <tr>
                                <td class="day_label"><strong><?php echo $row['day_name']; ?></strong></td>
                                <td><textarea name="breakfast" class="edit_input"><?php echo $row['breakfast']; ?></textarea></td>
                                <td><textarea name="lunch" class="edit_input"><?php echo $row['lunch']; ?></textarea></td>
                                <td><textarea name="dinner" class="edit_input"><?php echo $row['dinner']; ?></textarea></td>
                                <td>
                                    <input type="hidden" name="menu_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="update_menu" class="btn_update">
                                        <i class="fas fa-sync-alt"></i> Update
                                    </button>
                                </td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>