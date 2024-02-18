<?php require APPROOT . '/views/Admin/includes/header.php';?>

  <div class="content">
    <div class="cards">

      <a class="db-link" href="<?php echo URLROOT;?>admins/users">
        <div class="card">
          <div class="box">
            <h1><?php echo $data['users']?></h1>
            <h3>Users</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/user.png" alt="">
          </div>
        </div>
      </a>

      <a href="<?php echo URLROOT;?>admins/trains" class="db-link">
        <div class="card">
          <div class="box">
            <h1><?php echo $data['trains']?></h1>
            <h3>Trains</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/train.png" alt="">
          </div>
        </div>
      </a>
      
      <a href="<?php echo URLROOT;?>admins/checkers" class="db-link">
        <div class="card">
          <div class="box">
            <h1><?php echo $data['checkers']?></h1>
            <h3>Checkers</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/qr.png" alt="">
          </div>
        </div>
      </a>
      

      <a href="<?php echo URLROOT;?>admins/supporters" class="db-link">
        <div class="card">
          <div class="box">
            <h1><?php echo $data['supporters']?></h1>
            <h3>Customer Suports</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/supp.png" alt="">
          </div>
        </div>
      </a>
      

      <a href="<?php echo URLROOT;?>admins/stations" class="db-link">
        <div class="card">
          <div class="box">
            <h1><?php echo $data['stations']?></h1>
            <h3>Stations</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/station.png" alt="">
          </div>
        </div>
      </a>
      


      <a href="" class="db-link">
        <div class="card">
          <div class="box">
            <h1>2</h1>
            <h3>Feedbacks</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/feed.png" alt="">
          </div>
        </div> 
      </a>
      

       

    </div> 

    <!-- <div class="content-2">
      <div class="new-fines"></div>
      <div class="new-feedback"></div>
    </div> -->
  </div>
</div>

<?php require APPROOT . '/views/Admin/includes/footer.php';?>