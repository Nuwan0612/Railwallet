<?php require APPROOT . '/views/Admin/includes/header.php';?>

  <div class="content">
    <div class="cards">
      <div class="card">
        <div class="box">
          <h1><?php echo $data['users']?></h1>
          <h3>Users</h3>
        </div>
        <div class="icon-case">
          <i class="fa-solid fa-users fa-2x"></i>
        </div>
      </div>

      <div class="card">
        <div class="box">
          <h1><?php echo $data['trains']?></h1>
          <h3>Trains</h3>
        </div>
        <div class="icon-case">
        <i class="fa-solid fa-train-subway fa-2x"></i>
        </div>
      </div>

      <div class="card">
        <div class="box">
          <h1><?php echo $data['users']?></h1>
          <h3>Checkers</h3>
        </div>
        <div class="icon-case">
        <i class="fa-solid fa-qrcode fa-2x"></i>
        </div>
      </div>

      <div class="card">
        <div class="box">
          <h1><?php echo $data['users']?></h1>
          <h3>Customer Suports</h3>
        </div>
        <div class="icon-case">
        <i class="fa-solid fa-phone fa-2x"></i>
        </div>
      </div>

      <div class="card">
        <div class="box">
          <h1><?php echo $data['users']?></h1>
          <h3>Feedbacks</h3>
        </div>
        <div class="icon-case">
        <i class="fa-solid fa-comment-dots fa-2x"></i>
        </div>
      </div> 
    </div> 

    <!-- <div class="content-2">
      <div class="new-fines"></div>
      <div class="new-feedback"></div>
    </div> -->
  </div>
</div>

<?php require APPROOT . '/views/Admin/includes/footer.php';?>