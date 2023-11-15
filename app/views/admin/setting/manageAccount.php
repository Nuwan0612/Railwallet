<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Personal Details</div>
        <a href="<?php echo URLROOT; ?>admins/setting/<?php echo $data['id']; ?>"><button class="add-train">Update</button></a>
      </div>

      <div class="body-container">
        <div class="setting-container">    
          <div class="detail-row-container">
            <div class="profile-pic">
                <img src="<?php echo URLROOT;?>pics/man.png">
            </div>

            <div class="admin-details">

              <div class="detail-row">
                <div class="left">Admin Id:</div>
                <div class="right"><?php echo $data['id']?></div>
              </div>

              <div class="detail-row">
                <div class="left">Name:</div>
                <div class="right"><?php echo $data['name']?></div>
              </div>

              <div class="detail-row">
                <div class="left">NIC Number:</div>
                <div class="right"><?php echo $data['nic']?></div>
              </div>

              <div class="detail-row">
                <div class="left">Contact Number:</div>
                <div class="right"><?php echo $data['phone']?></div>
              </div>

              <div class="detail-row">
                <div class="left">Email:</div>
                <div class="right"><?php echo $data['email']?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>