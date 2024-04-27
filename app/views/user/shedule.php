<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="deatails">
    <div class="notification-outer-container">
        <div class="notification-header">
            <div class="notification-header-inner">
            Notifications
            </div>   
        </div>

        <div class="notification-body-outer">
        
        </div>
    </div>
    <div class="all-trains">
        <div class="head">
            <div class="title2">Train Schedules</div>
        </div>

        <div class="search-bar-outer-container-shedule">
            <form class="wrapper_shedule" action="<?php echo URLROOT?>passengers/searchSchedule" method="post">
                <div class="search-bar-inner-container-shedule1">
                
                <select class="result-box1" id="fromStation" name="fromStation">
                      <option value="" selected disabled>Departure Stations</option>
                      <?php
                      $a = $data['stations'];
                      foreach ($a as $station) {
                          $selected = ($station->stationID == $data['from']) ? 'selected' : '';
                          echo "<option value=\"$station->stationID\" $selected>$station->name</option>";
                      }
                      ?> 
                  </select>

                </div>

                <div class="search-bar-inner-container-shedule2">
                  <select class="result-box2" id="toStation" name="toStation">
                          <option value="" selected disabled>Arrival Stations</option>
                          <?php
                          $a = $data['stations'];
                          foreach ($a as $station) {
                              $selected = ($station->stationID == $data['to']) ? 'selected' : '';
                              echo "<option value=\"$station->stationID\" $selected>$station->name</option>";
                          }
                          ?> 
                  </select>

                </div>

                <div class="search-bar-inner-container-shedule3">
                    <div class="search-bar-shedule">
                        <input type="text" id="search-date" placeholder="Date" name="date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
                    </div>
                </div>

                <div class="hide-outer-container">
                    <button type="submit" class="search-btn">Search</button>
                </div>        
            </form>
        </div>

        <div class="detail-body">
            <div class="card-box"> 
                    <?php foreach ($data['schedules'] as $schedule): ?>
                        <form class="cards" action="<?php echo URLROOT?>passengers/getTrainDetails" method="POST">
                        <div class="card1">
                         <!-- input type eka hidden kerl apit yawanna oon id eka yawenawa -->
                         <input type="hidden" name="schedule_id" value="<?= $schedule->sheduleID ?>">
                         <input type="hidden" name="train_name" value="<?= $schedule->train_name ?>">
                         <input type="hidden" name="train_type" value="<?= $schedule->train_type ?>">
                         <input type="hidden" name="way" value="<?= $schedule->way ?>">
                         <input type="hidden" name="dDate" value="<?= $schedule->departureDate ?>">
                         <input type="hidden" name="tId" value="<?= $schedule->trainID ?>">
                         <input type="hidden" name="departure_station" value="<?= $schedule->departure_station_name ?>">
                         <input type="hidden" name="arrival_station" value="<?= $schedule->arrival_station_name ?>">
                    
                         
                         <div class="train_details">
                            <h3><span class="train-name"><b><?=$schedule->train_name?></b></span></h3>
                            <span class="train-type"><?= $schedule->train_type?></span> 
                        </div>

                        <div class="departure-status">
                            <span class="departure-stat"><h3><?= $schedule->departure_station_name?></h3></span>
                            <span class="departure-time"><?= $schedule->departureTime?></span>
                        </div>

                        <div class="arrival-status">
                            <span class="arrival-stat"><h3><?= $schedule->arrival_station_name ?></h3></span>
                            <span class="arrival-time"><?= $schedule->arrivalTime?></span>
                        </div>

                        <div class="first-class">
                            <span class="first-class-topic"><h3>1st Class</h3></span>
                            <span class="first-class-price"><?= $schedule->first_class_price?></span>
                        </div>

                        <div class="second-class">
                            <span class="second-class-topic"><h3>2nd Class</h3></span>
                            <span class="second-class-price"><?= $schedule->second_class_price ?></span>
                        </div>

                        <div class="third-class">
                            <span class="third-class-topic"><h3>3rd Class</h3></span>
                            <span class="third-class-price"><?= $schedule->third_class_price ?></span>
                        </div>
                        <div class="book-button">
                        <button class="book-now-button" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>  
    </div>
</div>
<?php require APPROOT . '/views/user/includes/footer.php';?>   