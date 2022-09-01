<?php include('partial/menu.php'); ?>
<div class="main_content">
  <div class="wrapper">
    <h1>Update Admin</h1>
    <br/> <br/>

    <?php
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
      $count = mysqli_num_rows($res);
      if($count==1)
      {
        $rows=mysqli_fetch_assoc($res);

        $full_name = $rows['full_name'];
        $username = $rows['username'];
      }
      else
      {
        header('location: '.SITEURL.'Admin/manage_admin.php');
      }
    }
    ?>

    <form action=""method="POST">
      <table class="tbl_40">
        <tr>
          <td>Full Name: </td>
          <td>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
          </td>
        </tr>

        <tr>
          <td>Username: </td>
          <td>
            <input type="text"name="username" value="<?php echo $username; ?>">
          </td>
        </tr>

        <tr>
          <td>
            <input type="hidden" name = "id" value="<?php echo $id; ?>">
            <input type="submit"name="submit"value="Update Admin" class="btn_secoundary">
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
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $username=$_POST['username'];

  $sql = "UPDATE tbl_admin SET
  full_name='$full_name',
  username='$username' 
  WHERE id='$id'
  ";

  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $_SESSION['update']="<div class='success text_center'>Admin Updated Successfully</div>";
    header('location: '.SITEURL.'Admin/manage_admin.php');
  }
  else
  {
    $_SESSION['update']="Admin Not Updated";
    header('location:'.SITEURL.'Admin/manage_admin.php');
  }
}
?>