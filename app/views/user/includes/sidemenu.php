<div class="side-menu">
        <div class="brand-name">
            <!-- <h3>User-K.V.Dias</h3> -->
            <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo">
            <p><?php echo SITENAME;?></p>
        </div>
        <ul>
            <!-- <a href="<?php echo URLROOT;?>passengers/dashboard"><li> <img src="<?php echo URLROOT;?>public/pics/db.png" alt="">&nbsp;<span>Dashboard</span></li></a>
            <a href="#"><li> <img src="<?php echo URLROOT;?>public/pics/wallet.png" alt="">&nbsp;<span>TopUp</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/seats.png" alt="">&nbsp;<span>Seat Reservation</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/ticket.png" alt="">&nbsp;<span>Ticket Prices</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/money-transfer.png" alt="">&nbsp;<span>Transaction History</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/shedule"><li><img src="<?php echo URLROOT;?>public/pics/september.png" alt="">&nbsp;<span>Shedule</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/Feedbacks"><li><img src="<?php echo URLROOT;?>public/pics/feedback.png" alt="">&nbsp;<span>Feedback</span></li></a>
            <a href="#"> <li><img src="help-web-button.png" alt="">&nbsp; <span>Help</span></li>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/customer-service.png" alt="">&nbsp;<span>Customer Support</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/settings"><li><img src="<?php echo URLROOT;?>public/pics/settings.png" alt="">&nbsp;<span>Settings</span></li></a> -->

            <a href="<?php echo URLROOT;?>passengers/wallet"><li><i class='bx bxs-wallet' ></i><span>Wallet</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/shedule"><li><i class='bx bxs-calendar'></i><span>Shedule</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/viewTicketsByUserId"><li><i class="fa-solid fa-list"></i><span>All Bookings</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/viewJourney"><li><i class='bx bx-search-alt'></i><span>Journey History</span></li></a>
<!--             <a href="#"><li><i class='bx bx-money-withdraw' ></i><span>Fines</span></li></a> -->
            <a href="<?php echo URLROOT;?>passengers/qrScan"><li><i class='bx bx-qr-scan' ></i><span>QR Scanner</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/ticket"><li><i class='bx bxs-file-find'></i><span>View QR</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/fineDetails"><li><i class='bx bx-money' ></i><span>Fines</span></li></a>

            <a href="<?php echo URLROOT;?>passengers/Feedbacks"><li><i class='bx bxs-like' ></i><span>Feedback</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/chat"><li><i class='bx bx-support' ></i><span>Customer Support</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/settings"><li><i class='bx bxs-cog'></i><span>Settings</span></li></a>
            <a href="<?php echo URLROOT;?>users/logout"><li><i class='bx bx-log-out-circle' ></i><span>Logout</span></li></a>
        </ul>
    </div>

    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="user">
                    <div class="img-case">
                        <img src="<?php echo URLROOT;?>public/pics/userPics/<?php echo $_SESSION['user_image']?>" alt="">
                    </div>
                    <div class="img-name"><p><?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname'] ?></p></div>
                </div>

                <div class="notify">
                    <i class="fa-solid fa-circle notifi" ></i>
                    <i class='fa-regular fa-bell bell'></i>
                </div>

            </div>
        </div>
