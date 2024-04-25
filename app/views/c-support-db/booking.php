<?php require APPROOT . '/views/c-support-db/header.php';?>

<!-- <div class="container-main2"> -->
        <!-- <div class="container4"> -->
                <div class="card_box">
                    <div class="card">
                        <div class="title">
                            <div class="train_name">
                                <u><b><?php echo $data['trainName'];?></b></u> 
                            </div>
                            <!-- <div class="title_stations">
                                <div class="start_station"><b> Hikkaduwa</b></div>
                                <div class="join"><b>to</b></div>
                                <div class="end_station"><b>Pettah</b></div>
                            
                            </div> -->
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
                                <a href="<?php echo URLROOT;?>supporters/shedule"><button class="sSchedules"> Search Shedules</button></a>
                                </div>
                            </div>
                            
                            <form class="bookingTickets" action="<?php echo URLROOT?>supporters/bookingTickets" method="POST">
                            <input type="text" name="sheduleId" hidden value="<?php echo $data['shId']?>">
                            <input type="text" name="uId" hidden value="<?php echo $data['uId']?>">
                            <input type="text" name="way" hidden value="<?php echo $data['way']?>">
                            <input type="text" name="tID" hidden value="<?php echo $data['tID']?>">
                            <input type="hidden" name="avlbleId"  value="<?php echo $data['avlbleId']?>">
                            <input type="hidden" name="avlbleId"  value="<?php echo $data['avlbleId']?>">

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
                            </form>
                            </div>
                       </div>
                    </div>
            </div>        
    <!-- </div> -->
<!-- </div> -->

<?php require APPROOT . '/views/c-support-db/footer.php';?>