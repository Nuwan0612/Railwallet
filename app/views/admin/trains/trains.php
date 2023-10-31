<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">All Trains</div>
        <a href="<?php echo URLROOT; ?>admins/addTrain"><button class="add-train">Add Train</button></a>
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
                <th>Train Name</th>
                <th>Train Type</th>
                <th>First Class Seat</th>
                <th>Second Class Seat</th>
                <th>Third Class Seat</th>
                <th>Option</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['trains'] as $train):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $train->name; ?></td>
              <td><?php echo $train->type; ?></td>
              <td><?php echo $train->firstCapacity; ?></td>
              <td><?php echo $train->secondCapacity; ?></td>
              <td><?php echo $train->thirdCapacity; ?></td>
              <td>
                <div class="options">
                  <a href="<?php echo URLROOT; ?>admins/editTrain/<?php echo $train->id; ?>"><button class="edit-btn">Edit</button></a>

                  <form action="<?php echo URLROOT; ?>admins/deleteTrain/<?php echo $train->id?>" method ="post"><input class="delete-btn" type="submit" value="Delete"></form>
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
