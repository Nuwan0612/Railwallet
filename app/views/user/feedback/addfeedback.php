<?php require APPROOT . '/views/user/includes/header.php';?>

<div class="content">

  <div class="wrapper">
    <h3 class='rate-us'>Rate US</h3>
    <form action="<?php echo URLROOT; ?>passengers/addFeedback" method ="POST">
      <div class="rating">
        <input type="number" name="rating" hidden value="<?php echo $data['rating']?>">
        <i class='bx bx-star star' style="--i: 0;"></i>
        <i class='bx bx-star star' style="--i: 1;"></i>
        <i class='bx bx-star star' style="--i: 2;"></i>
        <i class='bx bx-star star' style="--i: 3;"></i>
        <i class='bx bx-star star' style="--i: 4;"></i>
      </div>
      
      <div class ="tbox <?php echo !empty($data['feedback_err']) ? 'error' : ''; ?>">
        <textarea name="feedback" id="" cols="70" rows="10" placeholder="Share your experience with us"><?php echo $data['feedback'];?></textarea>
        <div class="error-message"><?php echo $data['feedback_err'];?></div>
      </div>
        
    
      <div class="btn-group">
        <button type="submit" class="btn submit">Submit</button>
        <button type="button" onclick="window.location.href='<?php echo URLROOT;?>passengers/Feedbacks'" class="btn cancel">Cancel</button>
      </div>
    </form>
  </div>
              
</div>

<script src="<?php echo URLROOT; ?>/js/user/feedback/rating.js"></script>

<?php require APPROOT . '/views/user/includes/footer.php';?>   