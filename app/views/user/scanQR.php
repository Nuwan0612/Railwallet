<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/user.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/qrScanner.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/drop.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <title><?php echo SITENAME; ?></title>
</head>
<body>

<?php require APPROOT . '/views/user/includes/sidemenu.php';?>

  <div class="qr-content">
    <div class="qr-scanner-details">
      <div class="qr-scanner-outer-container">
        <div class="qr-inner-container">

          <div class="section">
            <div id="my-qr-reader">
            </div>
          </div>

            <div class="selector-outer-container">
              <div class="wrapper">
                <div class="select-btn">
                  <span>Departuer Station</span>
                  <i class="fa-solid fa-angle-down"></i>
                </div>
                <div class="content-qrScan">
                  <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search" class="search-input"> 
                  </div>
                  <ul class="options">
                    <?php foreach($data['stations'] as $station):?>
                      <li onclick="updateName(this, 'Departure', <?php echo $station->stationID?>)"><?php echo $station->name ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div> 
              </div>
          
              <div class="wrapper">
                <div class="select-btn">
                  <span>Arrival Station</span>
                  <i class="fa-solid fa-angle-down"></i>
                </div>
                <div class="content-qrScan">
                  <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search"> 
                  </div>
                  <ul class="options">
                    <?php foreach($data['stations'] as $station):?>
                      <li onclick="updateName(this, 'arrival', <?php echo $station->stationID?>)"><?php echo $station->name ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div> 
              </div>
          
              <div class="wrapper">
                <div class="select-btn">
                  <span>Train Class</span>
                  <i class="fa-solid fa-angle-down"></i>
                </div>
                <div class="content-qrScan">
                  <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search"> 
                  </div>
                  <ul class="options">
                    <?php foreach($data['classes'] as $class):?>
                      <li onclick="updateName(this, 'trainClass', <?php echo $class->classID?>)"><?php echo $class->className; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div> 
              </div>
            </div>

            <div id="map"></div>
            <div class="warning"></div>

            <div class="option-buttons">
              <button id="start-journey-btn" onclick="startJourney()">Start Journey</button>
              <button id="end-journey-btn" onclick="endJourney()">End Journey</button>
            </div>	
                  
        </div>
      </div>
    </div>
    
  </div> 
  
  <script src="https://unpkg.com/html5-qrcode"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="<?php echo URLROOT?>/js/qrScan/script.js"></script>
  <!-- <script src="<?php echo URLROOT?>/js/qrScan/scanWithMap.js"></script> -->

  <script>
    let fine = <?php echo json_encode($data['fines'])?>;
    if(fine){
      alert('There is a fine associated with this account that requires your attention and completion.')
      window.location.href = `<?php echo URLROOT?>passengers/fines`;
    } 
  </script>
    
<?php require APPROOT . '/views/user/includes/footer.php';?>   