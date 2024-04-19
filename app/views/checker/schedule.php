<?php require APPROOT . '/views/checker/includes/header.php';?>

  <div class="deatails">
    <div class="schedule-container">

      <div class="search-bar-outer-container-shedule">
        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input class="border-search" type="text" id="search-shedule-by-ID" placeholder="Shedule or Train ID" >
            <!-- <button class="search-button" onclick="searchSheduleByID()"> -->
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input class="border-search" type="text" id="search-departure-station" placeholder="Departure Station">
            <!-- <button class="search-button" onclick="searchDepartureStation()"> -->
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input class="border-search" type="text" id="search-arrival-station" placeholder="Arrival Station">
            <!-- <button class="search-button" onclick="searchDepartureStation()"> -->
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input class="border-search" type="text" id="search-date" placeholder="Date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <!-- <button class="search-button" onclick="searchDepartureStation()"> -->
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>


      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Shedule ID</th>
                <th>Train ID</th>
                <th>Departure Station</th>
                <th>Departure Date</th>
                <th>Departure Time</th>
                <th>Arrival Station</th>
                <th>Arrival Date</th>
                <th>Arrival Time</th>
                <th>Booked 1st Class</th>
                <th>Booked 2nd Class</th>
                <th>Booked 3rd Class</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['schedules'] as $schedule):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $schedule->sheduleID; ?></td>
              <td><?php echo $schedule->trainID; ?></td>
              <td><?php echo $schedule->departureStationID; ?></td>
              <td><?php echo $schedule->departureDate	; ?></td>
              <td><?php echo $schedule->departureTime; ?></td>
              <td><?php echo $schedule->arrivalStationID; ?></td>
              <td><?php echo $schedule->arrivalDate; ?></td>
              <td><?php echo $schedule->arrivalTime; ?></td>
              <td><?php echo $schedule->firstClassBooked; ?></td>
              <td><?php echo $schedule->secondClassBooked; ?></td>
              <td><?php echo $schedule->thirdClassBooked; ?></td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php require APPROOT . '/views/checker/includes/footer.php';?>
