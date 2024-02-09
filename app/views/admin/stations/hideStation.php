<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Abandoned Stations</div>
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
        <a class="links" href="<?php echo URLROOT;?>admins/stations"><button class="edit-btn">Stations In Use</button></a>
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
              <td><img class="qrCode" src="<?php echo URLROOT;?>/qrCodes/<?php echo $stations->qr; ?>" alt=""></td>
              <td>
                <div class="options">
                  <form action="<?php echo URLROOT; ?>admins/activeStation/<?php echo $stations->stationID?>" method ="post"><input class="edit-btn" type="submit" value="Open"></form>
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
