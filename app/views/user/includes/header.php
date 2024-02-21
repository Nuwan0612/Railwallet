<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/user.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/rating.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/ratingView.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-db/booking.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-db/shedule_list.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/shedule.css">

    <title><?php echo SITENAME; ?></title>
</head>
<body>

<div class="side-menu">
        <!-- <div class="logo-img"><img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo"></div> -->
        <div class="brand-name">
            <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo">
            <p>RailWallet</p>
        </div>
        <ul>
            <!-- <a href="<?php echo URLROOT;?>passengers/dashboard"><li> <img src="<?php echo URLROOT;?>public/pics/db.png" alt="">&nbsp;<span>Dashboard</span></li></a> -->
            <a href="<?php echo URLROOT;?>passengers/dashboard"><li><i class='bx bxs-wallet' ></i><span>Wallet</span></li></a>
            <!-- <a href="#"><li> <img src="<?php echo URLROOT;?>public/pics/wallet.png" alt="">&nbsp;<span>TopUp</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/seats.png" alt="">&nbsp;<span>Seat Reservation</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/ticket.png" alt="">&nbsp;<span>Ticket Prices</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/money-transfer.png" alt="">&nbsp;<span>Transaction History</span></li></a> -->
            <a href="<?php echo URLROOT;?>passengers/shedule"><li><i class='bx bxs-calendar'></i><span>Shedule</span></li></a>
            <a href="#"><li><i class='bx bx-qr-scan' ></i><span>QR Scanner</span></li></a>
            <a href="#"><li><i class='bx bx-search-alt'></i><span>View Ticket</span></li></a>
            <a href="#"><li><i class='bx bx-money-withdraw' ></i><span>Fines</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/Feedbacks"><li><i class='bx bxs-like' ></i><span>Feedback</span></li></a>
            <!--<a href="#"> <li><img src="help-web-button.png" alt="">&nbsp; <span>Help</span></li> -->
            <a href="#"><li><i class='bx bx-support' ></i><span>Customer Support</span></li></a>
            <a href="#"><li><i class='bx bxs-cog'></i><span>Settings</span></li></a>
            <a href="<?php echo URLROOT;?>users/logout"><li><i class='bx bx-log-out'></i><span>Logout</span></li></a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">

                <!-- <a href="#"><h3> QR Scanner</h3></a>
                <a href="#"><h3> View Ticket</h3></a> -->
                <!-- <a href="#"><h3> Shedule</h3></a> -->
                <!-- <a href="#"><h3>Fines Details </h3></a>
                <a href="<?php echo URLROOT;?>users/logout"><h3> Log Out</h3></a> -->

                <!-- <a href="#"><h3> Fine Details</h3></a> -->
                <div class="user">
                <!-- <img src="<?php echo URLROOT;?>public/pics/notification.png" alt=""> -->
                    <div class="notify"><i class='bx bxs-bell-ring'></i></div>
                    <div class="img-case">
                        <img src="<?php echo URLROOT;?>public/pics/man.png" alt="">
                    </div>
                    <div class="img-name"><p>Viranga Dias</p></div>
                </div>
            </div>
        </div>