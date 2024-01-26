<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Not Working Trains</div>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" id="search-train" placeholder="Enter Train ID">
            <button class="search-button" onclick="searchTrain()">
              <i class="fas fa-search"></i>
            </button> 
          </div>
        </div>

        
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/trains"><button class="edit-btn">Availabe Trains</button></a>
        </div>
        
      </div>

    
      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Train ID</th>
                <th>Train Name</th>
                <th>Train Type</th>
                <th>First Class Seat</th>
                <th>Second Class Seat</th>
                <th>Third Class Seat</th>
                <th>Option</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['trains'] as $train):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $train->trainID; ?></td>
              <td><?php echo $train->name; ?></td>
              <td><?php echo $train->type; ?></td>
              <td><?php echo $train->firstCapacity; ?></td>
              <td><?php echo $train->secondCapacity; ?></td>
              <td><?php echo $train->thirdCapacity; ?></td>
              <td>
                <div class="options">
                  
                  <form action="<?php echo URLROOT; ?>admins/setRunning/<?php echo $train->trainID?>" method ="post"><input class="edit-btn" type="submit" value="Set as active"></form>
                </div> 
              </td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>
