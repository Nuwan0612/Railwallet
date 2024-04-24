<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="container">
    <div class="content">
    <form action="https://sandbox.payhere.lk/pay/checkout" method="POST" id="payhere-payment-form">
        <h3 class="transaction-title">Payment Details:</h3>
        <div class="row">
        <!-- <h3 class="transaction-title">Payment Details</h3> -->
            <div class="col">
                <!-- <h3 class="transaction-title">User Details</h3> -->
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" value="<?php echo $_SESSION["user_fname"]?>">
                </div>
                <!-- <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="kavindu@gmail.com">
                </div> -->
                <div class="inputBox">
                    <span>phone number :</span>

                    <input type="tel" value="<?php echo $_SESSION["user_phone"]?>">
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
                    <input type="email" value="<?php echo $_SESSION["user_email"]?>">
                </div>
                <div class="inputBox">
                    <span>Amount :</span>
                    <input type="number" id="amountInput" placeholder="">
                </div>

                <input type="hidden" name="merchant_id" value="1226507"> 
                <input type="hidden" id="returnUrl" name="return_url" value="">
                <input type="hidden" name="cancel_url" value="<?php echo URLROOT?>/passengers/failTransaction/">
                <input type="hidden" name="notify_url" value="http://localhost:8888/payhere">
                <input type="hidden" name="first_name" value="<?php echo $_SESSION["user_fname"]?>">
                <input type="hidden" name="last_name" value="<?php echo $_SESSION["user_lname"]?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION["user_email"]?>">
                <input type="hidden" name="phone" value="<?php echo $_SESSION["user_phone"]?>">
                <input type="hidden" name="address" value="Colombo">
                <input type="hidden" name="city" value="Galle">
                <input type="hidden" name="country" value="Sri Lanka">
                <input type="hidden" name="order_id" value="<?php echo $data["transactions"] ?>">
                <input type="hidden" name="items" value="<?php echo $data["transactions"] ?>">
                <input type="hidden" name="currency" value="LKR">
                <input type="hidden" name="amount" id="hiddenAmount" value="">
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
</div>
<script>
    // Function to update hidden amount field with decimal value
    function updateHiddenAmount() {
        // Get the value entered by the user
        var amountInput = document.getElementById("amountInput").value;
        
        // Convert the input value to a decimal
        var decimalValue = parseFloat(amountInput).toFixed(2);

        // Update the hidden input field with the decimal value
        document.getElementById("hiddenAmount").value = decimalValue;

        // Update the return_url dynamically based on the amount entered
        // document.getElementById("returnUrl").value = "<?php echo URLROOT?>/passengers/updateTransaction/" + encodeURIComponent(decimalValue);
    }

    function updateReturnUrl() {
        var amountInput = document.getElementById("amountInput").value;
        document.getElementById("returnUrl").value = "<?php echo URLROOT?>/passengers/updateTransaction/" + encodeURIComponent(amountInput);
    }

    // Attach event listener to the amount input field
    document.getElementById("amountInput").addEventListener("input", updateReturnUrl);

    // Attach event listener to the amount input field
    document.getElementById("amountInput").addEventListener("input", updateHiddenAmount);
</script>

<?php require APPROOT . '/views/user/includes/footer.php';?>