<?php require APPROOT . '/views/users/includes/header.php';?>

  <div class="container">
    <div class="login">
      <div class="content">
        <img src="<?php echo URLROOT;?>public/css/login/login.png">
      </div>

      <div class="loginform">
        <h1>Login</h1>
        <form action="<?php echo URLROOT; ?>users/login" method ="post">
          <div  class="tbox <?php echo !empty($data['email_err']) ? 'error' : ''; ?>">
          <i class="fa fa-envelope"></i><input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
            <div class="error-message"><?php echo $data['email_err'];?></div>
          </div>

          <div class="tbox <?php echo !empty($data['password_err']) ? 'error' : ''; ?>">
          <i class="fa fa-lock"></i><input type="password" name="password" placeholder="Password" value="<?php echo $data['password']; ?>">
            <div class="error-message"><?php echo $data['password_err'];?></div>
          </div>

          <div>
            <input class="sbtn" type="submit" value="Login">
            <a class="register-link" href="<?php echo URLROOT;?>users/register">Don't have an account? Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>




<?php require APPROOT . '/views/users/includes/footer.php';?>