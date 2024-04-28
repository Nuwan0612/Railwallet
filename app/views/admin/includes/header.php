<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/main.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/dashbord.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/account.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/trains/style.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/trains/form.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/passenger/ratingView.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/maps/main.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/charts/main.css">


  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

      <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
  <title><?php echo SITENAME; ?></title>

</head>
<body>
  
<?php require APPROOT . '/views/admin/includes/sidebar.php';?>
  <div class="container">
    <?php require APPROOT . '/views/admin/includes/navbar.php';?>