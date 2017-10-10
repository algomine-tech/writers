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
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  
  
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  
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
h3{
  color:#34a527;
}
</style>
    <!-- wrapper page -->
    <div class="wrapper">
      <!-- main-header -->
      <header class="main-header">


        <!-- main navbar -->
        <nav class="navbar  main-navbar hidden-sm hidden-xs">
          <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <!-- Main logo-->
                           
                <ul class="nav navbar-nav navbar-left">
                <li>   LOGO     </li>
                
                </ul>  
               <ul class="nav navbar-nav navbar-right">
                <li class="link-btn" ><a href="<?= site_url('auth/logout'); ?>" style="margin-right:50px"><i class="fa fa-money fa-2x"></i> &nbsp;&nbsp;<span style="font-size: 20px"> $ <?php $valu = $this->session->userdata('able'); echo $valu; ?> </span></a></li>
                <li class="dropdown">
                  <a href="#" class="link-profile dropdown-toggle"  data-toggle="dropdown" >
                    <img src="<?= base_url() ?>assets/theme/images/people/4.jpg" alt="" class="img-profile"> &nbsp; <?= $this->session->userdata('first_name'); ?> &nbsp; <?= $this->session->userdata('last_name'); ?> <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="my_alerts.html"> My Alerts </a></li>
                    <li><a href="my_notifications.html"> Notifications <span class="badge ">5</span></a></li>
                    <li><a href="change_password.html"> Change Password</a></li>
                  </ul>
                </li>
            
                <li class="link-btn"><a href="<?= site_url('auth/logout'); ?>"><span class="btn btn-theme btn-pill btn-xs btn-line">Log Out</span></a></li>
              </ul>
            </div>
          </div>
        </nav><!-- end main navbar -->
    
     </header><!-- end main-header -->

      


