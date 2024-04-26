<?php require APPROOT . '/views/user/includes/header.php';?>

<div class="content">
  <div class="notification-outer-container">
    <div class="notification-header">
      <div class="notification-header-inner">
        Notifications
      </div>   
    </div>
    
      <div class="notification-body-outer">        
      </div>    
  </div>
  <div class="chat-outer-container">
    <div class="user-wrapper">
      <section class="chat-area">
        <header>
          <img src="<?php echo URLROOT; ?>img/customer-service.png" alt="">
          <div class="user-details sup-details">
            <span>Support Center</span>
          </div>
        </header>

        <div class="chat-box">
        </div>

        <div action="" class="typing-area">
          <input type="text" class="sender" value="<?php echo $_SESSION['user_id'] ?>" hidden>
          <input type="text" class="input-field" placeholder="Type a message here...">
          <button class="btn" onclick="sendMessageAgent()"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
      </section>
    </div>
  </div>
</div>

<script src="<?php echo URLROOT; ?>public/js/chat/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php require APPROOT . '/views/user/includes/footer.php';?>  