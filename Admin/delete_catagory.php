<?php
include('../config/constants.php');
if (isset($_GET['id']) and isset($_GET['image_name'])) {
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  if ($image_name != "") {
    $path = "../images/catagory/" . $image_name;

    $remove = unlink($path);
    if ($remove == FALSE) {
      $_SESSION['remove'] = "<div class='error'>Failed to remove Catagory image</div>";
      header('location:' . SITEURL . 'Admin/manage_catagory.php');
      die();
    }
  }

  $sql = "DELETE FROM tbl_catagory WHERE id=$id;";
  $res = mysqli_query($conn, $sql);
  if ($res == TRUE) {
    $_SESSION['delete'] = "<div class='success text_center'> Catagory Deleted Successfully</div>";
    header('location:' . SITEURL . 'Admin/manage_catagory.php');
  } else {
    $_SESSION['delete'] = "<div class='error'> Catagory Not Deleted </div>";
    header('location:' . SITEURL . 'Admin/manage_catagory.php');
  }
} else {
  header('location:' . SITEURL . 'Admin/manage_catagory.php');
}
