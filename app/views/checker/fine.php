<?php require APPROOT . '/views/checker/includes/header.php';?>

<div class="content">
    <div class="detail-body-outer">
    <div class="search-bar-outer-container">
      <div class="search-bar-inner-container">
        <div class="search-bar">
          <input type="text" class="border-search" id="search-fines" placeholder="Enter User ID">
          <button class="search-button" onclick="searchFines()">
            <i class="fas fa-search"></i>
          </button> 
        </div>
      </div>
    </div>

    <div class="detail-body">
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Fine ID</th>
              <th>Passenger ID</th>
              <th>Journey ID</th>
              <th>Reason</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Payment Status</th> 
              <th>Payment Date</th> 
            </tr>
          </thead>
          
          <tbody>
            <?php $rowNumber = 1; foreach($data['fines'] as $fine):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $fine->passenger_id; ?></td>
              <td><?php echo $fine->journey_id; ?></td>
              <td><?php echo $fine->fine_reason; ?></td>
              <td><?php echo $fine->fine_amount; ?></td>
              <td><?php echo $fine->fine_date; ?></td>
              <?php
                if($fine->payment_status){
                  echo "<td style='color: green; font-weight: bold;'>Paid</td>";
                } else {
                  echo "<td style='color: red; font-weight: bold;'>Not paid</td>";
                }
              ?>
              <td><?php echo $fine->payment_date; ?></td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>  
    </div>
</div>

<?php require APPROOT . '/views/checker/includes/footer.php';?>