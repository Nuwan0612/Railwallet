<?php require APPROOT . '/views/user/includes/header.php'; ?>

<div class="content">
    <div class="qr-outer-container">
        <img src="<?php echo URLROOT?>public/qrCodes/<?php echo $data['qrImage']?>">
    </div>
</div>

<?php require APPROOT . '/views/user/includes/footer.php'; ?>
