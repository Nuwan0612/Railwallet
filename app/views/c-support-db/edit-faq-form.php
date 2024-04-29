<?php require APPROOT . '/views/c-support-db/header.php';?>
<div class="content">
    <div class="faq-outer-container">
    <form action="<?php echo URLROOT?>supporters/editfaq/<?php echo $data['id'] ?>" method="POST">

        <div class="faq-question">
             <label for="question">Question:</label><br>
        </div>

        <!-- <div class="question-content">
            <textarea id="question" name="question" rows="4" cols="50"></textarea><br><br>
        </div> -->
        
        <div  class="tbox <?php echo !empty($data['question_err']) ? 'error' : ''; ?>" style="display: inline-block !important;">
            <textarea id="question" name="question" rows="4" cols="50"><?php echo $data['question']?></textarea><br><br>
        <div class="error-message"><?php if($data['question_err']) {echo $data['question_err']; }?></div>
        </div>

        <div class="faq-answer">
            <label for="answer">Answer:</label><br>
        </div> 

        <!-- <div class="answer-content">
            <textarea id="answer" name="answer" rows="4" cols="50"></textarea><br><br>
        </div> -->

        <div  class="tbox <?php echo !empty($data['answer_err']) ? 'error' : ''; ?>" style="display: inline-block !important;">
            <textarea id="answer" name="answer" rows="4" cols="50"><?php echo $data['answer']?></textarea><br><br>
        <div class="error-message"><?php echo $data['answer_err'];?></div>
        </div>
        
        
        <input type="submit" value="Submit">
    </form>
    </div>

</div>
<?php require APPROOT . '/views/c-support-db/footer.php';?>