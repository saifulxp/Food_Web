<?php include('partial/menu.php'); ?>
<div class="main_content">
    <div class="wrapper">
        <h1>Add Catagory</h1>

        <br><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <br> <br>

        <!-- Add Catagory Form Start -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl_40">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Catagory Title" required>
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
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
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];

            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            // Check weather the image is seleted or not and set the value for image name according ly
            // print_r($_FILES['image']);

            // die();

            if (isset($_FILES['image']['name'])) {
                // upload the image
                // to upload image wee need image name and source path and destination path
                $image_name = $_FILES['image']['name'];
                // Auto rename our image
                // get the extension of our image (jpg,png,etc) e.g. "food1.jpg"
                $ext = end(explode('.', $image_name));
                // Rename the image
                $image_name = "Food_catagory_" . rand(000, 999) . '.' . $ext;
                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/catagory/" . $image_name;

                // finally upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                // Check weather the image upload or not

                if ($upload == false) {
                    $_SESSION['upload'] = "<div class='error'> Failed to upload image</div>";
                    header('location: ' . SITEURL . 'Admin/add_catagory.php');
                    die();
                }
            } else {
                // Dont upload image and set the image name value blank
                $image_name = "";
            }

            $sql = "INSERT INTO tbl_catagory SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
        ";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $_SESSION['add'] = "<div class='success'>Catagory added Successfully</div>";
                header('location:' . SITEURL . 'Admin/manage_catagory.php');
            } else {
                $_SESSION['add'] = "<div class='error'>Catagory Not added </div>";
                header('location:' . SITEURL . 'Admin/add_catagory.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partial/footer.php'); ?>