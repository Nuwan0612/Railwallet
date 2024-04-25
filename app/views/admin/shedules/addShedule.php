<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Route Details</h1>
  <a href="<?php echo URLROOT; ?>admins/shedules" class="close-button">
    <i class="fas fa-times"></i> 
  </a>
  <div class="add-train-form">
    <form action="<?php echo URLROOT; ?>admins/addTrainShedule" method ="post">

      <div class="tbox <?php echo !empty($data['sheduleID_err']) ? 'error' : ''; ?>">
        <input type="text" name="sheduleID" placeholder="Shedule ID" value="<?php echo $data['sheduleID']; ?>">
        <div class="error-message"><?php echo $data['sheduleID_err'];?></div>
      </div>

      <div  class="tbox <?php echo !empty($data['trainID_err']) ? 'error' : ''; ?>">
        <input type="text" name="trainID" placeholder="Train ID" value="<?php echo $data['trainID']; ?>">
        <div class="error-message"><?php echo $data['trainID_err'];?></div>
      </div>

      <div class="schedule-outer-container">
        <div class="schedule-left-container">

          <div class="tbox <?php echo !empty($data['departureStationID_err']) ? 'error' : ''; ?>">
            <input type="text" name="departureStationID" placeholder="Departure Station ID" value="<?php echo $data['departureStationID']; ?>">
            <div class="error-message"><?php echo $data['departureStationID_err'];?></div>
          </div>


          <div  class="tbox <?php echo !empty($data['departureDate_err']) ? 'error' : ''; ?>">
            <input type="text" name="departureDate" placeholder="Departure Date" onfocus="(this.type = 'date')" onblur="(this.type='text')" value="<?php echo $data['departureDate']; ?>">
            <div class="error-message"><?php echo $data['departureDate_err'];?></div>
          </div>

          <div  class="tbox <?php echo !empty($data['departureTime_err']) ? 'error' : ''; ?>">
            <input type="text" name="departureTime" placeholder="Departure Time" onfocus="(this.type = 'time')" onblur="(this.type='text')" value="<?php echo $data['departureTime']; ?>">
          <div class="error-message"><?php echo $data['departureTime_err'];?></div>
          </div>

        </div>
        <div class="schedule-right-container">

        </div>
      </div>
      

      

      <div class="tbox <?php echo !empty($data['arrivalStationID_err']) ? 'error' : ''; ?>">
        <input type="text" name="arrivalStationID" placeholder="Arrival Station ID" value="<?php echo $data['arrivalStationID']; ?>">
        <div class="error-message"><?php echo $data['arrivalStationID_err'];?></div>
      </div>

      <div  class="tbox <?php echo !empty($data['arrivalDate_err']) ? 'error' : ''; ?>">
        <input type="text" name="arrivalDate" placeholder="Arrival Date" onfocus="(this.type = 'date')" onblur="(this.type='text')" value="<?php echo $data['arrivalDate']; ?>">
        <div class="error-message"><?php echo $data['arrivalDate_err'];?></div>
      </div>

      <div  class="tbox <?php echo !empty($data['arrivalTime_err']) ? 'error' : ''; ?>">
        <input type="text" name="arrivalTime" placeholder="Arrival Time" onfocus="(this.type = 'time')" onblur="(this.type='text')" value="<?php echo $data['arrivalTime']; ?>">
        <div class="error-message"><?php echo $data['arrivalTime_err'];?></div>
      </div>

      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>