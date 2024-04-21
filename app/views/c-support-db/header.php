<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/c-support/customer-support.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>

<div class="side-menu">
        <div class="brand-name">
            <h3><?php echo SITENAME; ?></h3>
        </div>
        <ul>
            <a href="<?php echo URLROOT?>supporters/dashboard"><li><img src="<?php echo URLROOT;?>public/pics/db.png" >&nbsp;<span>Dashboard</span></li></a>
            <a href="<?php echo URLROOT?>supporters/users"><li><img src="<?php echo URLROOT;?>public/pics/man.png">&nbsp;<span>Users</span></li></a>
            <!-- <a href="checker.html"><li><img src="<?php echo URLROOT;?>public/pics/qr-code.png" >&nbsp;<span>Checkers</span></li></a> -->
            <a href="<?php echo URLROOT?>supporters/feedbacks"><li><img src="<?php echo URLROOT;?>public/pics/feedback.png" >&nbsp;<span>FeedBacks</span></li></a>
            <a href="<?php echo URLROOT?>supporters/shedules"><li><img src="<?php echo URLROOT;?>public/pics/september.png" >&nbsp;<span>Shedule</span></li></a>
            <!--<a href="#"> <li><img src="help-web-button.png" alt="">&nbsp; <span>Help</span></li> -->
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/settings.png" >&nbsp;<span>Settings</span></li></a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">

                <a href="#"><h3> Complaints</h3></a>
                <a href="#"><h3> Booking Reqs</h3></a>
                <a href="#"><h3> Live Chat</h3></a>
                <a href="<?php echo URLROOT;?>users/logout"><h3> Log Out</h3></a>
                <!-- <a href="#"><h3> Fine Details</h3></a> -->
                <div class="user">
                    
                    <img src="<?php echo URLROOT;?>public/pics/notification.png" alt="">
                    <div class="img-case">
                    <p>Welcome <?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname'] ?></p>
                    <img src="<?php echo URLROOT;?>public/pics/userPics/<?php echo $_SESSION['user_image'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>