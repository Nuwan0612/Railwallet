<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Add Ticket Prices</h1>
  <a href="<?php echo URLROOT; ?>admins/tickets" class="close-button">
    <i class="fas fa-times"></i> 
  </a>
  <div class="add-train-form">
    <form action="<?php echo URLROOT; ?>admins/addTickets" method ="post">
      <div  class="tbox <?php echo !empty($data['ticketID_err']) ? 'error' : ''; ?>">
        <input type="text" name="ticketID" placeholder="Ticket ID" value="<?php echo $data['ticketID']; ?>">
        <div class="error-message"><?php echo $data['ticketID_err'];?></div>
      </div>

      <div class="tbox <?php echo !empty($data['DepartureStationID_err']) ? 'error' : ''; ?>">
        <input type="text" name="DepartureStationID" placeholder="Departure Station ID Number" value="<?php echo $data['DepartureStationID']; ?>">
        <div class="error-message"><?php echo $data['DepartureStationID_err'];?></div>
      </div>

      <div class="tbox <?php echo !empty($data['ArrivalStationID_err']) ? 'error' : ''; ?>">
        <input type="text" name="ArrivalStationID" placeholder="Arrival Station ID Number" value="<?php echo $data['ArrivalStationID']; ?>">
        <div class="error-message"><?php echo $data['ArrivalStationID_err'];?></div>
      </div>

      <div class="tbox <?php echo !empty($data['ClassID_err']) ? 'error' : ''; ?>">
        <input type="text" name="ClassID" placeholder="Class ID" value="<?php echo $data['ClassID']; ?>">
        <div class="error-message"><?php echo $data['ClassID_err'];?></div>
      </div>

      <div class="tbox <?php echo !empty($data['price_err']) ? 'error' : ''; ?>">
        <input type="number" name="price" placeholder="Ticket Price" value="<?php echo $data['price']; ?>">
        <div class="error-message"><?php echo $data['price_err'];?></div>
      </div>

      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>