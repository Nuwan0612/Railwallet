<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Checkers</div>
        <a href="<?php echo URLROOT; ?>admins/registerChecker"><button class="add-train">Register</button></a>
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
        <a class="links" href="<?php echo URLROOT;?>admins/resignCheckers"><button class="delete-btn">Resigned Checkers</button></a>
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
                <a href="<?php echo URLROOT; ?>admins/editChecker/<?php echo $checker->id; ?>"><button class="edit-btn">Edit</button></a>
                <form action="<?php echo URLROOT; ?>admins/deactiveCheckerStatus/<?php echo $checker->id?>" method ="post"><input class="delete-btn" type="submit" value="Resign"></form>
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
