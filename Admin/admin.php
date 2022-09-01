<?php include('partial/menu.php'); ?>

<!-- Navbar Section start Here -->
<div class="main_content">
  <div class="wrapper">
    <h1>DASHBOARD</h1>

    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?>
    <br> <br>

    <div class="box_4">
      <h1>5</h1>
      <br>
      Catagory
    </div>

    <div class="box_4 text_center">
      <h1>5</h1>
      <br>
      Catagory
    </div>

    <div class="box_4 text_center">
      <h1>5</h1>
      <br>
      Catagory
    </div>

    <div class="box_4 text_center">
      <h1>5</h1>
      <br>
      Catagory
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- Navbar Section End Here -->

<?php include('partial/footer.php'); ?>