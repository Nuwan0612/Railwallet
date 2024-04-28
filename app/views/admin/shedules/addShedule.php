<?php require APPROOT . '/views/admin/includes/header.php';?>
<div class="content">
  <div class="register-from-outer-container">
    <div class="schedule-outer">
      <h1>Route Details</h1>
      <a href="<?php echo URLROOT; ?>admins/shedules" class="close-button">
        <i class="fas fa-times"></i> 
      </a>

      <div class="below-section">
        <form action="<?php echo URLROOT; ?>admins/addTrainShedule" method ="post">

        <div class="below-upper">
          <label for="sheduleID" class="labels">Schedule ID:</label> 
          <div class="tbox <?php echo !empty($data['sheduleID_err']) ? 'error' : ''; ?>">
            <input type="text" name="sheduleID" placeholder="Shedule ID" value="<?php echo $data['sheduleID']; ?>">
            <div class="error-message"><?php echo $data['sheduleID_err'];?></div>
          </div>

          <label for="trainID" class="labels">Train ID:</label> 
          <div  class="tbox <?php echo !empty($data['trainID_err']) ? 'error' : ''; ?>">
            <input type="text" name="trainID" placeholder="Train ID" value="<?php echo $data['trainID']; ?>">
            <div class="error-message"><?php echo $data['trainID_err'];?></div>
          </div>

          <label for="way" class="labels">Way:</label> 
          <div  class="tbox <?php echo !empty($data['way_err']) ? 'error' : ''; ?>">
            <input type="number" name="way" placeholder="Way" value="<?php echo $data['way']; ?>">
            <div class="error-message"><?php echo $data['way_err'];?></div>
          </div>
        </div>
          
          <div class="station-details-outer">
            <div class="below-upper">
              <label for="departureStationID" class="labels">Departure Station:</label>
              <div class="tbox <?php echo !empty($data['departureStationID_err']) ? 'error' : ''; ?>">
                <input type="text" name="departureStationID" placeholder="Departure Station ID" value="<?php echo $data['departureStationID']; ?>">
                <div class="error-message"><?php echo $data['departureStationID_err'];?></div>
              </div>

              <label for="departureDate" class="labels">Departure Date:</label>
              <div  class="tbox <?php echo !empty($data['departureDate_err']) ? 'error' : ''; ?>">
                <input type="text" name="departureDate" placeholder="Departure Date" onfocus="(this.type = 'date')" onblur="(this.type='text')" value="<?php echo $data['departureDate']; ?>">
                <div class="error-message"><?php echo $data['departureDate_err'];?></div>
              </div>

              <label for="departureTime" class="labels">Departure Time:</label>
              <div  class="tbox <?php echo !empty($data['departureTime_err']) ? 'error' : ''; ?>">
                <input type="text" name="departureTime" placeholder="Departure Time" onfocus="(this.type = 'time')" onblur="(this.type='text')" value="<?php echo $data['departureTime']; ?>">
                <div class="error-message"><?php echo $data['departureTime_err'];?></div>
              </div>
            </div>
          
            <div class="below-upper">
              <label for="arrivalStationID" class="labels">Arrival Station:</label>
              <div class="tbox <?php echo !empty($data['arrivalStationID_err']) ? 'error' : ''; ?>">
                <input type="text" name="arrivalStationID" placeholder="Arrival Station ID" value="<?php echo $data['arrivalStationID']; ?>">
                <div class="error-message"><?php echo $data['arrivalStationID_err'];?></div>
              </div>

              <label for="arrivalDate" class="labels">Arrival Date:</label>
              <div  class="tbox <?php echo !empty($data['arrivalDate_err']) ? 'error' : ''; ?>">
                <input type="text" name="arrivalDate" placeholder="Arrival Date" onfocus="(this.type = 'date')" onblur="(this.type='text')" value="<?php echo $data['arrivalDate']; ?>">
                <div class="error-message"><?php echo $data['arrivalDate_err'];?></div>
              </div>

              <label for="arrivalTime" class="labels">Arrival Time:</label>
              <div  class="tbox <?php echo !empty($data['arrivalTime_err']) ? 'error' : ''; ?>">
                <input type="text" name="arrivalTime" placeholder="Arrival Time" onfocus="(this.type = 'time')" onblur="(this.type='text')" value="<?php echo $data['arrivalTime']; ?>">
                <div class="error-message"><?php echo $data['arrivalTime_err'];?></div>
              </div>
            </div>
          </div>

          <div>
            <input class="sbtn" type="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>