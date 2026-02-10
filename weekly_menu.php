<?php
include "sql/db.php";
$menu_res = mysqli_query($cnn, "SELECT * FROM mess_menu");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weekly_menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include "includes/header.php"; ?>
    <div class="dashboard-layout">
        <?php include "includes/sidebar.php"; ?>
        <main class="main-content">
            <h2 class="hos-main">🍴 Hostel Weekly Mess Menu</h2>

            <div class="tbl-container">
                <table class="tbl">
                    <thead class="t-header">
                        <tr>
                            <th>Day</th>
                            <th>Breakfast (Savar)</th>
                            <th>Lunch (Bapor)</th>
                            <th>Dinner (Raat)</th>
                        </tr>
                    </thead>
                    <tbody class="t-body">
                        <?php while ($data = mysqli_fetch_assoc($menu_res)) {
                            $sunday_class = ($data['day_name'] == 'Sunday') ? 'sunday-row' : '';
                        ?>
                            <tr class="tr <?php echo $sunday_class; ?>">
                                <td class="day-column"><?php echo $data['day_name']; ?></td>
                                <td><?php echo $data['breakfast']; ?></td>
                                <td class="lunch"><?php echo $data['lunch']; ?></td>
                                <td class="<?php echo ($data['day_name'] == 'Sunday') ? 'special-dinner' : ''; ?>">
                                    <?php echo $data['dinner']; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="menu-note">
                <div class="note-container">
                    <div class="note-grid">
                        <div class="note-item">
                            <div class="timig">
                                <p>
                                    <strong>Mess Timings :</strong><br>
                                    🍳 Breakfast : 7:00 AM – 8:30 AM <br>
                                    🍛 Lunch : 12:00 PM – 2:00 PM <br>
                                    🍽 Dinner : 7:30 PM – 8:30 PM
                                </p>
                            </div>
                        </div>
                        <div class="note-grid">

                            <h3 class="note-title"><i class="fas fa-info-circle"></i> Important Terms & Conditions</h3>
                            <div class="note-item">
                                <div class="note-text">
                                    <p>
                                        <strong>Meal Skip Information :</strong>
                                        If any student does not wish to take a meal on a particular day, they must inform the hostel authorities in advance.
                                    </p>
                                </div>
                            </div>
                            <div class="note-item">
                                <div class="note-text">
                                    <p>
                                        <strong>Late Arrival Notice :</strong>
                                        Students who are likely to arrive late during meal timings must inform the mess in advance. Food availability cannot be guaranteed without prior notice.
                                    </p>
                                </div>
                            </div>



                            <div class="note-item">

                                <div class="note-text">

                                    <p> <strong>Seasonal Vegetables : </strong>The menu is subject to change based on the availability of fresh seasonal vegetables in the market.</p>
                                </div>
                            </div>

                            <div class="note-item">

                                <div class="note-text">

                                    <p> <strong>Menu Flexibility :</strong>Management reserves the right to make minor changes to the menu without prior notice if necessary.</p>
                                </div>
                            </div>

                            <div class="note-item">

                                <div class="note-text">

                                    <p> <strong>Festivals & Events :</strong>Special Gujarati delicacies and sweets will be served during festivals and hostel events.</p>
                                </div>
                            </div>

                            <div class="note-item">

                                <div class="note-text">

                                    <p> <strong>Zero Wastage :</strong>Kindly take only what you can consume. Let's work together to minimize food wastage.</p>
                                </div>
                            </div>
                        </div>
                    </div>
        </main>

    </div>
    <?php include "includes/footer.php" ?>
</body>

</html>