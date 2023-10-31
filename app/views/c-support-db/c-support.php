<?php require APPROOT . '/views/c-support-db/header.php';?>
<div class="side-menu">
        <div class="brand-name">
            <h3>C_Support-K.V.Dias</h3>
        </div>
        <ul>
            <a href="customer-support.html"><li><img src="<?php echo URLROOT;?>public/pics/db.png" >&nbsp;<span>Dashboard</span></li></a>
            <a href="user.html"><li><img src="<?php echo URLROOT;?>public/pics/man.png">&nbsp;<span>Users</span></li></a>
            <a href="checker.html"><li><img src="<?php echo URLROOT;?>public/pics/qr-code.png" >&nbsp;<span>Checkers</span></li></a>
            <a href="#"><li><img src="<?php echo URLROOT;?>public/pics/feedback.png" >&nbsp;<span>FeedBacks</span></li></a>
            <a href="shedule.html"><li><img src="<?php echo URLROOT;?>public/pics/september.png" >&nbsp;<span>Shedule</span></li></a>
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
                <a href="#"><h3> Log Out</h3></a>
                <!-- <a href="#"><h3> Fine Details</h3></a> -->
                <div class="user">
                    
                    <img src="<?php echo URLROOT;?>public/pics/man.png" alt="">
                    <div class="img-case">
                    <img src="<?php echo URLROOT;?>public/pics/man.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>25</h1>
                        <h3>Chats For Today</h3>
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/customer-service.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>4.2</h1>
                        <h3>Average Rating</h3>
                    </div>
                    <div class="icon-case">
                    <img src="<?php echo URLROOT;?>public/pics/feedback.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2023/08/29</h1>
                        <h3>Last Login</h3> 
                       
                    </div>
                    <div class="icon-case">
                        <img src="customer-service.png" alt="">
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
                        <h2>Seats Reservation</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Train_Id</th>
                            <th>Train Name</th>
                            <th>Booked Seats</th>
                            <th>Available Seats</th>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>25</td>
                            <td>15</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>25</td>
                            <td>15</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>25</td>
                            <td>15</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>25</td>
                            <td>15</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>25</td>
                            <td>15</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>2023/10/29</td>
                            <td>T01</td>
                            <td>Ruhunu Devi</td>
                            <td>25</td>
                            <td>15</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/c-support-db/footer.php';?>