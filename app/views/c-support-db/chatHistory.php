<?php require APPROOT . '/views/c-support-db/header.php';?>

<div class="content">
  <div class="chat-outer-container">
    <div class="wrapper">
      <section class="chat-area">
        <header>
          <img src="<?php echo URLROOT; ?>pics/userPics/man.png" alt="">
          <div class="sup-details">
            <span>Passenger</span>
          </div>
        </header>
        <div class="chat-box chat-history-box">
          <?php foreach($data['messages'] as $msg):?>
            <?php if($msg->sender_id == $data['sender_id']){
              echo "
              <div class='chat outgoing'>
                <div class='user-details sup-details'>
                  <p>$msg->msg</p>
                </div>
              </div>";
            } else {
              echo "
            '<div class='chat incoming'>
              <img src='http://localhost/railwallet/pics/userPics/man.png'>
              <div class='user-details sup-details'>
                <p>$msg->msg</p>
              </div>
            </div>";
            } ?>
              
          <?php endforeach; ?>
        </div>
      </section>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/c-support-db/footer.php';?>