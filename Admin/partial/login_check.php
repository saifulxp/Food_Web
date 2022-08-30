<?php
// Authoraization- Access Controll
// Check weather the login user is logged in or not
if(!isset($_SESSION['user']))//if user session is not set
{
  // user is not login
  // Redairect to login page with message
  $_SESSION['no-login-message']="<div class='error text_center'>Please login to access Admin Panel</div>";
  header('location: '.SITEURL.'Admin/login.php');
}
?>