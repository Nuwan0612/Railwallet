<?php require APPROOT . '/views/checker/header.php';?>
<div class="side-menu">
        <div class="brand-name">
            <h3>Checker-Keshali</h3>
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
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2194</h1>
                        <h3>Checked Users</h3>
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/man.png" >
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>LKR 4250</h1>
                        <h3>Last Week Total Fines</h3>
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/money-transfer.png" >
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2023/08/29</h1>
                        <h3>Last Login</h3> 
                       
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/customer-service.png" >
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

    <?php require APPROOT . '/views/checker/footer.php';?>