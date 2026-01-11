<?php
session_start();      
session_unset();      
session_destroy();   

header("Location:/php/php_/hostel-management-system/index.php");
exit();
?>