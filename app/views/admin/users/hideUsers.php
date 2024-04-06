<?php require APPROOT . '/views/admin/includes/header.php';?>

<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Deactivated Users</div>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" class="border-search" id="search-users" placeholder="Enter User NIC Number">
            <button class="search-button" onclick="searchUser()">
              <i class="fas fa-search"></i>
            </button> 
          </div>
        </div>

        
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/users"><button class="edit-btn">Actived Users</button></a>
        </div>
        
      </div>

      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>NIC</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Complains</th>
                <th>Travel History</th>
                <th>Option</th>  
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['users'] as $user):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $user->name; ?></td>
              <td><?php echo $user->nic; ?></td>
              <td><?php echo $user->phone; ?></td>
              <td><?php echo $user->status; ?></td>
              <td></td>
              <td></td>
              <td>
                <div class="options">
                  <form action="<?php echo URLROOT; ?>users/activeUserStatus/<?php echo $user->id?>" method ="post"><input class="edit-btn" type="submit" value="Activate"></form>
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