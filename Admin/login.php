<?php include('../config/constants.php'); ?>
<html>
  <head>
    <title>Login -Food Order System</title>
    <link rel="stylesheet" href="../CSS/index.css">
  </head>
    
  <body>
    <div class="login">
      <h1 class="text_center">Login</h1><br> <br>

      <?php
       if(isset($_SESSION['login']))
       {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
       }

       if(isset($_SESSION['no-login-message']))
       {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
       }
    ?>

      <form action=""method="POST" class="text_center">
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username"><br> <br>

        Password: <br>
        <input type="password"name="password"placeholder="Enter Password"><br><br>

        <input type="submit"name="submit" value="Login" class="btn_primary">
        
      </form>
      <br>

      <p class="text_center">Created by-<a href="www.saifulislam.com">Saiful Islam</a></p>
    </div>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
  $res = mysqli_query($conn,$sql);
  $count= mysqli_num_rows($res);
  if($count==1)
  {
    $_SESSION['login']="<div class='success'>Login Successfull</div>";
    $_SESSION['user'] = $username;
    header('location:'.SITEURL.'Admin/admin.php');
  }else
  {
    $_SESSION['login']="<div class='error text_center'>Username or password Incorrect</div>";
    header('location:'.SITEURL.'Admin/login.php');
  }
}
else
{
  
}
?>