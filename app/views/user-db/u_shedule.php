<?php require APPROOT . '/views/user-db/header.php';?>
<div class="side-menu">
        <div class="brand-name">
            <h3>User-K.V.Dias</h3>
        </div>
        <ul>
            <a href="user.html"><li> <img src="<?php echo URLROOT;?>public/pics/wallet.png" alt="">&nbsp;<span>TopUp</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/seats.png" alt="">&nbsp;<span>Seat Reservation</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/ticket.png" alt="">&nbsp;<span>Ticket Prices</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/money-transfer.png" alt="">&nbsp;<span>Transaction History</span></li></a>
            <a href="u_schedule.html"><li><img src="<?php echo URLROOT;?>public/pics/september.png" alt="">&nbsp;<span>Shedule</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/feedback.png" alt="">&nbsp;<span>Feedback</span></li></a>
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
                <a href="#"><h3>Fine Details </h3></a>
                <a href="#"><h3> Log Out</h3></a>

                <!-- <a href="#"><h3> Fine Details</h3></a> -->
                <div class="user">
                    
                <img src="<?php echo URLROOT;?>public/pics/notification.png" alt="">
                    <div class="img-case">
                        <img src="man.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2194</h1>
                        <h3>Uers</h3>
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/man.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>53</h1>
                        <h3>Checkers</h3>
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/qr-code.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2023/08/29</h1>
                        <h3>Last Login</h3> 
                       
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/customer-service.png" alt="">
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="box">
                        <h1>350000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div> -->
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Train Shedule</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Journy_Id</th>
                            <th>Train_Id</th>
                            <th>Train Name</th>
                            <th>Departure </th>
                            <th>Arrival </th>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>J01</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>Pettah</td>
                            <td>Hikkaduwa</td>
                            <td><a href="#" class="btn">View</a></td>
                           
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>J01</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>Pettah</td>
                            <td>Hikkaduwa</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>J01</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>Pettah</td>
                            <td>Hikkaduwa</td>
                            <td><a href="#" class="btn">View</a></td>
                           
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>J01</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>Pettah</td>
                            <td>Hikkaduwa</td>
                            <td><a href="#" class="btn">View</a></td>
                            
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>J01</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>Pettah</td>
                            <td>Hikkaduwa</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>J01</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>Pettah</td>
                            <td>Hikkaduwa</td>
                            <td><a href="#" class="btn">View</a></td>
                           
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/user-db/footer.php';?>   