<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Update Customer Support Operator Details</h1>
  <a href="<?php echo URLROOT; ?>admins/supporters" class="close-button">
    <i class="fas fa-times"></i></a> 
  <div class="add-train-form">
    <form class="emp-train-form" action="<?php echo URLROOT; ?>admins/editSupporter/<?php echo $data['id']; ?>" method ="post">

      <label for="fname" class="labels">First name:</label> 
      <div  class="tbox <?php echo !empty($data['fname_err']) ? 'error' : ''; ?>">
        <input type="text" name="fname" placeholder="First name" value="<?php echo $data['fname']; ?>">
        <div class="error-message"><?php echo $data['fname_err'];?></div>
      </div>

      <label for="lname" class="labels">Last name:</label> 
      <div  class="tbox <?php echo !empty($data['lname_err']) ? 'error' : ''; ?>">
        <input type="text" name="lname" placeholder="Last name" value="<?php echo $data['lname']; ?>">
        <div class="error-message"><?php echo $data['lname_err'];?></div>
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

      <div></div>
      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>