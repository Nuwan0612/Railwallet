<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="transaction-container">
    <form action="https://sandbox.payhere.lk/pay/checkout" method="POST" id="payhere-payment-form">
        <h3 class="transaction-title">Payment Details:</h3>
        <div class="row">
        <!-- <h3 class="transaction-title">Payment Details</h3> -->
            <div class="col">
                <!-- <h3 class="transaction-title">User Details</h3> -->
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="Kavindu Perera">
                </div>
                <!-- <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="kavindu@gmail.com">
                </div> -->
                <div class="inputBox">
                    <span>phone number :</span>

                    <input type="tel" placeholder="+94 713 456 289">
                </div>
                <!-- <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="card_img.png" alt="">
                    <img src="<?php echo URLROOT;?>public/css/index/card_img.png" class="ticket-logo">

                </div> -->
            </div>
            <div class="col">
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="kavindu@gmail.com">
                </div>
                <div class="inputBox">
                    <span>Amount :</span>
                    <input type="text" placeholder="1000.00">
                </div>
                <input type="hidden" name="merchant_id" value="1226507"> 
                <input type="hidden" name="return_url" value="http://localhost/payment/Success.php">
                <input type="hidden" name="cancel_url" value="/Fail.php">
                <input type="hidden" name="notify_url" value="http://localhost:8888/payhere">
                <input type="hidden" name="first_name" value="Keshali">
                <input type="hidden" name="last_name" value="Dhananjana">
                <input type="hidden" name="email" value="keshali@gmail.com">
                <input type="hidden" name="phone" value="0717737663">
                <input type="hidden" name="address" value="Colombo">
                <input type="hidden" name="city" value="Galle">
                <input type="hidden" name="country" value="Sri Lanka">
                <input type="hidden" name="order_id" value="123">
                <input type="hidden" name="items" value="123">
                <input type="hidden" name="currency" value="LKR">
                <input type="hidden" name="amount" value="1000.00">
                <input type="hidden" name="hash" id="hashField">
                <!-- <h3 class="transaction-title">Card Details</h3>
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
                </div> -->
            </div>
        </div>

        <button type="submit" onclick="calculateChecksum()">Pay Here</button>
    </form>
</div>
<?php require APPROOT . '/views/user/includes/footer.php';?>