<?php include('partial/menu.php'); ?>

<div class="main_content">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <br /> <br />
    
    <?php
         if(isset($_SESSION['add']))
         {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
         }
    ?>
    <form action="" method="POST">
      <table class="tbl_40">
        <tr>
          <td>Full Name: </td>
          <td>
            <input type="text" name="full_name" placeholder="Enter Your Name" required>
          </td>
        </tr>

        <tr>  
        <td>User Name: </td>
          <td>
            <input type="text" name="username" placeholder="Enter username" required>
          </td>
        </tr>
        
        <tr>
          <td>Password: </td>
          <td>
            <input type="password" name="password" placeholder="Enter Password" required>
          </td>
        </tr>

        <tr >
          <td colspan="2">
          <input type="submit" name="submit" value="Add Admin" class="btn_secoundary">
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
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";
    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
      $_SESSION['add']="<div class='success'>Admin Added SuccessFully</div>";
      header('location: '.SITEURL.'Admin/manage_admin.php');
    }
    else
    {
      $_SESSION['add']="Admin Added SuccessFully";
      header('location: '.SITEURL.'Admin/add_admin.php');
    }
    
  }
  else
  {

  }
?>