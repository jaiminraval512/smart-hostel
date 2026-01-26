<?php
    session_start();
    $user = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : null;
?>

<header>
    <div class="logo">
        <a href="http://localhost/php/php_/hostel-management-system/index.php">
          <img src="/php/php_/hostel-management-system/assets/images/logo-removebg-preview (1).png" alt="Logo"></a>
          
    </div>
    <nav>
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Facilities</li>
        <li>Contact</li>
        <li ><?php echo$user; ?><a href="http://localhost/php/php_/hostel-management-system/auth/Login.php"><i class="fas fa-user-circle" id="user"></a></i></li>
    </ul>
    </nav>
    
</header>
