<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Route Details</h1>
  <a href="<?php echo URLROOT; ?>admins/routes" class="close-button">
    <i class="fas fa-times"></i> 
  </a>
  <div class="add-train-form">
    <form action="<?php echo URLROOT; ?>admins/addRoutes" method ="post">
      <div class="tbox <?php echo !empty($data['trainID_err']) ? 'error' : ''; ?>">
        <input type="text" name="trainID" placeholder="Train ID" value="<?php echo $data['trainID']; ?>">
        <div class="error-message"><?php echo $data['trainID_err'];?></div>
      </div>

      <div  class="tbox <?php echo !empty($data['stationID_err']) ? 'error' : ''; ?>">
        <input type="text" name="stationID" placeholder="Station ID" value="<?php echo $data['stationID']; ?>">
        <div class="error-message"><?php echo $data['stationID_err'];?></div>
      </div>

      <div  class="tbox <?php echo !empty($data['stopOrder_err']) ? 'error' : ''; ?>">
        <input type="text" name="stopOrder" placeholder="Stop Order" value="<?php echo $data['stopOrder']; ?>">
        <div class="error-message"><?php echo $data['stopOrder_err'];?></div>
      </div>

      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>