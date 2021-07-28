<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo SITE_NAME; ?></title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/cpanel/vendor/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/cpanel/css/adminlte.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.css" />
</head>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">
      <?php require APP_ROOT .'/views/inc/navbar.php'; ?>
      <?php require APP_ROOT .'/views/inc/leftsider.php'; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">