<?php require APPROOT . '/views/user/includes/header.php';?>
    
<div class="setting-container">
  <div class="inner-container">

    <h1 align="center">User Details</h1>
    <center><div style="width: 90%;"><hr></div></center>
  
    <div class="body-container">
        <div class="left">
          <div class="image">
            <img src="<?php echo URLROOT?>/pics/man.png">
          </div>
          <table>
            <tbody>
              <tr>
                <td class="table-title">ID:</td>
                <td class="user-values"><?php echo $data['id']?></td>
              </tr>
              <tr>
                <td class="table-title">Name:</td>
                <td class="user-values"><?php echo $data['name']?></td>
              </tr>
              <tr>
                <td class="table-title">NIC:</td>
                <td class="user-values"><?php echo $data['nic']?></td>
              </tr>
              <tr>
                <td class="table-title">Phone Number:</td>
                <td class="user-values"><?php echo $data['phone']?></td>
              </tr>
              <tr>
                <td class="table-title">Email:</td>
                <td class="user-values"><?php echo $data['email']?></td>
              </tr>
              
            </tbody>
          </table>
        </div>

        <div class="right">
          <form action="<?php echo URLROOT; ?>passengers/editUser" method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <div class="tbox <?php echo !empty($data['name_err']) ? 'error' : ''; ?>">
                  <input type="text" name="name">
                  <div class="error-message"><?php echo $data['name_err'];?></div>  
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="title2">NIC:</label>
                <div class="tbox">
                  <input type="text" name="nic" readonly>
                </div>                 
              </div> -->
              <div class="form-group">
                <label for="phone">Phone Number:</label>
                <div class="tbox <?php echo !empty($data['phone_err']) ? 'error' : ''; ?>">
                  <input type="number" name="phone" value="<?php echo !empty($data['phone_err']) ?  $data['phone_err_value']: ''; ?>">
                  <div class="error-message"><?php echo $data['phone_err'];?></div>
                </div>                 
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <div class="tbox <?php echo !empty($data['email_err']) ? 'error' : ''; ?>">
                  <input type="email" name="email" value="<?php echo !empty($data['email_err']) ?  $data['email_err_value']: ''; ?>">
                  <div class="error-message"><?php echo $data['email_err'];?></div>
                </div>                 
              </div>
              <div class="form-group">
                <label for="oldPassword">Old Password:</label>
                <div class="tbox <?php echo !empty($data['oldPassword_err']) ? 'error' : ''; ?>">
                  <input type="password" name="oldPassword" value="<?php echo !empty($data['oldPassword_err_value']) || !empty($data['newPassword_err_value']) || !empty($data['confirmPassword_err_value'])?  $data['oldPassword_err_value']: ''; ?>">
                  <div class="error-message"><?php echo $data['oldPassword_err'];?></div>
                </div>                 
              </div>
              <div class="form-group">
                <label for="newPassword">New Password:</label>
                <div class="tbox <?php echo !empty($data['newPassword_err']) ? 'error' : ''; ?>">
                  <input type="password" name="newPassword" value="<?php echo !empty($data['oldPassword_err_value']) || !empty($data['newPassword_err_value']) || !empty($data['confirmPassword_err_value']) ?  $data['newPassword_err_value']: ''; ?>">
                  <div class="error-message"><?php echo $data['newPassword_err'];?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <div class="tbox <?php echo !empty($data['confirmPassword_err']) ? 'error' : ''; ?>">
                  <input type="password" name="confirmPassword" value="<?php echo !empty($data['oldPassword_err_value']) || !empty($data['newPassword_err_value']) || !empty($data['confirmPassword_err_value']) ?  $data['confirmPassword_err_value']: ''; ?>">
                  <div class="error-message"><?php echo $data['confirmPassword_err'];?></div>
                </div>                 
              </div>
              <!-- Add more form fields as needed -->
              <button type="submit">Update</button>
          </form>
        </div>
    </div>
      
  </div>
</div>
    
<?php require APPROOT . '/views/user/includes/footer.php';?>   