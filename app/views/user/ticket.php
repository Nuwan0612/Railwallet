<?php require APPROOT . '/views/user/includes/header.php'; ?>

<div class="ticket-body">
    <?php $ticket=$data['ticket'] ?>
        <div class="ticket-all">
        <div class="ticket-wrapper">
        <div class="ticket">
            <div class="picture">
                <img src="<?php echo URLROOT; ?>public/css/index/train.jpeg" class="train-img">
            </div>
            <div class="details">
                <div class="ticket-header">
                    <img src="<?php echo URLROOT; ?>public/css/index/logo1.png" class="ticket-logo">
                    <h2>RailWallet Ticket</h2>
                </div>
                <div class="ticket-content">
                    <div class="ticket-display">
                        <p><strong>Passenger Name:</strong> <?php echo $ticket->userName; ?></p>
                        <p><strong>Train Number:</strong> <?php echo $ticket->name; ?></p>
                        <p><strong>From:</strong><?php echo $ticket->depStation; ?></p>
                        <p><strong>To:</strong><?php echo $ticket->arrStation ?></p>
                        <p><strong>Date:</strong> <?php echo $ticket->departureDate; ?></p>
                        <p><strong>Departure Time:</strong> <?php echo $ticket->departureTime; ?></p>
                        <p><strong>Class:</strong> <?php echo $ticket->className; ?></p>
                        <p><strong>Price:</strong> <?php echo $ticket->price; ?></p>
                    </div>
                    <div class="ticket-qr">
                    <img class="ticketQrCode" src="<?php echo URLROOT;?>/qrCodes/<?php echo $ticket->qrId; ?>" alt="">
                    </div>
                </div>
                <div class="footer">
                    <p>Thank you!</p>
                </div>
            </div>
        </div>
        </div>
        </div>

</div>

<?php require APPROOT . '/views/user/includes/footer.php'; ?>
