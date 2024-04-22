<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Fine Details</div>
      </div>  

      <div class="detail-body" style="margin-top: 25px">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Id</th>
                <th>User id</th>
                <th>Checker id</th>
                <th>Journey id</th>
                <th>Fine amount</th>
                <th>Fine reason</th>
                <th>Fine date</th> 
                <th>Payment status</th>
                <th>Payment date</th>  
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['userFineDetails'] as $details):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $details->fine_id; ?></td>
              <td><?php echo $details->passenger_id; ?></td>
              <td><?php echo $details->checker_id; ?></td>
              <td><?php echo $details->journey_id; ?></td>
              <td><?php echo $details->fine_amount; ?></td>
              <td><?php echo $details->fine_reason; ?></td>
              <td><?php echo $details->fine_date; ?></td>
              <?php 
                if($details->payment_status){
                  echo "<td style='color: #009688; font-weight: bold'>Paid</td>";
                } else {
                  echo "<td style='color: red; font-weight: bold'>Not paid</td>";
                }
              ?>
              <td><?php echo $details->payment_date; ?></td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>

  <script src="<?php echo URLROOT?>/js/search/search.js"></script>

<?php require APPROOT . '/views/admin/includes/footer.php';?>