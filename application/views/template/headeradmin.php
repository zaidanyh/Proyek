<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" href="<?=base_url('/assets/img/favicon.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?=$title;?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/paper-dashboard.css?v=2.0.0')?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url('assets/demo/demo.css')?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?=base_url('uploads/user/default.png')?>">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          <?=$this->session->userdata('username');?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?=base_url('Pegawai/index')?>">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>Pegawai/userprofile">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('Pegawai/orderlist')?>">
              <i class="fa fa-plus-square"></i>
              <p>Order</p>
            </a>
          </li>
          
          <li>
            <a href="<?=base_url('Pegawai/checkOrder')?>">
              <i class="fa fa-tasks"></i>
              <p>Check Order</p>
            </a>
          </li>

          <li>
            <a href="<?=base_url('Pegawai/checkOrderFinish')?>">
              <i class="fa fa-check"></i>
              <p>Order Finished</p>
            </a>
          </li>

          <li>
            <a href="<?=base_url('Login/logout')?>">
              <i class="fa fa-sign-out"></i>
              <p>Logout</p>
            </a>
          </li> 
        </ul>
      </div>
    </div>
    <div class="main-panel">