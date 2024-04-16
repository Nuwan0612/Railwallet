<?php require APPROOT . '/views/checker/includes/header.php';?>

<div class="content">
  <div class="ticket-details-outerbox">
    <div class="ticket">Ticket</div>
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