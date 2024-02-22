<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title2">Train Schedules</div>
        <!-- <a href="<?php echo URLROOT; ?>admins/addTrainShedule"><button class="add-train">Add Shedule</button></a> -->
      </div>

      <div class="search-bar-outer-container-shedule">

      <form class="wrapper_shedule" action="<?php echo URLROOT?>passengers/shedule" method="post">
      <div class="search-bar-inner-container-shedule1">      
          <div class="search-bar-shedule">
          <input type="text" id="search-departure-station"  placeholder="Departure Station">
            <button class="search-button" onclick="searchDepartureStation()">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <select class="result-box1" id="fromStation" name="fromStation">
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
          <div class="search-bar-shedule">
          <input type="text" id="search-arrival-station" placeholder="Arrival Station">
            <button class="search-button" onclick="#">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <select class="result-box2" id="toStation" name="toStation">
          <?php
              $a = $data['stations'];
              foreach ($a as $station) {
                echo "<option value=\"$station->stationID\">$station->name</option>";
             }
          ?>
        </select>
        </div>

        <div class="search-bar-inner-container-shedule3">
          <div class="search-bar-shedule">
          <input type="text" id="search-date" placeholder="Date" name="date" onfocus="(this.type = 'date')" onblur="(this.type='text')">
            <button class="search-button" onclick="#">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
 
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/deactivatedShedules"><button class="search-btn">Search</button></a>
        </div>        
      </div>
            </form>
     <div class="detail-body">
        <div class="card-box">
        <?php foreach ($data['filterd_station'] as $station): ?>
    <div class="card1">
        <div class="train_details">
            <h3><span class="train-name"><?=$station->arrivalStationID?></span></h3>
            <span class="train-type"><?= $station->arrivalStationID?></span> 
        </div>

        <div class="departure-status">
            <span class="departure-stat"><h3><?= $station->departureStationID?></h3></span>
            <span class="departure-time"><?= $station->departureTime?></span>
        </div>

        <div class="arrival-status">
            <span class="arrival-stat"><h3><?= $station->arrivalStationID ?></h3></span>
            <span class="arrival-time"><?= $station->arrivalTime?></span>
        </div>

        <div class="first-class">
            <span class="first-class-topic"><h3>1st Class</h3></span>
            <span class="first-class-price"><?= $station->arrivalStationID?></span>
        </div>

        <div class="second-class">
            <span class="second-class-topic"><h3>2nd Class</h3></span>
            <span class="second-class-price"><?= $station->arrivalStationID ?></span>
        </div>

        <div class="third-class">
            <span class="third-class-topic"><h3>3rd Class</h3></span>
            <span class="third-class-price"><?= $station->arrivalStationID ?></span>
        </div>

        <div class="book-button">
            <button class="book-now-button" onclick="#">Book Now</button>
        </div>
    </div>
<?php endforeach; ?>

        </div>
      </div>  
    </div>
  </div>
  <script>
    let availableKeywords =[
];

const resultsBox= document.querySelector('.result-box1');
const inputBox=document.getElementById("search-departure-station");

inputBox.onkeyup=function () {
    let result=[];
    let input=inputBox.value;
    if(input.length){
        result=availableKeywords.filter((keyword)=>{
           return keyword.toLowerCase().includes(input.toLowerCase())
        });
        console.log(result);
    }
    display1(result);
    if(!result.length){
        // resultsBox.innerHTML='No Suggestion'
        resultsBox.innerHTML='';
    }
}

function display1(result){
    const content=result.map((list)=>{
        return "<li onclick=selectInput(this)>" + list + "</li>";
    });

    resultsBox.innerHTML="<ul>"+content.join('')+"</ul>";
}

function selectInput(list){
    inputBox.value=list.innerHTML;
    resultsBox.innerHTML='';
}

//## Arrival Station Searching ##//

const resultsBox2=document.querySelector('.result-box2');
const inputBox2=document.getElementById("search-arrival-station");

inputBox2.onkeyup=function () {
    let result=[];
    let input=inputBox2.value;
    if(input.length){
        result=availableKeywords.filter((keyword)=>{
           return keyword.toLowerCase().includes(input.toLowerCase())
        });
        console.log(result);
    }
    display2(result);
    if(!result.length){
        // resultsBox.innerHTML='No Suggestion'
        resultsBox2.innerHTML='';
    }
}

function display2(result){
    const content=result.map((list)=>{
        return "<li onclick=selectInput2(this)>" + list + "</li>";
    });

    resultsBox2.innerHTML="<ul>"+content.join('')+"</ul>";
}

function selectInput2(list){
    inputBox2.value=list.innerHTML;
    resultsBox2.innerHTML='';
}

  </script>
    <?php require APPROOT . '/views/user/includes/footer.php';?>   