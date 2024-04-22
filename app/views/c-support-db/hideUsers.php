<?php require APPROOT . '/views/c-support-db/header.php';?>

<div class="content">
    <div class="details">

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
        <a class="links" href="<?php echo URLROOT;?>supporters/users"><button class="edit-btn">Actived Users</button></a>
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
                <th>Feedbacks</th>
                <th>Fines</th>
                <th>Complains</th>
                <th>Travel History</th>
                <th>Option</th>  
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['users'] as $user):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $user->fname.' '.$user->lname; ?></td>
              <td><?php echo $user->nic; ?></td>
              <td><?php echo $user->phone; ?></td>
              <td><?php echo $user->status; ?></td>
              <td class="options">
                <a href="<?php echo URLROOT; ?>admins/getuserfeedback/<?php echo $user->id?>"><button class="edit-btn">View</button></a>
              </td>
              <td>
              <a href="<?php echo URLROOT; ?>admins/getuserFineDetails/<?php echo $user->id?>"><button class="edit-btn">View</button></a>
              </td>
              <td></td>
              <td class="options">
              <a href="<?php echo URLROOT; ?>admins/getuserTravelDetails/<?php echo $user->id?>"><button class="edit-btn">View</button></a>
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

  <script>
    function searchUser(){
        let nic = document.getElementById('search-users').value;
        if(!nic){
            return;
        }
        window.location.href = `http://localhost/railwallet/supporters/searchUser/${nic}`;
    }   
</script>
  
  <?php require APPROOT . '/views/c-support-db/footer.php';?>