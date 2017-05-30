<?php
  function activeTab($requestUri){
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri) { echo 'class="active"'; }
  }
?>

<html lang="en">
<head>
  <title>FITH - Vulnerable Web Application</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo ROOT_DIR.'assets/img/favicon.ico'?>" type="image/x-icon" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo ROOT_DIR.'assets/css/bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?php echo ROOT_DIR.'assets/css/font-awesome.css'?>">
  <link rel="stylesheet" href="<?php echo ROOT_DIR.'assets/css/bootstrap-theme.min.css'?>">
  <!-- Bootstrap JS -->
  <script src="<?php echo ROOT_DIR.'assets/js/functions.js'?>"></script>
  <script src="<?php echo ROOT_DIR.'assets/js/jquery.min.js'?>"></script>
  <script src="<?php echo ROOT_DIR.'assets/js/bootstrap.js'?>" crossorigin="anonymous"></script>
  <!-- Local CSS -->
  <link rel="stylesheet" href="<?php echo ROOT_DIR.'assets/css/style.css'?>">
  <!-- Local JS -->
  <script>
    $('.dropdown-toggle').dropdown()
  </script>

</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a href="<?php echo ROOT_DIR.'.' ?>"><img alt="Brand" class="navbar-brand" src="<?php echo ROOT_DIR.'assets/img/logo.png' ?>" style="padding-top:8px; padding-bottom:8px;"></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php activeTab("")?>><a href="<?php echo ROOT_DIR.'.' ?>">Home<span class="sr-only">(current)</span></a></li>
          <li <?php activeTab("others")?>><a href="<?php echo ROOT_DIR.'others' ?>">Others</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <li><a href="<?php echo ROOT_DIR.'logout';?>" >Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">

  <div class="row">
    <div class="col-xs-12">
