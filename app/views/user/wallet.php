<?php require APPROOT . '/views/user/includes/header.php';?>
        <div class="container">
            <div class="content">
            <!-- <div class="wallet-heading">
                <h1>My Wallet</h1>
                <a href="<?php echo URLROOT; ?>passengers/addFeedback"><button>Give Feedback</button></a>
                <a href="<?php echo URLROOT;?>passengers/transaction" class="btn"><li><span>Topup</span></li></a>
            </div> -->
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
                    <a href="<?php echo URLROOT;?>passengers/transaction">
                        <div class="card">
                            <div class="i">
                            <i class='bx bxs-bank'></i>
                            </div>
                            <div class="box">
                                <h1>Rs. <?php  echo $data['balance']->balance?></h1>
                                <h2>Balance</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="content-2">
                    <div class="recent-payments">
                        <div class="wallet-title">
                        <i class='bx bx-history'></i>
                            <h2>Transaction History</h2>
                            <a href="<?php echo URLROOT;?>passengers/transactionHistory" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <!-- <th>Time</th> -->
                                <th>Reason</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $rowNumber = 1; foreach($data['transactions'] as $transaction):?>
                            <tr>
                                <td><?php echo $rowNumber; ?></td>
                                <td><?php echo $transaction->date; ?></td>
                                <!-- <td>8.00 AM</td> -->
                                <td><?php echo $transaction->reason; ?></td>
                                <td><?php echo $transaction->amount; ?></td>
                            </tr>
                            <?php $rowNumber++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="chart">
                        <div class="wallet-title">
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