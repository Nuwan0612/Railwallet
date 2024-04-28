<?php require APPROOT . '/views/admin/includes/header.php';?>
<div class="content">
  <div class="register-from-outer-container">
    <div class="add-train-details">
      <h1>Add Ticket Prices</h1>
      <a href="<?php echo URLROOT; ?>admins/tickets" class="close-button">
        <i class="fas fa-times"></i> 
      </a>
      <div class="add-train-form">
        <form class="emp-train-form" action="<?php echo URLROOT; ?>admins/addTickets" method ="post">

          <label for="ticketID" class="labels">Ticket Id:</label>
          <div  class="tbox <?php echo !empty($data['ticketID_err']) ? 'error' : ''; ?>">
            <input type="text" name="ticketID" placeholder="Ticket ID" value="<?php echo $data['ticketID']; ?>">
            <div class="error-message"><?php echo $data['ticketID_err'];?></div>
          </div>

          <label for="Station_1_ID" class="labels">Station 1:</label>
          <div class="tbox <?php echo !empty($data['Station_1_ID_err']) ? 'error' : ''; ?>">
            <input type="text" name="Station_1_ID" placeholder="Station_1 ID Number" value="<?php echo $data['Station_1_ID']; ?>">
            <div class="error-message"><?php echo $data['Station_1_ID_err'];?></div>
          </div>

          <label for="Station_2_ID" class="labels">Station 2:</label>
          <div class="tbox <?php echo !empty($data['Station_2_ID_err']) ? 'error' : ''; ?>">
            <input type="text" name="Station_2_ID" placeholder="Station_2 ID Number" value="<?php echo $data['Station_2_ID']; ?>">
            <div class="error-message"><?php echo $data['Station_2_ID_err'];?></div>
          </div>

          <label for="ClassID" class="labels">Train Class:</label>
          <div class="tbox <?php echo !empty($data['ClassID_err']) ? 'error' : ''; ?>">
            <input type="text" name="ClassID" placeholder="Class ID" value="<?php echo $data['ClassID']; ?>">
            <div class="error-message"><?php echo $data['ClassID_err'];?></div>
          </div>

          <label for="number" class="labels">Price:</label>
          <div class="tbox <?php echo !empty($data['price_err']) ? 'error' : ''; ?>">
            <input type="number" step="any" name="price" placeholder="Ticket Price" value="<?php echo $data['price']; ?>">
            <div class="error-message"><?php echo $data['price_err'];?></div>
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