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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctxL = document.getElementById('myChartLeft');
  const ctxR = document.getElementById('myChartRight');

  const monthNames = [
  'January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'
  ];

  

  
  new Chart(ctxL, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'Aprial', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Passengers',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      },
      {
        label: 'Supporters',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      },
      {
        label: 'Checkers',
        data: [12, 19, 3, 5, 2, 3],
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
        data: [12, 19, 3, 5, 2, 31, 45, 54, 98, 89, 12, 12],
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