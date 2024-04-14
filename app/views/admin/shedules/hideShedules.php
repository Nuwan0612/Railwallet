<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Deactivated Schedules</div>
        <a href="<?php echo URLROOT; ?>admins/addTrainShedule"><button class="add-train">Add Schedule</button></a>
      </div>

      <div class="search-bar-outer-container-shedule">
        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input type="text" class="border-search" id="search-shedule-by-ID" placeholder="Shedule or Train ID" >
            <button class="search-button" onclick="searchSheduleByID()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input type="text" id="search-departure-station" placeholder="Departure Station" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <button class="search-button" onclick="searchDepartureStation()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input type="text" id="search-arrival-station" placeholder="Arrival Station" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <button class="search-button" onclick="searchArrivalStation()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="search-bar-inner-container-shedule">
          <div class="search-bar-shedule">
          <input type="text" id="search-date" placeholder="Date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <button class="search-button" onclick="searchDepartureStation()">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/shedules"><button class="edit-btn">Activated Shedules</button></a>
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
                <th>Option</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['shedules'] as $shedule):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $shedule->sheduleID; ?></td>
              <td><?php echo $shedule->trainID; ?></td>
              <td><?php echo $shedule->departureStationID; ?></td>
              <td><?php echo $shedule->departureDate	; ?></td>
              <td><?php echo $shedule->departureTime; ?></td>
              <td><?php echo $shedule->arrivalStationID; ?></td>
              <td><?php echo $shedule->arrivalDate; ?></td>
              <td><?php echo $shedule->arrivalTime; ?></td>
              <td>
                <div class="options">
                  <form action="<?php echo URLROOT; ?>admins/activateShedule/<?php echo $shedule->sheduleID?>" method ="post"><input class="edit-btn" type="submit" value="Activate"></form>
                </div> 
              </td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>
