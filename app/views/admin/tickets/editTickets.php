<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="add-train-details">
  <h1>Ticket ID <?php echo $data["ticketID"]?></h1>
  <a href="<?php echo URLROOT; ?>admins/tickets" class="close-button">
    <i class="fas fa-times"></i> 
  </a>
  <div class="add-train-form">
    <form class="emp-train-form" action="<?php echo URLROOT; ?>admins/editTicket/<?php echo $data['ticketID']; ?>" method ="post">

      <label for="name" class="labels">Station_1 Name:</label>
      <div class="tbox">
        <input type="text" value="<?php echo $data['Station_1_name']; ?>" readonly>
      </div>

      <label for="name" class="labels">Station_2 Name:</label>
      <div class="tbox">
        <input type="text" value="<?php echo $data['Station_2_name']; ?>" readonly>
      </div>

      <label for="name" class="labels">Train Class:</label>
      <div class="tbox <?php echo !empty($data['ClassID_err']) ? 'error' : ''; ?>">
        <input type="text" name="ClassID" placeholder="Class ID" value="<?php echo $data['ClassID']; ?>">
        <div class="error-message"><?php echo $data['ClassID_err'];?></div>
      </div>

      <label for="name" class="labels">Price(Rs.):</label>
      <div class="tbox <?php echo !empty($data['price_err']) ? 'error' : ''; ?>">
        <input type="number" name="price" placeholder="Ticket Price" value="<?php echo $data['price']; ?>">
        <div class="error-message"><?php echo $data['price_err'];?></div>
      </div>

      <label></label>
      <div>
        <input class="sbtn" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>