<?php require APPROOT . '/views/checker/includes/header.php';?>

<div class="content">
  <div class="qr-scanner-outer-container">
    <div class="qr-inner-container">
      <div class="section">
        <div id="my-qr-reader">
        </div>
      </div>
      <div class="isuue-fine-details">
        <textarea id="fine-detail" cols="70" rows="1" placeholder="Reason for fine"></textarea>
        <input type="number" id="fine-amount-user" placeholder="Fine amount">
        <input type="text" id="user-id" placeholder="Passenger id">
        <button id="fine-btn" onclick="issueFineWithUserId()">Isuue Fine</button>
      </div>      
      <div class="warning"></div>     
    </div>
  </div>
</div> 

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="<?php echo URLROOT?>/js/qrScan/checkerScan.js"></script>
<script src="<?php echo URLROOT?>/js/checker/checkerOptions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php require APPROOT . '/views/checker/includes/footer.php';?>