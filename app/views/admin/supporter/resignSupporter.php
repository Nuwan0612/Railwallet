<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Resign Customer Support Operator</div>
      </div>
      
      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" id="search-supporter" placeholder="Enter Employee NIC">
            <button class="search-button" onclick="searchSupporter()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/supporters"><button class="edit-btn">Working Employees</button></a>
        </div>        
      </div>

      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>NIC Number</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Option</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['supporters'] as $supporter):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $supporter->id; ?></td>
              <td><?php echo $supporter->name; ?></td>
              <td><?php echo $supporter->nic; ?></td>
              <td><?php echo $supporter->phone; ?></td>
              <td><?php echo $supporter->email; ?></td>
              <td>
                <div class="options">
                  <form action="<?php echo URLROOT; ?>admins/activateSupporter/<?php echo $supporter->id?>" method ="post"><input class="edit-btn" type="submit" value="Working"></form>
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
