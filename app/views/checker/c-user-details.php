<?php require APPROOT . '/views/checker/header.php';?>
<div class="side-menu">
        <div class="brand-name">
            <h3>Checker-K.V.Dias</h3>
        </div>
        <ul>
        <a href="checker.html"><li><img src="<?php echo URLROOT;?>public/pics/db.png" >&nbsp;<span>Dashboard</span></li></a>
            <a href="user-details.html"><li><img src="<?php echo URLROOT;?>public/pics/man.png">&nbsp;<span>Users</span></li></a>
            <!-- <a href="#"><li><img src="customer-service.png" alt="">&nbsp;<span>Checkers</span></li></a>
            <a href="#"><li><img src="feedback.png" alt="">&nbsp;<span>FeedBacks</span></li></a> -->
            <a href="shedule.html"><li><img src="<?php echo URLROOT;?>public/pics/september.png" >&nbsp;<span>Shedule</span></li></a>
            <a href="#"> <li><img src="<?php echo URLROOT;?>public/pics/customer-service.png" >&nbsp; <span>Customer Support</span></li>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/settings.png" >&nbsp;<span>Settings</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/shutdown.png" >&nbsp;<span>LogOut</span></li></a>

        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">

                <a href="#"><h3> ValidateTicket</h3></a>
                <a href="#"><h3> Add Fines</h3></a>
                <a href="#"><h3> Issue Ticket</h3></a>
                <a href="#"><h3> Cancle Ticket</h3></a>
                <!-- <a href="#"><h3> Log Out</h3></a> -->
                <div class="user">
                    
                <img src="<?php echo URLROOT;?>public/pics/notification.png" >
                    <div class="img-case">
                    <img src="<?php echo URLROOT;?>public/pics/man.png" >
                    </div>
                </div>
            </div>
        </div>
        <div class="content">

            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>User Details</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <table>
                        <tr>
                            <th>User_ID</th>
                            <th>Name</th>
                            <th>NIC</th>
                            <th>Wallet Balance</th>
                            
                        </tr>
                        <tr>
                            <td>C001</td>
                            <td>Viranga Dias</td>
                            <td>200012300838</td>
                            <td>4500</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        </tr>
                        <tr>
                            <td>C001</td>
                            <td>Viranga Dias</td>
                            <td>200012300838</td>
                            <td>4500</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        <tr>
                            <td>C001</td>
                            <td>Viranga Dias</td>
                            <td>200012300838</td>
                            <td>4500</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        </tr>
                        <tr>
                            <td>C001</td>
                            <td>Viranga Dias</td>
                            <td>200012300838</td>
                            <td>4500</td>
                            <td><a href="#" class="btn">View</a></td>
                           
                        </tr>
                        <tr>
                            <td>C001</td>
                            <td>Viranga Dias</td>
                            <td>200012300838</td>
                            <td>4500</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        </tr>
                        <tr>
                            <td>C001</td>
                            <td>Viranga Dias</td>
                            <td>200012300838</td>
                            <td>4500</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/checker/footer.php';?>