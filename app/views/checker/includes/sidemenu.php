<div class="side-menu">
    <!-- <div class="brand-name">
        <h3>Checker-Keshali</h3>
    </div> -->
    <div class="brand-name">
        <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo">
        <p><?php echo SITENAME?></p>
    </div>

    <ul>
        <a href="<?php echo URLROOT; ?>/checkers/qrScan"><li><i class='bx bx-qr-scan' ></i><span>QR Scanner</span></li></a>
        <a href="<?php echo URLROOT; ?>/checkers/fine"><li><i class='bx bx-money' ></i><span>Fines</span></li></a>
        <!-- <a href="#"><li><img src="customer-service.png" alt="">&nbsp;<span>Checkers</span></li></a>
        <a href="#"><li><img src="feedback.png" alt="">&nbsp;<span>FeedBacks</span></li></a> -->
        <a href="<?php echo URLROOT; ?>/checkers/schedules"><li><i class='bx bxs-calendar' ></i><span>Shedule</span></li></a>
        <!-- <a href="<?php echo URLROOT; ?>/checkers/searchShedules"> <li><i class='bx bx-support' ></i><span>Customer Support</span></li> -->
        <!-- <a href="#"><li><i class='bx bxs-cog' ></i><span>Settings</span></li></a> -->
        <a href="<?php echo URLROOT; ?>/users/logout"><li><i class='bx bx-log-out-circle' ></i><span>LogOut</span></li></a>

    </ul>
</div>

<div class="container">
    <div class="header">
        <div class="nav">
            <!-- <a href="<?php echo URLROOT; ?>checkers/qrScan"><h3>QR Scanner</h3></a>
            <a href="#"><h3> Add Fines</h3></a>
            <a href="#"><h3> Issue Ticket</h3></a>
            <a href="#"><h3> Cancle Ticket</h3></a> -->
            <!-- <a href="#"><h3> Log Out</h3></a> -->
            <div class="user">
                
            <!-- <img src="<?php echo URLROOT;?>public/pics/notification.png" > -->
            
            <p>Welcome <?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname'] ?></p>
            <img src="<?php echo URLROOT;?>public/pics/userPics/<?php echo $_SESSION['user_image']?>" >
            <div class="img-case">
                <!-- <img src="<?php echo URLROOT;?>public/pics/man.png" > -->
                <i class='bx bxs-bell-ring' ></i>
            </div>
        </div>
    </div>
</div>