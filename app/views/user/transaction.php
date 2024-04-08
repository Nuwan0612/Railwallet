<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="transaction-container">
    <form action="">
        <div class="row">
            <div class="col">
                <h3 class="transaction-title">billing address</h3>
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="john deo">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <span>phone number :</span>
                    <input type="text" placeholder="+94 123 456 789">
                </div>
                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="<?php echo URLROOT;?>public/css/index/card_img.png" class="card-img">
                </div>
            </div>
            <div class="col">
                <h3 class="transaction-title">payment</h3>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo">
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
                        <input type="text" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn">
    </form>
</div>
<?php require APPROOT . '/views/user/includes/footer.php';?>