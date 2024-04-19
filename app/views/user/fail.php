<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="transaction-container">

    <form action="">
        <h3 class="transaction-title">Transaction Failed</h3>
        <div class="row">
            <div class="col">
                <div class="inputBox">
                    <span>transaction id :</span>
                    <input type="text" value="<?php echo $_SESSION["user_name"]?>">
                </div>
                <div class="inputBox">
                    <span>passenger name :</span>

                    <input type="tel" value="<?php echo $_SESSION["user_phone"]?>">
                </div>

            </div>
            <div class="col">
                <div class="inputBox">
                    <span>time :</span>
                    <input type="email" value="<?php echo $_SESSION["user_email"]?>">
                </div>
                <div class="inputBox">
                    <span>Amount :</span>
                    <input type="number" id="amountInput" placeholder="">
                </div>

            </div>
        </div>

        <button type="submit" onclick="calculateChecksum()">OK</button>
    </form>
    
</div>

<?php require APPROOT . '/views/user/includes/footer.php';?>