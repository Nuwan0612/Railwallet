<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/user.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/rating.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/ratingView.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-db/booking.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-db/shedule_list.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/shedule.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/search_shedule.css">

    <title><?php echo SITENAME; ?></title>
</head>
<body>

<div class="side-menu">
        <div class="brand-name">
            <h3>User-K.V.Dias</h3>
        </div>
        <ul>
            <a href="<?php echo URLROOT;?>passengers/dashboard"><li> <img src="<?php echo URLROOT;?>public/pics/db.png" alt="">&nbsp;<span>Dashboard</span></li></a>
            <a href="#"><li> <img src="<?php echo URLROOT;?>public/pics/wallet.png" alt="">&nbsp;<span>TopUp</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/seats.png" alt="">&nbsp;<span>Seat Reservation</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/ticket.png" alt="">&nbsp;<span>Ticket Prices</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/money-transfer.png" alt="">&nbsp;<span>Transaction History</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/shedule"><li><img src="<?php echo URLROOT;?>public/pics/september.png" alt="">&nbsp;<span>Shedule</span></li></a>
            <a href="<?php echo URLROOT;?>passengers/Feedbacks"><li><img src="<?php echo URLROOT;?>public/pics/feedback.png" alt="">&nbsp;<span>Feedback</span></li></a>
            <!--<a href="#"> <li><img src="help-web-button.png" alt="">&nbsp; <span>Help</span></li> -->
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/customer-service.png" alt="">&nbsp;<span>Customer Support</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/settings.png" alt="">&nbsp;<span>Settings</span></li></a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">

                <a href="#"><h3> QR Scanner</h3></a>
                <a href="#"><h3> View Ticket</h3></a>
                <!-- <a href="#"><h3> Shedule</h3></a> -->
                <a href="#"><h3>Fines Details </h3></a>
                <a href="<?php echo URLROOT;?>users/logout"><h3> Log Out</h3></a>

                <!-- <a href="#"><h3> Fine Details</h3></a> -->
                <div class="user">
                    
                <img src="<?php echo URLROOT;?>public/pics/notification.png" alt="">
                    <div class="img-case">
                        <img src="<?php echo URLROOT;?>public/pics/man.png" alt="">
                    </div>
                </div>
            </div>
        </div>