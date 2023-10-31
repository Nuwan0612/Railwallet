<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Customer Support</div>
        <a href="<?php echo URLROOT; ?>admins/registerSupporter"><button class="add-train">Register</button></a>
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <button class="search-button">
          <i class="fas fa-search"></i>
        </button>
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
              <td>
                <div class="options">
                  <a href="<?php echo URLROOT; ?>admins/editTrain/<?php echo $supporter->id; ?>"><button class="edit-btn">Edit</button></a>

                  <form action="<?php echo URLROOT; ?>admins/deleteSupporter/<?php echo $supporter->id?>" method ="post"><input class="delete-btn" type="submit" value="Delete"></form>
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
