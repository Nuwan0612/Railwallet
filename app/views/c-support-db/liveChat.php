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
          <div class="broom">
            <a href="<?php echo URLROOT; ?>supporters/clearChat"><i class="fa-solid fa-broom"></i></a>
          </div>
        </header>
        <div class="chat-box">
          
        </div>
        <div action="" class="typing-area">
          <input type="text" class="sender" value="<?php echo $_SESSION['user_id'] ?>" hidden>
          <input type="text" class="input-field" placeholder="Type a message here...">
          <button id="sendMessageToPassenger" onclick="replyToCustomer()"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
      </section>
    </div>
  </div>
</div>

<script src="<?php echo URLROOT; ?>public/js/chat/main.js"></script>

<?php require APPROOT . '/views/c-support-db/footer.php';?>