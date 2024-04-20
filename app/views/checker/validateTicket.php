<?php require APPROOT . '/views/checker/includes/header.php';?>

<div class="content">
  <div class="ticket-details-outerbox">
    <div class="ticket-inner">
    <div class="ticket-body">
      <div class="ticket">
              <div class="picture">
                  <img src="<?php echo URLROOT;?>public/css/index/train.jpeg" class="train-img">
              </div>
              <div class="details">
                 
                  <div class="ticket-header">
                      <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="ticket-logo">
                      <h2>RailWallet Ticket</h2>
                  </div>
                  <div class="ticket-content">
                      <div class="ticket-display">
                        <p><strong>Passenger Name: </strong><?php echo $data['name']?></p>
                        <p><strong>From:</strong> <?php echo $data['depStation']?></p>
                        <p><strong>To:</strong> <?php echo $data['arrStation']?></p>
                        <p><strong>Date:</strong> <?php echo $data['date']?></p>
                        <p><strong>Class:</strong> <?php echo $data['class']?></p>
                        <p><strong>Price:</strong> <?php echo $data['price']?></p>
                        <p><strong>Status:</strong> <?php echo $data['status']?></p>
                      </div>
                      <div class="ticket-qr">
                          <i class='bx bx-qr'></i>
                      </div>
                  </div>
                  <div class="footer">
                      <p>Thank you!</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="fine-options">
      <div class="option-buttons-checker">
        <button class="delete-btn" onclick="cancelJourney()">Cancel Ticket</button>
        <button class="edit-btn" onclick="redirectToscan()">Ok</button>
        <button class="delete-btn" onclick="issueFine()">Isuue Fine</button>
      </div>

      <div class="reason-amount">
        <textarea id="fine-details" cols="70" rows="2" placeholder="Reason for fine"></textarea>
        <input type="number" id="fine-amount" placeholder="Fine amount">
      </div>
      
      <div class="warning-message">
        <p class="warning"></p>
      </div>
    </div>
  </div>
</div> 

<script src="<?php echo URLROOT?>/js/checker/checkerOptions.js"></script>
<?php require APPROOT . '/views/checker/includes/footer.php';?>