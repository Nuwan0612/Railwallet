<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Train Routes</div>
        <a href="<?php echo URLROOT; ?>admins/addRoutes"><button class="add-train">Add</button></a>
      </div>
      <div class="search-bar">
        <input type="text" id="search-station" placeholder="Enter Station ID or Name">
        <button class="search-button" onclick="searchStation()">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Route ID</th>
                <th>Train ID</th>
                <th>Station ID</th>
                <th>Stop Order</th>
                <th>Options</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['routes'] as $routes):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $routes->routeID; ?></td>
              <td><?php echo $routes->trainID; ?></td>
              <td><?php echo $routes->stationID; ?></td>
              <td><?php echo $routes->stopOrder; ?></td>
              <td>
                <div class="options">
                <a href="<?php echo URLROOT; ?>admins/editStation/<?php echo $routes->id; ?>"><button class="edit-btn">Edit</button></a>
                  <form action="<?php echo URLROOT; ?>admins/deleteStation/<?php echo $routes->id?>" method ="post"><input class="delete-btn" type="submit" value="Delete"></form>
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
