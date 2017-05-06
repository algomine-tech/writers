<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>


<!DOCTYPE HTML>
<html>
<head>
<title>The Marketing-landing-page Website Template | Home :: w3layouts</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/component.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="<?= base_url() ?>assets/frontend/js/modernizr.custom.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/jquery.cbpFWSlider.min.js"></script>
    <script>
      $( function() {
        
        - how to call the plugin:
        $( selector ).cbpFWSlider( [options] );
        - options:
        {
          // default transition speed (ms)
          speed : 500,
          // default transition easing
          easing : 'ease'
        }
        - destroy:
        $( selector ).cbpFWSlider( 'destroy' );
        

        $( '#cbp-fwslider' ).cbpFWSlider();

      } );
    </script>
</head>
<body>

<div class="header">
  <div class="wrap">
    <div class="logo">
      <a href="index.html">Writersgeeks</a>
    </div>
    <div class="signin">
      <ul>
        <li><a href="<?= site_url('auth/login'); ?>">Signin</a></li>
        <li class="a"><h6>or</h6></li>
        <li class="b"><a href="<?= site_url('auth/create_user'); ?>">Signup</a></li>
        <div class="clear"> </div>  
      </ul>
    </div>
    <div class="clear"> </div>  
    </div>
</div>