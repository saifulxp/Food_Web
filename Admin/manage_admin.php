<?php include('partial/menu.php') ?>

<!-- Navbar Section start Here -->
<div class="main_content">
  <div class="wrapper">
    <h1>Manage admin</h1>
    <br /> <br />

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }

    if (isset($_SESSION['user-not-found'])) {
      echo $_SESSION['user-not-found'];
      unset($_SESSION['user-not-found']);
    }

    if (isset($_SESSION['pas-not-match'])) {
      echo $_SESSION['pas-not-match'];
      unset($_SESSION['pas-not-match']);
    }

    if (isset($_SESSION['pass-cng'])) {
      echo $_SESSION['pass-cng'];
      unset($_SESSION['pass-cng']);
    }

    ?>

    <br /> <br />
    <!-- Our Button Add admin Button Goes -->
    <a href="add_admin.php" class="btn_primary">Add Admin</a>
    <br /> <br /> <br />


    <table class="tbl_full">
      <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Actions</th>
      </tr>
      <?php
      $sql = "SELECT * FROM tbl_admin";
      $res = mysqli_query($conn, $sql);

      if ($res == TRUE) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
          $sn = 1;
          while ($rows = mysqli_fetch_assoc($res)) {
            $id = $rows['id'];
            $full_name = $rows['full_name'];
            $username = $rows['username'];


      ?>
            <tr class="tbl_design">
              <td><?php echo $sn++; ?></td>
              <td><?php echo $full_name; ?></td>
              <td><?php echo $username; ?></td>
              <td>
                <a href="<?php echo SITEURL; ?>Admin/update_password.php?id=<?php echo $id; ?>" class="btn_primary">Change Password</a>
                <a href="<?php echo SITEURL; ?>Admin/update_admin.php?id=<?php echo $id; ?>" class="btn_secoundary">Update Admin</a>
                <a href="<?php echo SITEURL; ?>Admin/delete_admin.php?id=<?php echo $id; ?>" class="btn_danger">Delete Admin </a>
              </td>
            </tr>

      <?php
          }
        }
      }
      ?>

    </table>
  </div>
</div>
<!-- Navbar Section End Here -->

<?php include('partial/footer.php') ?>