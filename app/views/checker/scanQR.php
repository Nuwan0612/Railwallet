<?php require APPROOT . '/views/checker/includes/header.php';?>

<div class="content">
  <div class="qr-scanner-outer-container">
    <div class="qr-inner-container">
      <div class="section">
        <div id="my-qr-reader">
        </div>
      </div>      
      <div class="warning"></div>     
    </div>
  </div>
</div> 

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="<?php echo URLROOT?>/js/qrScan/checkerScan.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php require APPROOT . '/views/checker/includes/footer.php';?>