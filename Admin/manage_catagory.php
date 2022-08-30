<?php include('partial/menu.php') ?>

 <!-- Navbar Section start Here -->
 <div class="main_content">
      <div class="wrapper">
        <h1>Manage Catagory</h1>  
        <br  /> <br  />
        <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
    ?>
    <br> <br>
        <!-- Our Button Add admin Button Goes -->
        <a href="<?php echo SITEURL;?>Admin/add_catagory.php" class="btn_primary">Add Catagory</a>
        <br /> <br /> <br />

        <table class="tbl_full">
          <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Actions</th>
          </tr>

          <tr>
            <td>1. </td>
            <td>Saiful Islam</td>
            <td>saifulxp</td>
            <td>
              <a href="#"class="btn_secoundary">Update Admin</a>
              <a href="#" class="btn_danger">Delete Admin </a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <!-- Navbar Section End Here -->

    <?php include('partial/footer.php') ?>