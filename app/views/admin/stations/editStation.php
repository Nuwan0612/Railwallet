<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Update Station <?php echo $data['stationID']; ?></h1>
  <a href="<?php echo URLROOT; ?>admins/stations" class="close-button">
    <i class="fas fa-times"></i></a> 
  <div class="add-train-form">
    <form class="emp-train-form" action="<?php echo URLROOT; ?>admins/editStation/<?php echo $data['stationID']; ?>" method ="post">

      <!-- <label for="name" class="labels">Station ID:</label> 
      <div  class="tbox <?php echo !empty($data['stationID_err']) ? 'error' : ''; ?>">
        <input type="text" name="stationID" placeholder="Station ID" value="<?php echo $data['stationID']; ?>">
        <div class="error-message"><?php echo $data['stationID_err'];?></div>
      </div> -->

      <label for="name" class="labels">Station Name:</label> 
      <div  class="tbox <?php echo !empty($data['name_err']) ? 'error' : ''; ?>">
        <input type="text" name="name" placeholder="Station Name" value="<?php echo $data['name']; ?>">
        <div class="error-message"><?php echo $data['name_err'];?></div>
      </div>

      <div></div>
      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>