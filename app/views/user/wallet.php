<?php require APPROOT . '/views/user/includes/header.php';?>
        <div class="wallet-container">
            <div class="content">
            <div class="wallet-heading">
                <h1>My Wallet</h1>
                <!-- <a href="<?php echo URLROOT; ?>passengers/addFeedback"><button>Give Feedback</button></a> -->
                <a href="<?php echo URLROOT;?>passengers/transaction" class="btn"><li><span>Topup</span></li></a>
            </div>
                <div class="cards">
                    <div class="card">
                        <div class="i">
                        <i class='bx bxs-dollar-circle' ></i>
                        </div>
                        <div class="box">
                            <h1>$500</h1>
                            <h2>Amount</h2>
                        </div>
                    </div>
                    <div class="card">
                    <div class="i">
                    <i class='bx bxs-credit-card' ></i>
                    </div>
                        <div class="box">
                            <h1>$1000</h1>
                            <h2>Spent</h2>
                        </div>
                    </div>
                    <div class="card">
                    <div class="i">
                    <i class='bx bxs-bank'></i>
                    </div>
                        <div class="box">
                            <h1>$3000</h1>
                            <h2>Balance</h2>
                        </div>
                    </div>
                </div>
                <div class="content-2">
                    <div class="recent-payments">
                        <div class="title">
                        <i class='bx bx-history'></i>
                            <h2>Transaction History</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2024/01/01</td>
                                <td>8.00 AM</td>
                                <td>Payment to xyz Shop</td>
                                <td><span class="debit-amount">-100$</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2024/01/03</td>
                                <td>10.00 AM</td>
                                <td>Payment to abc Shop</td>
                                <td><span class="debit-amount">-150$</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>2024/01/10</td>
                                <td>10.30 AM</td>
                                <td>Credit from abc ltd</td>
                                <td><span class="credit-amount">+300$</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>2024/01/15</td>
                                <td>9.00 AM</td>
                                <td>Transfer from John Doe</td>
                                <td><span class="credit-amount">+100$</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>2024/01/21</td>
                                <td>5.00 PM</td>
                                <td>Transfer from John Doe</td>
                                <td><span class="credit-amount">+100$</span></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>2024/01/28</td>
                                <td>6.00 PM</td>
                                <td>Transfer from John Doe</td>
                                <td><span class="credit-amount">+100$</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="chart">
                        <div class="title">
                        <i class='bx bx-line-chart'></i>
                            <h2>Chart</h2>
                        </div>
                        <div class="line-chart">
                            <div id="curve_chart" style="width: 500px; height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require APPROOT . '/views/user/includes/footer.php';?>