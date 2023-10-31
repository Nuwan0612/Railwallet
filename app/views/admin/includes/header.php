<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/styles.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/dashbord.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/trains/style.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/trains/addForm.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?php echo SITENAME; ?></title>

</head>
<body>
  
<?php require APPROOT . '/views/admin/includes/sidebar.php';?>
  <div class="container">
    <?php require APPROOT . '/views/admin/includes/navbar.php';?>
    <div class="content">