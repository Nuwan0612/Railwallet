<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/user.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/rating.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/ratingView.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/travelHis.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-db/booking.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-db/shedule_list.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/shedule.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/account.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/search_shedule.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/booking.css">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/setting.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/ticket.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/fine-details.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/transaction-history.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/transaction.css"> -->

    <title><?php echo SITENAME; ?></title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Date', 'Topup', 'Expenses'],
                    ['January', 1000, 500]
                    ['February', 2000, 500],
                    ['March', 1000, 1000],
                    ['April', 4000, 2500]
                ]);

                var options = {
                    title: 'My Wallet',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
</head>
<body>


<?php require APPROOT . '/views/user/includes/sidemenu.php';?>

