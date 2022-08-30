<?php include('partial/menu.php'); ?>
<div class="main_content">
  <div class="wrapper">
    <h1>Change Password</h1>
    <br/> <br/> 

    <?php
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
    }
    ?>
    
    <form action="" method="POST">
      <table class="tbl_40">
        <tr>
          <td>Current Password: </td>
          <td>
            <input type="password" name="current_password" placeholder="Current password">
          </td>
        </tr>

        <tr>
          <td>New Password: </td>
          <td>
            <input type="password" name = "new_password" placeholder="New Password">
          </td>
        </tr>

        <tr>
          <td>Confirm Password: </td>
          <td>
            <input type="password" name = "confirm_password" placeholder= "Confirm Password">
          </td>
        </tr>

        <tr colspan="2">
          <td>
            <input type="hidden" name="id" value= "<?php echo $id;?>">
            <input type="submit" name ="submit" value="Change password" class= "btn_secoundary">
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

<?php include('partial/footer.php'); ?>

<?php
if(isset($_POST['submit']))
{
  $id =$_POST['id'];
  $current_password=md5($_POST['current_password']);
  $new_password = md5($_POST['new_password']);
  $confirm_password = md5($_POST['confirm_password']);

  $sql = "SELECT * FROM tbl_admin WHERE id=$id and password='$current_password'";
  $res = mysqli_query($conn,$sql);

  if($res==TRUE)
  {
    $count = mysqli_num_rows($res);
    if($count==1)
    {
      if($new_password==$confirm_password)
      {
        $sql2 ="UPDATE tbl_admin SET password = '$new_password'
        WHERE id=$id
        ";

        $res2=mysqli_query($conn,$sql2);

        if($res2==TRUE)
        {
          $_SESSION['pass-cng']="<div class='success'>Password Changed Successfully</div>";
          header('location: '.SITEURL.'Admin/manage_admin.php');
        }
        else
        {
          $_SESSION['pass-cng']="<div class='error'>password not changed </div>";
          header('location: '.SITEURL.'Admin/manage_admin.php');
        }
      }
      else
      {
        $_SESSION['pas-not-match']=" new and confirm Password Not Match";
        header('location: '.SITEURL.'Admin/manage_admin.php');
      }
    }
    else
    {
      $_SESSION['user-not-found'] ="User Not Found";
      header('location: '.SITEURL.'Admin/manage_admin.php');
    }
  }
 
}
?>