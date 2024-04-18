<?php require APPROOT . '/views/checker/includes/header.php';?>

<div class="deatails">
    <div class="fine-container">
      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" class="border-search" id="search-users" placeholder="Enter User ID">
            <button class="search-button">
            <!-- <button class="search-button" onclick="searchUser()"> -->
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
                <th>Fine ID</th>
                <th>Passenger ID</th>
                <th>Journey ID</th>
                <th>Reason</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Payment Status</th> 
                <th>Payment Date</th> 
              </tr>
            </thead>
            
            <!-- <tbody>
            <?php $rowNumber = 1; foreach($data['users'] as $user):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $user->name; ?></td>
              <td><?php echo $user->nic; ?></td>
              <td><?php echo $user->phone; ?></td>
              <td><?php echo $user->status; ?></td>
              <td class="options">
                <a href="<?php echo URLROOT; ?>admins/getuserfeedback/<?php echo $user->id?>"><button class="edit-btn">View</button></a>
              </td>
              <td>
              <a href="<?php echo URLROOT; ?>admins/getuserFineDetails/<?php echo $user->id?>"><button class="edit-btn">View</button></a>
              </td>
              <td class="options">
                <a href="<?php echo URLROOT; ?>admins/getuserTravelDetails/<?php echo $user->id?>"><button class="edit-btn">View</button></a>
              </td>
              <td></td>
              <td>
                <div class="options">
                  <form action="<?php echo URLROOT; ?>users/deactiveUserStatus/<?php echo $user->id?>" method ="post"><input class="delete-btn" type="submit" value="Deactivate"></form>
                </div> 
              </td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody> -->
          </table>
        </div>
      </div>  
    </div>
  </div>

<?php require APPROOT . '/views/checker/includes/footer.php';?>