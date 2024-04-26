<?php require APPROOT . '/views/c-support-db/header.php';?>

<div class="content">
    <div class="details">

      <div class="head">
        <div>FAQ Details</div> 
        <a href="<?php echo URLROOT?>supporters/addfaq"><button class="edit-btn">Add</button></a>
      </div>  

      <div class="detail-body" style="margin-top: 25px">
        <div class="table-container">
        <div class="tabledetails">
          <table>
            <thead>
              <tr>
                <th>Q_Id</th>
                <th>Question</th>
                <th>Answer</th> 
                <th>Options</th>
              </tr>
            </thead>
            
           
            <tbody>
              <?php foreach($data['faqDetails'] as $details):?>
              <tr>
                <td><?php echo $details->Q_ID; ?></td>
                <td style="text-align: start"><?php echo $details->Question; ?></td>
                <td style="text-align: start"><?php echo $details->Answer; ?></td>
                <td>
                    <div class="options">
                    <a href="<?php echo URLROOT?>supporters/editfaq/<?php echo $details->Q_ID; ?>"><button class="edit-btn">Edit</button></a>
                    <a href="<?php echo URLROOT?>supporters/deletefaq/<?php echo $details->Q_ID; ?>"><button class="delete-btn">Delete</button></a>
                    </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
        </div>
      </div>  
    </div>
</div>

<?php require APPROOT . '/views/c-support-db/footer.php';?>