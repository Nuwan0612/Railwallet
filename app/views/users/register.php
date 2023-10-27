<?php require APPROOT . '/views/users/includes/header.php';?>

  <p>Please fill out this form to register with us</p>
  <form action="<?php echo URLROOT; ?>/users/register" method ="post">
     <div>
      <label for="name">Name: <sup>*</sup></label>
      <input type="text" name="name" value="<?php echo $data['name']; ?>">
      <span><?php echo $data['name_err'];?></span>
     </div>

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
      <label for="confirm_password">Confirm Password: <sup>*</sup></label>
      <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
      <span><?php echo $data['confirm_password_err'];?></span>
     </div>

     <div>
      <input type="submit" value="Register">
      <a href="<?php echo URLROOT;?>/users/login">Have an account? Login</a>
     </div>
  </form>



<?php require APPROOT . '/views/users/includes/footer.php';?>