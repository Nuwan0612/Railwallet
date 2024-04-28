<?php require APPROOT . '/views/c-support-db/header.php';?>

<div class="content">
    <div class="details">

        <div class="head" style="margin-bottom: 30px">
            <div>Questions from Customers</div>
        </div>
        
        <div class="detail-body">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Questions</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php $rowNumber = 1; foreach($data['questions'] as $question):?>
                        <tr>
                            <td><?php echo $rowNumber; ?></td>
                            <td><?php echo $question->name ?></td>
                            <td><?php echo $question->email; ?></td>
                            <td><?php echo $question->message; ?></td>
                        </tr>
                        <?php $rowNumber++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>       
</div>

<?php require APPROOT . '/views/c-support-db/footer.php';?>