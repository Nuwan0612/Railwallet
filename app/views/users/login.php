<?php require APPROOT . '/views/users/includes/header.php';?>

  <p>Please fill in your credentials to log in</p>
  <form action="<?php echo URLROOT; ?>/users/login" method ="post">
     
     <div>
      <label for="email">Email: <sup>*</sup></label>
      <input type="email" name="email" value="<?php echo $data['email']; ?>">
      <span><?php echo $data['email_err'];?></span>
     </div>

     <div>
      <label for="password">Password: <sup>*</sup></label>
      <input type="password" name="password" value="<?php echo $data['password']; ?>">
      <span><?php echo $data['password_err'];?></span>
     </div>

     <div>
      <input type="submit" value="Login">
      <a href="<?php echo URLROOT;?>/users/register">No an account? Register</a>
     </div>
  </form>



<?php require APPROOT . '/views/users/includes/footer.php';?>