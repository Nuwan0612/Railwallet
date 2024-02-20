<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title2">Train Schedules</div>
        <!-- <a href="<?php echo URLROOT; ?>admins/addTrainShedule"><button class="add-train">Add Shedule</button></a> -->
      </div>

      <div class="search-bar-outer-container-shedule">

      <div class="wrapper_shedule">
      <div class="search-bar-inner-container-shedule1">      
          <div class="search-bar-shedule">
          <input type="text" id="search-departure-station" placeholder="Departure Station">
            <button class="search-button" onclick="searchDepartureStation()">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="result-box1">
            <!-- <ul>
                <li>Javascript</li>
                <li>Python</li>
            </ul> -->
          </div>

        </div>

        <div class="search-bar-inner-container-shedule2">
          <div class="search-bar-shedule">
          <input type="text" id="search-arrival-station" placeholder="Arrival Station">
            <button class="search-button" onclick="#">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="result-box2">
            <!-- <ul>
                <li>Javascript</li>
                <li>Python</li>
            </ul> -->
            </div>
        </div>

        <div class="search-bar-inner-container-shedule3">
          <div class="search-bar-shedule">
          <input type="text" id="search-date" placeholder="Date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <button class="search-button" onclick="#">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/deactivatedShedules"><button class="search-btn">Search</button></a>
        </div>        
      </div>
      </div>

      <div class="detail-body">
        <div class="card-box">
            <div class="card1">
                <div class="train_details">
                <h3><span class="train-name"> Gaalu Kumari</span></h3>
                    <span class="train-type">Express</span> 
                </div>

                <div class="departure-status">
                    <h4>Hikkaduwa</h4>
                </div>
            </div>
        </div>
      </div>  
    </div>
  </div>
    <?php require APPROOT . '/views/user/includes/footer.php';?>   