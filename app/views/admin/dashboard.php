<?php require APPROOT . '/views/Admin/includes/header.php';?>

  <div class="content">
    <div class="cards">

      <a class="db-link" href="<?php echo URLROOT;?>admins/users">
        <div class="card">
          <div class="box">
            <p><?php echo $data['users']?></p>
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
            <p><?php echo $data['trains']?></p>
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
            <p><?php echo $data['checkers']?></p>
            <h3>Checkers</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/qr-code.png" alt="">
          </div>
        </div>
      </a>
      

      <a href="<?php echo URLROOT;?>admins/supporters" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['supporters']?></p>
            <h3>Customer Suports</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/customer-service.png" alt="">
          </div>
        </div>
      </a>
      

      <a href="<?php echo URLROOT;?>admins/stations" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['stations']?></p>
            <h3>Stations</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/train-station.png" alt="">
          </div>
        </div>
      </a>
      


      <a href="<?php echo URLROOT;?>admins/feedback" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['feedbacks']?></p>
            <h3>Feedbacks</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/feedback.png" alt="">
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