<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Railway Stations</div>
        <a href="<?php echo URLROOT; ?>admins/addStation"><button class="add-train">Add</button></a>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
          <input type="text" id="search-station" placeholder="Enter Station ID or Name">
            <button class="search-button" onclick="searchStation()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/closedStations"><button class="delete-btn">Closed Stations</button></a>
        </div>        
      </div>



      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Station ID</th>
                <th>Name</th>
                <th>QR Code</th>
                <th>Options</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['stations'] as $stations):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $stations->stationID; ?></td>
              <td><?php echo $stations->name; ?></td>
              <td><?php echo $stations->qr; ?></td>
              <td>
                <div class="options">
                <a href="<?php echo URLROOT; ?>admins/editStation/<?php echo $stations->stationID; ?>"><button class="edit-btn">Edit</button></a>
                  <form action="<?php echo URLROOT; ?>admins/deactiveStation/<?php echo $stations->stationID?>" method ="post"><input class="delete-btn" type="submit" value="Close"></form>
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
