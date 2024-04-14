<div class="side-menu">
  <div class="railwallet">
    <h1 class="railwallet-title"><img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo" width="55" height="55">RailWallet</h1>
    
  </div>

  <ul>
    
    <a class="links" href="<?php echo URLROOT;?>admins/dashboard">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/dashboard.png" alt="">
        <span>Dashboard</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/users">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/user.png" alt="">
        <span>Users</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/shedules">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/calendar.png" alt="">
        <span>Shedules</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/stations">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/train-station.png" alt="">
        <span>Stations</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/trains">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/train.png" alt="">
        <span>Trains</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/tickets">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/tickets.png" alt="">
        <span>Ticket Prices</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/checkers">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/qr-code.png" alt="">
        <span>Checkers</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/supporters">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/customer-service.png" alt="">
        <span>Support</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/feedback">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/feedback.png" alt="">
        <span>Feedback</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>admins/profile">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/settings.png" alt="">
        <span>Settings</span>
      </li>
    </a>

    <a class="links" href="<?php echo URLROOT;?>users/logout">
      <li class="side-list">
        <img src="<?php echo URLROOT;?>/img/turn-off.png" alt="">
        <span>Logout</span>
      </li>
    </a>

    <script>
  document.querySelectorAll('.side-menu li').forEach(item => {
    item.addEventListener('click', () => {
      // Remove 'active' class from all list items
      document.querySelectorAll('.side-menu li').forEach(item => {
        item.classList.remove('active');
      });
      // Add 'active' class to the clicked list item
      item.classList.add('active');
    });
  });
</script>

  

    <!-- <a class="links" href="<?php echo URLROOT;?>admins/routes"><li><img src="<?php echo URLROOT;?>/img/routes.png" alt=""><span>Train Routes</span></li></a> -->
 
  </ul>
</div>
