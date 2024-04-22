<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Travel Details</div>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar-shedule">
            <input class="border-search" type="text" id="search-travel-details" placeholder="Date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            
            <button class="search-button" onclick="searchTravelDetails()">
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
                <th>#</th>
                <th>Id</th>
                <th>User id</th>
                <th>Ticket id</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Start time</th>
                <th>End time</th> 
                <th>QR</th>
                <th>Status</th>  
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['userTravelDetails'] as $details):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $details->id; ?></td>
              <td><?php echo $details->passenger_id; ?></td>
              <td class="tooltip">
                <?php echo $details->ticket_id; ?>
                <span class="tooltiptext">
                  <?php echo "Class: ".$details->className."\nPrice: ".$details->price?>
                </span>
              </td>
              <td class="tooltip">
                <?php echo $details->depStation; ?>
                <span class="tooltiptext"><?php echo $details->depStationName?></span>
              </td>
              <td class="tooltip">
                <?php echo $details->arrStation; ?>
                <span class="tooltiptext"><?php echo $details->arrStationName?></span>    
              </td>
              <td><?php echo $details->start_time; ?></td>
              <td><?php echo $details->end_time; ?></td>
              <td><img class="qrCode" src="<?php echo URLROOT;?>/qrCodes/<?php echo $details->qr_code; ?>" alt=""></td>
              <?php 
                if($details->completed == 1){
                  echo "<td style='color: #009688; font-weight: bold'>Completed</td>";
                } else if($details-> canceled == 1) {
                  echo "<td style='color: red; font-weight: bold'>Canceled</td>";
                }  else {
                  echo "<td>On journey</td>";
                }
              ?>
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