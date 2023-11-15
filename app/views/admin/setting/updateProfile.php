<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Update Personal Details</h1>
  <a href="<?php echo URLROOT; ?>admins/profile" class="close-button">
    <i class="fas fa-times"></i></a> 
  <div class="add-train-form">
    <form class="emp-train-form" action="<?php echo URLROOT; ?>admins/setting/<?php echo $data['id']; ?>" method ="post">

      <label for="name" class="labels">Name:</label> 
      <div  class="tbox <?php echo !empty($data['name_err']) ? 'error' : ''; ?>">
        <input type="text" name="name" placeholder="Name" value="<?php echo $data['name']; ?>">
        <div class="error-message"><?php echo $data['name_err'];?></div>
      </div>

      <label for="nic" class="labels">NIC Number:</label> 
      <div class="tbox <?php echo !empty($data['nic_err']) ? 'error' : ''; ?>">
        <input type="text" name="nic" placeholder="NIC Number" value="<?php echo $data['nic']; ?>">
        <div class="error-message"><?php echo $data['nic_err'];?></div>
      </div>

      <label for="phone" class="labels">Contact Number:</label> 
      <div class="tbox <?php echo !empty($data['phone_err']) ? 'error' : ''; ?>">
        <input type="text" name="phone" placeholder="Contact Number" value="<?php echo $data['phone']; ?>">
        <div class="error-message"><?php echo $data['phone_err'];?></div>
      </div>

      <label for="email" class="labels">Email:</label> 
      <div class="tbox <?php echo !empty($data['email_err']) ? 'error' : ''; ?>">
        <input type="text" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
        <div class="error-message"><?php echo $data['email_err'];?></div>
      </div>

      <label for="oldPassword" class="labels">Old Password:</label> 
      <div class="tbox <?php echo !empty($data['oldPassword_err']) ? 'error' : ''; ?>">
        <input type="password" name="oldPassword" placeholder="Old Password" value="<?php echo $data['oldPassword']; ?>">
        <div class="error-message"><?php echo $data['oldPassword_err'];?></div>
      </div>

      <label for="newPassword" class="labels">New Password:</label> 
      <div class="tbox <?php echo !empty($data['newPassword_err']) ? 'error' : ''; ?>">
        <input type="password" name="newPassword" placeholder="New Password" value="<?php echo $data['newPassword']; ?>">
        <div class="error-message"><?php echo $data['newPassword_err'];?></div>
      </div>

      <label for="confirmPassword" class="labels">Confirm Password:</label> 
      <div class="tbox <?php echo !empty($data['confirmPassword_err']) ? 'error' : ''; ?>">
        <input type="password" name="confirmPassword" placeholder="Confirm Password" value="<?php echo $data['confirmPassword']; ?>">
        <div class="error-message"><?php echo $data['confirmPassword_err'];?></div>
      </div>

      <div></div>
      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>