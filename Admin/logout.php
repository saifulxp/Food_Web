<?php
  include('../config/constants.php');

  session_destroy();
  
  header('location:'.SITEURL.'Admin/login.php');
?>