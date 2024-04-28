<?php require APPROOT . '/views/user/includes/header.php';?>

    <div class="container-main2">
        <div class="container4">
            <div class="card_box">
                <div class="card">
                    <div class="title">
                        <div class="train_name">
                            <u><b><?php echo $data['trainName'];?></b></u> 
                        </div>
                    </div>
                    
                    <div class="card_body">
                        <div class="card_text">
                            <div class="speed">
                                <?php echo $data['trainType'];?>
                            </div>
                            <div class="staion">
                                <div class="s_station">
                                    <b> <?php echo $data['departureStation'];?></b> 
                                </div>
                                <div class="e_station">
                                    <b> <?php echo $data['arrivalStation'];?></b> 
                                </div>
                            </div>
                            <div class="time">
                                <div class="s_time">
                                    <?php echo $data['dTime'];?>
                                </div>
                                <div class="e_time">
                                    <?php echo $data['aTime'];?>
                                </div>
                            </div>
                            <div class="stop_stations">
                                <a href="<?php echo URLROOT;?>passengers/shedule"><button>Search Shedules</button></a>
                            </div>
                        </div>
                        
                        <form class="bookingTickets" action="<?php echo URLROOT?>passengers/bookingTickets" method="POST">
                            <input type="text" name="sheduleId" hidden value="<?php echo $data['sheduleId']?>">
                            <input type="text" name="way" hidden value="<?php echo $data['way']?>">
                            <input type="text" name="tID" hidden value="<?php echo $data['tID']?>">
                            <input type="hidden" name="avlbleId"  value="<?php echo $data['avlbleId']?>">
                            <input type="hidden" name="fFree"  value="<?php echo $data['fFree']?>">
                            <input type="hidden" name="sFree"  value="<?php echo $data['sFree']?>">
                            <input type="hidden" name="tFree"  value="<?php echo $data['tFree']?>">
                            <input type="hidden" name="dDate"  value="<?php echo $data['dDate']?>">
                            <input type="hidden" name="dTime"  value="<?php echo $data['dTime']?>">
                            <input type="hidden" name="aTime"  value="<?php echo $data['aTime']?>">
                            <input type="hidden" name="trainName"  value="<?php echo $data['trainName']?>">
                            <input type="hidden" name="trainType"  value="<?php echo $data['trainType']?>">
                            <input type="hidden" name="departureStation"  value="<?php echo $data['departureStation']?>">
                            <input type="hidden" name="arrivalStation"  value="<?php echo $data['arrivalStation']?>">

                            <div class="tickets">
                                <div class="box-class">
                                    <div class="classes">
                                        <div class="text-box">
                                            <div class="f_text"> First Class:<br></div>
                                            <div class="s_text">Second Class:<br></div>
                                            <div class="t_text">Third Class:<br></div>
                                        </div>
                                        <div class="inputs">
                                            <div class="f_class">
                                                <input type="text" id="first" name="fClassCount" placeholder=" Available=<?php echo $data['fFree'];?>">
                                            </div>
                                            <div class="s_class">
                                                <input type="text" id="second" name="sClassCount" placeholder=" Available= <?php echo $data['sFree'];?>">
                                            </div>
                                            <div class="t_class">
                                                <input type="text" id="third" name="tClassCount" placeholder=" Available=<?php echo $data['tFree'];?>">
                                            </div>
                                        </div> 
                                        <input type="hidden" name="dDate" value="<?= $data['dDate'] ?>">
                                            
                                    </div>
                                    <div class="btn-main">
                                        <div class="btn5">
                                        <button type="submit">Book Now</button>   
                                        <span class="button-text"></span>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>        
        </div>
        
    </div>
    <div class="error" style="margin-top: 50px;display: flex; justify-content: center">
            <div class="error-warning" style="color: red; font-size: 30px"><?php echo $data['error_details']?></div>
        </div>

<?php require APPROOT . '/views/user/includes/footer.php';?>   
