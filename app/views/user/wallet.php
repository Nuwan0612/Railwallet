<?php require APPROOT . '/views/user/includes/header.php';?>


    <div class="container">
        <div class="content">
            <div class="notification-outer-container">
                <div class="notification-header">
                    <div class="notification-header-inner">
                        Notifications
                    </div>   
                </div>
                
                <div class="notification-body-outer">  

                    <!-- <div class="notification-body">
                        <div class="notification">
                         ${message.message}
                        </div>

                    </div>       -->
                </div>    
            </div>

            <div class="cards">
               <a href="#">
                <div class="card">
                <div class="i">
                <i class='bx bxs-credit-card' ></i>
                </div>
                    <div class="box">
                        <h1>Rs. <?php echo $data['spents']->totalSpent?></h1>
                        <h2>Spent</h2>

                    </div>
                </div>
              </a>
        
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
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <?php

            $chartData = $data['chart'];

            $chartDataJSON = json_encode($chartData);
        ?>

    <script>

        const chartData = <?php echo $chartDataJSON; ?>;

        let date = [];
        let balance = [];


        // Log the data to the console
        chartData.forEach(ele => {
            date.push(ele.date);
            balance.push(ele.balance);
        })

        const ctx = document.getElementById('myChart');

        const data = {

        labels: date,
        datasets: [{
            label: 'Wallet Balance',
            data: balance,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
        };

        const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }

        };

        // Create a new chart instance
        const myChart = new Chart(ctx, config);


    </script>


<?php require APPROOT . '/views/user/includes/footer.php';?>