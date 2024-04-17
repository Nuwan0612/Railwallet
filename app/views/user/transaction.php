<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="transaction-container">
    <form action="">
        <div class="row">
            <div class="col">
                <h3 class="transaction-title">User Details</h3>
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="Kavindu Perera">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="kavindu@gmail.com">
                </div>
                <div class="inputBox">
                    <span>phone number :</span>

                    <input type="tel" placeholder="+94 713 456 289">
                </div>
                <div class="inputBox">
                    <span>cards accepted :</span>
                    <!-- <img src="card_img.png" alt=""> -->
                    <img src="<?php echo URLROOT;?>public/css/index/card_img.png" class="ticket-logo">

                </div>
            </div>
            <div class="col">
                <h3 class="transaction-title">Card Details</h3>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="Mr. Kavindu Perera">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>

                    <input type="text" placeholder="1111-2222-3333-4444">

                </div>
                <div class="inputBox">
                    <span>CVV :</span>
                    <input type="text" placeholder="1234">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>

                        <input type="number" placeholder="2022">

                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" value="Pay here" class="submit-btn">
    </form>
</div>
<?php require APPROOT . '/views/user/includes/footer.php';?>