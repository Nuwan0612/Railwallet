<?php require APPROOT . '/views/user/includes/header.php';?>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                    
                        <h1>LKR 950</h1>
                        <h3>Last Month Usage</h3>  
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/man.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>Last Ticket</h1>
                        <h3>LKR 200</h3>      
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/qr-code.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2023/08/29</h1>
                        <h3>Last Login</h3> 
                       
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/customer-service.png" alt="">
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="box">
                        <h1>350000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div> -->
            </div>
            <div class="content-2">
            <div class="recent-payments">
                        <div class="title">
                            <h2>Transaction History</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <tr>
                                <th>Transaction <br> ID</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>Ts0001</td>
                                <td>2024/01/01</td>
                                <td>8.00 AM</td>
                                <td>Payment to xyz Shop</td>
                                <td><span class="debit-amount">-100$</span></td>
                            </tr>
                            <tr>
                                <td>Ts0002</td>
                                <td>2024/01/03</td>
                                <td>10.00 AM</td>
                                <td>Payment to abc Shop</td>
                                <td><span class="debit-amount">-150$</span></td>
                            </tr>
                            <tr>
                                <td>Ts0003</td>
                                <td>2024/01/10</td>
                                <td>10.30 AM</td>
                                <td>Credit from abc ltd</td>
                                <td><span class="credit-amount">+300$</span></td>
                            </tr>
                            <tr>
                                <td>Ts0004</td>
                                <td>2024/01/15</td>
                                <td>9.00 AM</td>
                                <td>Transfer from John Doe</td>
                                <td><span class="credit-amount">+100$</span></td>
                            </tr>
                            <tr>
                                <td>Ts0005</td>
                                <td>2024/01/21</td>
                                <td>5.00 PM</td>
                                <td>Transfer from John Doe</td>
                                <td><span class="credit-amount">+100$</span></td>
                            </tr>
                            <tr>
                                <td>Ts0006</td>
                                <td>2024/01/28</td>
                                <td>6.00 PM</td>
                                <td>Transfer from John Doe</td>
                                <td><span class="credit-amount">+100$</span></td>
                            </tr>
                        </table>
                    </div>

    
    <?php require APPROOT . '/views/user/footer.php';?>   