<div class="header">
    <div class="nav">
      <div class="user">
        <p>Welcome <?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname']?></p>
        <div class="img-case">
          <img src="<?php echo URLROOT?>pics/userPics/<?php echo $_SESSION['user_image']; ?>">
        </div>
      </div>
    </div>
  </div>