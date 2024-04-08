<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="ticket-body">
<div class="ticket">
        <div class="picture">
            <img src="<?php echo URLROOT;?>public/css/index/train.jpeg" class="train-img">
        </div>
        <div class="details">
            <!-- <div class="ticket-header">
                <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="ticket-logo">
                <h2>RailWallet Ticket</h2>
            </div> -->
            <div class="ticket-header">
                <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="ticket-logo">
                <h2>RailWallet Ticket</h2>
            </div>
            <div class="ticket-content">
                <div class="ticket-display">
                <p><strong>Passenger Name:</strong> John Doe</p>
                <p><strong>Train Number:</strong> 12345</p>
                    <p><strong>From:</strong> City A</p>
                    <p><strong>To:</strong> City B</p>
                    <p><strong>Date:</strong> February 21, 2024</p>
                    <p><strong>Departure Time:</strong> 10:00 AM</p>
                    <p><strong>Class:</strong> 2</p>
                    <p><strong>Price:</strong> $50.00</p>
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
<?php require APPROOT . '/views/user/includes/footer.php';?>