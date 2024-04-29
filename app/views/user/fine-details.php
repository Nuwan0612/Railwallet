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
            </div>    
        </div>
            <div class="cards">
                <!-- <a href="#">
                <div class="card">
                    <div class="i">
                        <i class='bx bxs-dollar-circle' ></i>
                    </div>
                    <div class="box">
                        <h1>Rs. <?php echo $data['recent']->fine_amount?></h1>
                        <h2>Recent Fine</h2>
                    </div>
                </div>
                </a> -->

                <a href="#">
                <div class="card">
                    <div class="i">
                        <i class='bx bx-money-withdraw'></i>
                    </div>
                    <div class="box">
                        <h1>Rs. <?php echo $data['total-fines']->totalFine?></h1>
                        <h2>Total Fines</h2>
                    </div>
                </div>
                </a>
                    <!-- <a href="<?php echo URLROOT;?>passengers/transaction">
                <div class="card">
                    <div class="i">
                        <i class='bx bxs-bank'></i>
                    </div>
                    <div class="box">
                        <h1>Rs. <?php echo $data['balance']->balance?></h1>
                        <h2>Balance</h2>
                    </div>
                </div>
                    </a> -->
            </div>
        
        <div class="content-2">
            <div class="recent-fines">
                <div class="title">
                    <i class='bx bx-history'></i>
                    <h2>Fine History</h2>
                    <!-- <a href="#" class="btn">View All</a> -->
                </div>
                <div class="table-details">
                <table>
                <thead>
                    <tr>
                        <th>Fine ID</th>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rowNumber = 1; foreach($data['fines'] as $fine):?>
                    <tr>
                        <td><?php echo $rowNumber; ?></td>
                        <td><?php echo $fine->fineDate; ?></td>
                        <td><?php echo $fine->fine_reason; ?></td>
                        <?php 
                            $url = URLROOT;
                            if($fine->payment_status){
                                echo "<td style='color: green; font-weight: bold'>Paid</td>";
                            } else {
                                echo "<td style='font-weight: bold'><a href='$url/passengers/payfine/$fine->fine_id' style='color: red; text-decoration: none;'>Not paid</a></td>";

                            }
                        ?>
                        <td><?php echo $fine->fine_amount; ?></td>
                    </tr>
                    <?php $rowNumber++; endforeach; ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php require APPROOT . '/views/user/includes/footer.php';?>