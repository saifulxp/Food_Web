<?php include('partial/menu.php'); ?>
<div class="main_content">
  <div class="wrapper">
    <h1>Add Catagory</h1>

    <br><br>
    <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
    ?>

    <br> <br>

    <!-- Add Catagory Form Start -->
    <form action=""method="post">
      
        <table class="tbl_40">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Catagory Title">
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                  <input type="radio" name="featured" value="Yes"> Yes
                  <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                  <input type="radio" name="active" value="Yes"> Yes
                  <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" value="Add Catagory" class="btn_secoundary">
              </td>
            </tr>
        </table>
    </form>
    <!-- Add Catagory Form Start -->

    <?php
    // Check weather the submit button is clicked or not
      if(isset($_POST['submit']))
      {
        $title = $_POST['title'];

        if(isset($_POST['featured']))
        {
          $featured = $_POST['featured'];
        }
        else
        {
          $featured ="No";
        }
        if(isset($_POST['active']))
        {
          $active = $_POST['active'];
        }
        else
        {
          $active = "No";
        }
        

        $sql = "INSERT INTO tbl_catagory SET
            title='$title',
            featured='$featured',
            active='$active'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
          $_SESSION['add']="<div class='success'>Catagory added Successfully</div>";
          header('location:'.SITEURL.'Admin/manage_catagory.php');
        }
        else
        {
          $_SESSION['add']="<div class='error'>Catagory Not added </div>";
          header('location:'.SITEURL.'Admin/add_catagory.php');
        }
      }
   ?>
  </div>
</div>

<?php include('partial/footer.php'); ?>