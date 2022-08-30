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
            <th>Title</th>
            <th>Image</th>
            <th>Feature</th>
            <th>Active</th>
            <th>Actions</th>
          </tr>

          <?php
              $sql="SELECT * FROM tbl_catagory";

              $res=mysqli_query($conn,$sql);

              $count =mysqli_num_rows($res);

              $sn=1;
              if($count>0)
              {
                // We have data in databse

                while($row=mysqli_fetch_assoc($res))
                {
                  $id = $row['id'];
                  $title = $row['title'];
                  $image_name = $row['image_name'];
                  $featured = $row['featured'];
                  $active = $row['active'];

                  ?>
                    <tr>
                     <td><?php echo $sn++; ?> </td>
                     <td><?php echo $title; ?></td>

                     <td>
                      <?php 
                      if($image_name!=="")
                      {
                        ?>

                        <img src="<?php echo SITEURL;?>images/catagory/<?php echo $image_name;?>" width ="100px">
                        
                        <?php
                      }
                      else
                      {
                        echo "<div class='error'>Image Not Added</div>";
                      }
                      ?>
                    </td>

                     <td><?php echo $featured; ?></td>
                     <td><?php echo $active; ?></td>
                     <td>
                      <a href="#"class="btn_secoundary">Update Catagory</a>
                      <a href="#" class="btn_danger">Delete Catagory </a>
                    </td>
                    </tr>
                  <?php
                }
              }
              else
              {
                // We do not have data
                ?>

                <tr>
                    <td colspan="6"><div class="error">No Catagory Added</div></td>
                </tr>

                <?php
              }
          ?>

          
        </table>
      </div>
    </div>
    <!-- Navbar Section End Here -->

    <?php include('partial/footer.php') ?>