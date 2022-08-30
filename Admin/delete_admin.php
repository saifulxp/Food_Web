<?php
include('../config/constants.php');
$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn,$sql);

if($res==TRUE)
{
  $_SESSION['delete']="Admin Deleted Successfully";
  header('location: '.SITEURL.'Admin/manage_admin.php');
}
else
{
  $_SESSION['delete']="Admin Not Deleted";
  header('location: '.SITEURL.'Admin/manage_admin.php');
}
?>