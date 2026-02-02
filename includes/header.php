<?php
session_start();
$user = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : "Guest";
?>

<header id="main-header">

    <div id="logo-box" class="logo-box">
        <a id="logo-link" href="http://localhost/php/php_/hostel-management-system/index.php">
            <img id="logo-img"
                 src="/php/php_/hostel-management-system/assets/images/logo-removebg-preview (1).png"
                 alt="Logo">
        </a>
    </div>

    <nav id="main-nav" class="main-nav">
        <ul id="nav-list" class="nav-list">

            <li class="nav-item" id="nav-home">Home</li>

            <li class="nav-item" id="nav-about">About</li>

            <li class="nav-item" id="nav-facility">Facilities</li>

            <li class="nav-item" id="nav-contact">
                <a href="#contact-us" class="nav-link">Contact</a>
            </li>

            <li class="nav-item user-item" id="nav-user">

                <span id="username"><?php echo $user; ?></span>

                <a id="login-link"
                   href="http://localhost/php/php_/hostel-management-system/auth/Login.php">

                    <i class="fas fa-user-circle" id="user-icon"></i>

                </a>

            </li>

        </ul>
    </nav>

</header>
