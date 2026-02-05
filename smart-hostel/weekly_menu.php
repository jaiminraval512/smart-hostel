<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Weekly Mess Menu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
                        <tr class="tr">
                            <td class="day-column">Monday</td>
                            <td>Methi Thepla & Chutney</td>
                            <td class="lunch">Vadi Nu Shaak, Rotli, Dal-Bhaat</td>
                            <td>Bataka Nu Shaak, Rotli & Chaas</td>
                        </tr>
                        <tr class="tr">
                            <td class="day-column">Tuesday</td>
                            <td>Masala Poha & Sev</td>
                            <td class="lunch">Ringan Bataka, Rotli, Dal-Bhaat</td>
                            <td>Sev Tameta Nu Shaak & Bhakhri</td>
                        </tr>
                        <tr class="tr">
                            <td class="day-column">Wednesday</td>
                            <td>Gathiya & Papdi</td>
                            <td class="lunch">Chana Nu Shaak, Rotli, Dal-Bhaat</td>
                            <td>Kadhi-Khichdi & Aloo Bhujia</td>
                        </tr>
                        <tr class="tr">
                            <td class="day-column">Thursday</td>
                            <td>Upma / Vaghareli Rotli</td>
                            <td class="lunch">Dudhi Nu Shaak, Rotli, Dal-Bhaat</td>
                            <td>Vaghareli Khichdi & Dahi</td>
                        </tr>
                        <tr class="tr">
                            <td class="day-column">Friday</td>
                            <td>Khaman Dhokla</td>
                            <td class="lunch">Mix Kathol (Chana/Moong), Rotli, Dal-Bhaat</td>
                            <td>Bhinda Nu Shaak, Rotli & Dal</td>
                        </tr>
                        <tr class="tr">
                            <td class="day-column">Saturday</td>
                            <td>Aloo Paratha</td>
                            <td class="lunch">Guvar nu Shaak, Rotli, Dal-Bhaat</td>
                            <td>dahi ni tikhari ya Vegetable Pulao</td>
                        </tr>
                        <tr class="sunday-row tr">
                            <td class="day-column">Sunday</td>
                            <td>Puri Bhaji & Tea</td>
                            <td class="lunch">Gujarati Dal, Bhaat, Rotli & Bataka Nu Shaak</td>
                            <td class="special-dinner">
                                <strong>🌟Special:</strong> Pav Bhaji / Chole Bhature & Gulab Jamun <br>
                                <small>(Alternating: Manchurian, Dosa or Samosa)</small>
                            </td>
                        </tr>
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