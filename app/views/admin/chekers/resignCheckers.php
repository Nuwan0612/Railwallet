<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Resign Checkers</div>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" class="border-search" id="search-checker" placeholder="Enter Employee NIC">
              <button class="search-button" onclick="searchChecker()">
              <i class="fas fa-search"></i>
              </button> 
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/checkers"><button class="edit-btn">Working Checkers</button></a>
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
            <?php $rowNumber = 1; foreach($data['checkers'] as $checker):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $checker->id; ?></td>
              <td><?php echo $checker->fname.' '.$checker->lname; ?></td>
              <td><?php echo $checker->nic; ?></td>
              <td><?php echo $checker->phone; ?></td>
              <td><?php echo $checker->email; ?></td>
              <td>
              <div class="options">
                <form action="<?php echo URLROOT; ?>admins/activeCheckerStatus/<?php echo $checker->id?>" method ="post"><input class="edit-btn" type="submit" value="Working"></form>
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
