<?php require APPROOT . '/views/Admin/includes/header.php';?>

  <div class="content">
    <div class="cards">

      <!-- <a class="db-link" href="<?php echo URLROOT;?>admins/users">
        <div class="card">
          <div class="box">
            <p><?php echo $data['users']?></p>
            <h3>Users</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/user.png" alt="">
          </div>
        </div>
      </a> -->

      <a href="<?php echo URLROOT;?>admins/trains" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['trains']?></p>
            <h3>Trains</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/train.png" alt="">
          </div>
        </div>
      </a>
      
      <!-- <a href="<?php echo URLROOT;?>admins/checkers" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['checkers']?></p>
            <h3>Checkers</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/qr-code.png" alt="">
          </div>
        </div>
      </a>
       -->

      <!-- <a href="<?php echo URLROOT;?>admins/supporters" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['supporters']?></p>
            <h3>Customer Suports</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/customer-service.png" alt="">
          </div>
        </div>
      </a>
       -->

      <a href="<?php echo URLROOT;?>admins/stations" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['stations']?></p>
            <h3>Stations</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/train-station.png" alt="">
          </div>
        </div>
      </a>
      


      <a href="<?php echo URLROOT;?>admins/feedback" class="db-link">
        <div class="card">
          <div class="box">
            <p><?php echo $data['feedbacks']?></p>
            <h3>Feedbacks</h3>
          </div>
          <div class="icon-case">
            <img src="<?php echo URLROOT?>/img/feedback.png" alt="">
          </div>
        </div> 
      </a>
      

       

    </div> 

    <div class="charts">
      <div class="chart-left">
        <h1>Registers Users</h1>
        <canvas id="myChartLeft"></canvas>
      </div>
      <div class="chart-right">
        <h1>Earnings</h1>
        <canvas id="myChartRight"></canvas>
      </div>
    </div>
  </div>

<?php 
  $nu_user = array_fill(0, 12, 0); 
  $nu_che = array_fill(0, 12, 0); 
  $nu_sup = array_fill(0, 12, 0); 
  $earning = array_fill(0, 12, 0);

  foreach($data['yearsMonth'] as $detail):
    $index = $detail->month_number - 1;
    $nu_user[$index] = $detail->num_users;
    $nu_che[$index] = $detail->num_checkers;
    $nu_sup[$index] = $detail->num_supporters;
  endforeach;

  foreach($data['earnings'] as $earnings){
    $index = $earnings->month - 1;
    $earning[$index] = $earnings->total;
  }

  $user = json_encode($nu_user);
  $checker = json_encode($nu_che);
  $supporter = json_encode($nu_sup);
  $supporter = json_encode($nu_sup);
  $earnings = json_encode($earning);
?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  let users = <?php echo $user; ?>;
  let checkers = <?php echo $checker; ?>;
  let supporters = <?php echo $supporter; ?>;
  let earnings = <?php echo $earnings?>

  const ctxL = document.getElementById('myChartLeft');
  const ctxR = document.getElementById('myChartRight');

  new Chart(ctxL, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'Aprial', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Passengers',
        data: users,
        borderWidth: 1
      },
      {
        label: 'Supporters',
        data: supporters,
        borderWidth: 1
      },
      {
        label: 'Checkers',
        data: checkers,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(ctxR, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'Aprial', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Total Earnings',
        data: earnings,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',   // August 
        ],
        borderColor: [
          'rgb(255, 99, 132)',    // August
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

</script>

<?php require APPROOT . '/views/Admin/includes/footer.php';?>