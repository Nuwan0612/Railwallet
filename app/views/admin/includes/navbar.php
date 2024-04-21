<div class="header">
    <div class="nav">
      <div class="user">
        <p>Welcome <?php echo $_SESSION['user_name']?></p>
        <div class="img-case">
        <img src="<?php echo URLROOT?>pics/userPics/<?php echo $_SESSION['user_image']; ?>">
        </div>
        <i class="fa-regular fa-bell"></i>
      </div>
    </div>
  </div>