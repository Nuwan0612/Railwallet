<?php require APPROOT . '/views/c-support-db/header.php';?>


  <div class="content">
    <div class="details">

      <div class="head">
        <div>Train Schedules</div>
      </div>

      <div class="search-bar-outer-container-shedule">
        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input class="border-search" type="text" id="search-shedule-by-ID" placeholder="Shedule or Train ID" >
            <button class="search-button" onclick="searchSheduleByID()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <select class="result-box1" id="depStation">
            <option value="" selected disabled>Departure Station</option>
              <?php
              foreach ($data['stations'] as $station) {
                echo "<option value=\"$station->stationID\" $selected>$station->name</option>";
              }
            ?> 
          </select>
        </div>

        <div class="search-bar-inner-container-shedule">
          <select class="result-box1" id="arrStation">
            <option value="" selected disabled>Arrival Station</option>
              <?php
              foreach ($data['stations'] as $station) {
                echo "<option value='$station->stationID'>$station->name</option>";
              }
            ?> 
          </select>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
            <input class="border-search" type="text" id="search-date" placeholder="Date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <button class="search-button" onclick="searchSchedule()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>supporters/deactivatedShedules"><button class="delete-btn">Deactivated Shedules</button></a>
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
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['shedules'] as $shedule):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $shedule->sheduleID; ?></td>
              <td><?php echo $shedule->trainID; ?></td>
              <td><?php echo $shedule->depStation; ?></td>
              <td><?php echo $shedule->departureDate	; ?></td>
              <td><?php echo $shedule->departureTime; ?></td>
              <td><?php echo $shedule->arrStation; ?></td>
              <td><?php echo $shedule->arrivalDate; ?></td>
              <td><?php echo $shedule->arrivalTime; ?></td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>

<script>
  function searchSheduleByID(){
    let scheduleID = document.getElementById('search-shedule-by-ID').value
    if(!scheduleID){
      return;
    }
    window.location.href = `http://localhost/railwallet/supporters/getScheduleByID/${scheduleID}`;
  }

  function searchSchedule(){
    let depStation = document.getElementById('depStation').value
    let arrStation = document.getElementById('arrStation').value
    let date = document.getElementById('search-date').value
    if(!depStation || !arrStation || !date){
      return;
    }
    window.location.href = `http://localhost/railwallet/supporters/getSchedules?dep=${depStation}&arr=${arrStation}&date=${date}`;
  }
</script>

  <?php require APPROOT . '/views/c-support-db/footer.php';?>