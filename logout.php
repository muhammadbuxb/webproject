<?php
session_start();
unset($_SESSION['user_info']);
echo "<script>";
echo "window.location.href = 'login.php'";
echo "</script>";
?>