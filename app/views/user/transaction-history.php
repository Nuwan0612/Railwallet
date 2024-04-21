<?php require APPROOT . '/views/user/includes/header.php'; ?>
    <div class="transaction-history-container">
        <div class="content">
            <div class="transaction-history">
                <div class="transaction-title">
                    <i class='bx bx-history'></i>
                    <h2>Transaction History</h2>
                    <!-- <a href="#" class="btn">View All</a> -->
                </div>
                <div class="table-details">
                <table>
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Date</th>
                            <th>Reason</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rowNumber = 1; foreach($data['transactions'] as $transaction):?>
                        <tr>
                            <td><?php echo $rowNumber; ?></td>
                            <td><?php echo $transaction->date; ?></td>
                            <td><?php echo $transaction->reason; ?></td>
                            <td><?php echo $transaction->amount; ?></td>
                        </tr>
                        <?php $rowNumber++; endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/user/includes/footer.php';?>