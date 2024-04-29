<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Booking Details</div>
      </div>  

      <div class="detail-body" style="margin-top: 25px">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <!-- <th>Id</th> -->
                <th>User id</th>
                <!-- <th>Checker id</th> -->
                <th>Booking id</th>
                <th>Booking time</th>
                <th>Schedule id</th>
                <th>TicketPrice id</th> 
                <th>Payment id</th>
                <!-- <th>Payment date</th>   -->
              </tr>
            </thead>
            
            <tbody>
              <?php $rowNumber = 1; foreach($data['userBookings'] as $details):?>
              <tr>
                <td><?php echo $rowNumber; ?></td>
                <td><?php echo $details->userId; ?></td>
                <td><?php echo $details->bookingId; ?></td>
                <td><?php echo $details->bookingTime; ?></td>
                <td><?php echo $details->sheduleId; ?></td>
                <td><?php echo $details->ticketPriceID; ?></td>
                <td><?php echo $details->paymentId; ?></td>
                <!-- <td><?php echo $details->fine_date; ?></td> -->
                
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