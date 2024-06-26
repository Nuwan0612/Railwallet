<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="content">
  <div class="register-from-outer-container">
    <div class="add-train-details">
      <h1>Add Train</h1>
      <a href="<?php echo URLROOT; ?>admins/trains" class="close-button">
        <i class="fas fa-times"></i> 
      </a>
      <div class="add-train-form">
        <form class="emp-train-form" action="<?php echo URLROOT; ?>admins/addTrain" method ="post">

        <label for="trainID" class="labels">Train Id:</label> 
          <div  class="tbox <?php echo !empty($data['trainID_err']) ? 'error' : ''; ?>">
            <input type="text" name="trainID" placeholder="Train ID" value="<?php echo $data['trainID']; ?>">
            <div class="error-message"><?php echo $data['trainID_err'];?></div>
          </div>

          <label for="name" class="labels">Name:</label> 
          <div  class="tbox <?php echo !empty($data['name_err']) ? 'error' : ''; ?>">
          <input type="text" name="name" placeholder="Name" value="<?php echo $data['name']; ?>">
            <div class="error-message"><?php echo $data['name_err'];?></div>
          </div>

          <label for="type" class="labels">Type:</label> 
          <div class="tbox <?php echo !empty($data['type_err']) ? 'error' : ''; ?>">
          <input type="text" name="type" placeholder="Type" value="<?php echo $data['type']; ?>">
            <div class="error-message"><?php echo $data['type_err'];?></div>
          </div>

          <label for="firstCapacity" class="labels">First class capacity:</label> 
          <div class="tbox">
            <input type="number" name="firstCapacity" placeholder="First class seats" value="<?php echo $data['firstCapacity']; ?>">
          </div>

          <label for="secondCapacity" class="labels">Second class capacity:</label> 
          <div class="tbox">
            <input type="number" name="secondCapacity" placeholder="Second class seats" value="<?php echo $data['secondCapacity']; ?>">
          </div>

          <label for="thirdCapacity" class="labels">Third class cpacity:</label> 
          <div class="tbox <?php echo !empty($data['thirdCapacity_err']) ? 'error' : ''; ?>">
          <input type="number" name="thirdCapacity" placeholder="Third class seats" value="<?php echo $data['thirdCapacity']; ?>">
            <div class="error-message"><?php echo $data['thirdCapacity_err'];?></div>
          </div>

          <div></div>
          <div>
            <input class="sbtn" type="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>