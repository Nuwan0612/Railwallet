<?php require APPROOT . '/views/user/includes/header.php';?>

<div class="feedback-content">
  <div class="testimonials">

    <div class="testimonials-heading">
      <h1>Feedbacks</h1>
      <a href="<?php echo URLROOT; ?>passengers/addFeedback"><button>Give Feedback</button></a>
    </div>

    <div class="testimonial-box-container">

      <?php foreach($data['feedback'] as $feedback):?>
        <div class="testimonial-box">
          <div class="box-top">
            <div class="profile">

              <div class="profile-img">
                <img src="<?php echo URLROOT?>/pics/man.png">
              </div>
              <div class="name-user">
                <strong><?php echo $feedback->name; ?></strong>
                <span><?php echo $feedback->email; ?></span>
              </div>

            </div>

            <div class="reviews">
              <?php       
                $filledStars = min(5, max(0, $feedback->rating));
                for ($i = 0; $i < $filledStars; $i++): 
              ?>
                <i class='bx bxs-star star'></i>
              <?php endfor; ?>

              <?php 
                for ($i = $filledStars; $i < 5; $i++): 
              ?>
                <i class='bx bx-star star'></i>
              <?php endfor; ?>
            </div>
          </div>

          <div class="client-comment">
            <p><?php echo $feedback->feedback; ?></p>
          </div>

          <div class="foot">
            <div><?php echo $feedback->date_time; ?></div>
          </div>
        </div>
        
      <?php endforeach; ?>

    </div>

  </div>
</div>
  

<?php require APPROOT . '/views/user/includes/footer.php';?>   