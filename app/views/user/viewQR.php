<?php require APPROOT . '/views/user/includes/header.php'; ?>

<div class="content">
        <div class="notification-outer-container">
            <div class="notification-header">
                <div class="notification-header-inner">
                    Notifications
                </div>   
            </div>
            
            <div class="notification-body-outer">        
            </div>    
        </div>
    <div class="qr-outer-container">
        <img src="<?php echo URLROOT?>public/qrCodes/<?php echo $data['qrImage']?>">
    </div>
</div>

<?php require APPROOT . '/views/user/includes/footer.php'; ?>
