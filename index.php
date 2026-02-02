<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Smart Hostel</title>
    <link rel="shortcut icon" href="assets/images/favicon2.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet"> -->
</head>

<body>

    <?php include "includes/header.php"; ?>
    <div class="dashboard-layout">
 <?php include "includes/sidebar.php"; ?>
        
        <main class="main-content" name="main-content">
           
            <div class="hero">
                <div class="img">
                    <img src="assets/images/hostel_photo.jpg" width="100%" alt="img" class="img">

                </div>
                <div class="hero-content">
                    <h1>Find Your Perfect Home Away From Home</h1>
                    <p>Safe, Secure, and Comfortable Living for Students and Professionals.</p>
                    <button id="button">Book Now</button>
                </div>

            </div>
            <div class="sapration"></div>
            <div class="features">
                <div class="cards">
                    <div class="card">
                        <i class="fas fa-database"></i>
                        <p class="card-p">Manage Hostel Master Data</p>
                    </div>

                    <div class="card">
                        <i class="fas fa-check-circle"></i>
                        <p class="card-p">Manage Allotments & Check-Outs</p>
                    </div>

                    <div class="card">
                        <i class="fas fa-home"></i>
                        <p class="card-p">Hostel Attendance & Leave Management</p>
                    </div>

                    <div class="card">
                        <i class="fas fa-cogs"></i>
                        <p class="card-p">Hostel Service Automation</p>
                    </div>

                    <div class="card">
                        <i class="fas fa-money-bill"></i>
                        <p class="card-p">Hostel Fee Management</p>
                    </div>
                    <div class="card">
                        <i class="fas fa-tools"></i>
                        <p class="card-p">Hostel Complaints <br> Management</p>
                    </div>

                </div>

            </div>
            <div class="sapration"></div>
            <section class="stats-section">
                <div class="stats-header">

                    <h2>Hostel At A Glance</h2>
                    <p>Providing the best living experience for students since 2010</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="stat-info">
                            <h3 class="counter">500+</h3>
                            <p>Total Students</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-bed"></i></div>
                        <div class="stat-info">
                            <h3 class="counter">120</h3>
                            <p>Premium Rooms</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="stat-info">
                            <h3 class="counter">24/7</h3>
                            <p>Security Guard</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-utensils"></i></div>
                        <div class="stat-info">
                            <h3 class="counter">3</h3>
                            <p>Daily Meals</p>
                        </div>
                    </div>
                </div>
                <div class="sapration"></div>
            </section>
        </main>
    </div>
    <?php include "includes/footer.php" ?>
<script src="assets/js/script.js"></script>

</body>
    <div id="loader-wrapper">
    <div class="loader-content">
        <div class="spinner"></div>
        <h2 class="loader-text">Smart <span>Hostel</span></h2>
    </div>
</div>
</html>