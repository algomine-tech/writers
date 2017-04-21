<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Writers</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  
  <link rel="apple-touch-icon" href="<?= base_url() ?>assets/theme/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/theme/images/favicon.ico" type="image/x-icon">

  <!-- bootstrap -->
  <link href="<?= base_url() ?>assets/plugins/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="<?= base_url() ?>assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- lightbox -->
  <link href="<?= base_url() ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">


  <!-- Themes styles-->
  <link href="<?= base_url() ?>assets/theme/css/theme.css" rel="stylesheet">  
  <!-- Your custom css -->
  <link href="<?= base_url() ?>assets/theme/css/theme-custom.css" rel="stylesheet">
  
</head>
<style type="text/css">
#myProgress {
    width: 100%;
    background-color: grey;
}
#myBar {
    width: 1%;
    height: 30px;
    background-color: green;
}
  .dataTables_filter {
   width: 100%;
   float: right;
   text-align: right;
}
.table-bordered,.table-bordered>tbody>tr>td,.table-bordered>thead>tr>th{
  border: 1px solid #3c8dbc;
}
.loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
}
.form-control{
  border: 1px solid #3c8dbc;
}
</style>
<body>
    <!-- wrapper page -->
    <div class="wrapper">
      <!-- main-header -->
      <header class="main-header">


        <!-- main navbar -->
        <nav class="navbar navbar-default main-navbar hidden-sm hidden-xs">
          <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <!-- Main logo-->
                 LOGO                  
              <ul class="nav navbar-nav navbar-right">
                <li class="link-btn"><a href="<?= site_url('auth/login'); ?>"><span class="btn btn-theme btn-pill btn-xs btn-line">Login</span></a></li>
                <li class="link-btn"><a href="<?= site_url('auth/create_user'); ?>"><span class="btn btn-theme  btn-pill btn-xs btn-line">Register</span></a></li>
              </ul>
            </div>
          </div>
        </nav><!-- end main navbar -->

        <!-- mobile navbar -->
        <div class="container">
          <nav class="mobile-nav hidden-md hidden-lg">
            <a href="#" class="btn-nav-toogle first">
              <span class="bars"></span>
              Menu
            </a>
          </nav>
        </div><!-- mobile navbar -->

      </header><!-- end main-header -->



      


