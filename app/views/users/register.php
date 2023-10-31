<?php require APPROOT . '/views/users/includes/header.php';?>

  
  <div class="container">
    <div class="login">
      <div class="content">
        <img src="<?php echo URLROOT;?>public/css/login/login.png">
      </div>

      <div class="loginform">
        <h1>Register</h1>
        <form action="<?php echo URLROOT; ?>users/register" method ="post">
          <div class="tbox <?php echo !empty($data['name_err']) ? 'error' : ''; ?>">  
            <i class="fa fa-user"></i><input type="text" name="name" placeholder="Name" value="<?php echo $data['name']; ?>">
            <div class="error-message"><?php echo $data['name_err'];?></div>
          </div>

          <div class="tbox <?php echo !empty($data['nic_err']) ? 'error' : ''; ?>">  
          <i class="fa fa-address-card"></i></i><input type="text" name="nic" placeholder="NIC Number" value="<?php echo $data['nic']; ?>">
            <div class="error-message"><?php echo $data['nic_err'];?></div>
          </div>

          <div class="tbox <?php echo !empty($data['phone_err']) ? 'error' : ''; ?>">  
          <i class="fa fa-phone"></i><input type="text" name="phone" placeholder="Mobile Number" value="<?php echo $data['phone']; ?>">
          <div class="error-message"><?php echo $data['phone_err'];?></div>
          </div>

          <div class="tbox <?php echo !empty($data['email_err']) ? 'error' : ''; ?>">
          <i class="fa fa-envelope"></i><input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
          <div class="error-message"><?php echo $data['email_err'];?></div>
          </div>

          <div class="tbox <?php echo !empty($data['password_err']) ? 'error' : ''; ?>">
            <i class="fa fa-lock"></i><input type="password" name="password" placeholder="Password" value="<?php echo $data['password']; ?>">
            <div class="error-message"><?php echo $data['password_err'];?></div>
          </div>

          <div class="tbox <?php echo !empty($data['confirm_password_err']) ? 'error' : ''; ?>">
            <i class="fa fa-lock"></i><input type="password" name="confirm_password" placeholder="Confrim Password" value="<?php echo $data['confirm_password']; ?>">
            <div class="error-message"><?php echo $data['confirm_password_err'];?></div>
          </div>

          <div>
            <input class="sbtn" type="submit" value="Register">
            <a class="register-link" href="<?php echo URLROOT;?>users/login">Have an account? Login</a>
          </div>
       </form>
      </div>
    </div>
  </div>




<?php require APPROOT . '/views/users/includes/footer.php';?>