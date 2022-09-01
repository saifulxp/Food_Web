<?php
include('../config/constants.php');
$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn,$sql);

if($res==TRUE)
{
  $_SESSION['delete']="<div class='success text_center'>Admin Deleted Successfully</div>";
  header('location: '.SITEURL.'Admin/manage_admin.php');
}
else
{
  $_SESSION['delete']="<div class='success text_center'>Admin Not Deleted</div>";
  header('location: '.SITEURL.'Admin/manage_admin.php');
}
?>