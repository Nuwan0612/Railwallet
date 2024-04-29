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
           
          <div class="content-2" style="padding: 40px;">
            <div class="recent-fines" style="height: 600px">
                <div class="title">
                    <h2>Journey History</h2>
                    <!-- <a href="#" class="btn">View All</a> -->
                </div>
                <div class="table-details" style="height: 600px">
                  <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Departure Station</th>
                            <th>Arrival Station</th>
                            <th>Date</th>
                            <th>Qr</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rowNumber = 1; foreach($data['journey'] as $journey):?>
                        <tr>
                            <td><?php echo $journey->id; ?></td>
                            <td><?php echo $journey->depS; ?></td>
                            <td><?php echo $journey->arr; ?></td>
                            <td><?php echo $journey->date; ?></td>
                            <td><img src="<?php echo URLROOT?>public/qrCodes/<?php echo $journey->qr_code;?>" style="width: 80px"></td>
                            <?php 
                                if($journey->completed == 1 && $journey->canceled == 1){
                                    echo "<td style='color: red; font-weight: bold'>Fined</td>";
                                } else if($journey->completed == 0 && $journey->canceled == 0){
                                  echo "<td style='font-weight: bold'>On Journey</td>";
                                }else if($journey->completed == 1) {
                                  echo "<td style='color: green; font-weight: bold'>On Journey</td>";
                                }else{
                                    echo "<td style='color: red; font-weight: bold'>Not completed</td>";
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
    </div>
<?php require APPROOT . '/views/user/includes/footer.php';?>