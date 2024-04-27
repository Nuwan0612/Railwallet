<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/c-support/customer-support.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/c-support/users.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/c-support/feedbacks.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/c-support/chat.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/account.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/search_shedule.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/c-support/shedule-list.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/booking.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo SITENAME; ?></title>
</head>
<body>

<div class="side-menu">
    <div class="brand-name">
    <div class="logo">
        <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo" width="55" height="55">
    </div>
        <p><?php echo SITENAME; ?></p>
    </div>
    <ul>
        <!-- <a href="<?php echo URLROOT?>supporters/users"><li><img src="<?php echo URLROOT;?>img/dashboard.png" >&nbsp;<span>Dashboard</span></li></a> -->
        <a href="<?php echo URLROOT?>supporters/users"><li><img src="<?php echo URLROOT;?>img/user.png">&nbsp;<span>Users</span></li></a>
        <a href="<?php echo URLROOT?>supporters/feedbacks"><li><img src="<?php echo URLROOT;?>img/feedback.png" >&nbsp;<span>FeedBacks</span></li></a>
        <a href="<?php echo URLROOT?>supporters/faqs"><li><img src="<?php echo URLROOT;?>img/faq.png" >&nbsp;<span>FAQ</span></li></a>
        <a href="<?php echo URLROOT?>supporters/shedules"><li><img src="<?php echo URLROOT;?>img/calendar.png" >&nbsp;<span>Schedule</span></li></a>
        <a href="<?php echo URLROOT?>supporters/settings"><li><img src="<?php echo URLROOT;?>img/settings.png" >&nbsp;<span>Settings</span></li></a>
        <a href="<?php echo URLROOT?>users/logout"><li><img src="<?php echo URLROOT;?>img/turn-off.png" >&nbsp;<span>Logout</span></li></a>

        <a href="<?php echo URLROOT?>supporters/support">
            <li>
                <img src="<?php echo URLROOT;?>img/customer-service.png" >&nbsp;
                <span>Support</span>
                <i class="fa-solid fa-circle notification-support" id="active"></i>
            </li>
        </a>
    </ul>
</div>
    <div class="container">
        <div class="header">
            <div class="nav">
                
                <div class="user">
                    <p>Welcome <?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname']?></p>
                    <div class="img-case">
                        <img src="<?php echo URLROOT?>pics/userPics/<?php echo $_SESSION['user_image']; ?>">
                    </div>
                </div>
            </div>
        </div> 

        



    