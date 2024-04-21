<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Customer Support Operator</div>
        <a href="<?php echo URLROOT; ?>admins/registerSupporter"><button class="add-train">Register</button></a>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" class="border-search" id="search-supporter" placeholder="Enter Employee NIC">
            <button class="search-button" onclick="searchSupporter()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/resignedSupporters"><button class="delete-btn">Resigned Employees</button></a>
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
              <td><?php echo $supporter->fname.' '.$supporter->lname; ?></td>
              <td><?php echo $supporter->nic; ?></td>
              <td><?php echo $supporter->phone; ?></td>
              <td><?php echo $supporter->email; ?></td>
              <td>
                <div class="options">
                <a href="<?php echo URLROOT; ?>admins/editSupporter/<?php echo $supporter->id; ?>"><button class="edit-btn">Edit</button></a>
                  <form action="<?php echo URLROOT; ?>admins/deactivateSupporter/<?php echo $supporter->id?>" method ="post"><input class="delete-btn" type="submit" value="Resign"></form>
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
