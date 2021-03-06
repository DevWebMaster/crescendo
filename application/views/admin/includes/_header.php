<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($title)? $title.' - ' : 'Title -' ?> <?= $this->general_settings['application_name']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/fixedHeader.dataTables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
  
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datepicker/datepicker3.css">
  <!-- Select 2 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/select2/select2.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">

  <!-- DropZone -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/dropzone/dropzone.css">
  <!-- Google Font: Source Sans Pro -->
  <!--link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"-->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700" rel="stylesheet"> -->
  <!-- jQuery -->
  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->


 
  
   <!-- <?php if (isset($script['css']) && count($script['css']) >0  ) : ?>

    <?php foreach ( $script['css'] as  $css) { ?>
        <link rel="stylesheet" href="<?= $css ?>">
    <?php } ?>  
  <?php  endif; ?>

  <?php if (isset($script['js']) && count($script['js']) >0  ) : ?>
    <?php foreach ( $script['js'] as  $js) { ?>
        <script src="<?= $js ?>"></script>
    <?php } ?>  
  <?php  endif; ?>  -->

 
    


</head>

<body class="hold-transition sidebar-mini <?=  (isset($bg_cover)) ? 'bg-cover' : '' ?>" style="<?=  (isset($bg_cover)) ? '' : 'background: #afeeee;' ?>">

<!-- Main Wrapper Start -->
<div class="wrapper">

  <!-- Navbar -->

  <?php if(!isset($navbar)): ?>

  <nav class="main-header navbar navbar-expand bg-brand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" style="color: #000000;"><i class="fa fa-bars"></i></a>
      </li>
      <!--li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('admin') ?>" class="nav-link"><?= trans('home') ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?= trans('contact') ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link"><?= trans('logout') ?></a>
      </li-->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" style="justify-content: space-between; width: 100%;">
      <div id="nav_label">
        <label style="font-size: 40px; font-weight: bold; color: #EEA400;">Crescendo International Music Competition</label>
      </div>
     <div id="mob_nav">
       <img src="<?= base_url()?>assets/dist/img/logo.png" style="width: 40px; height: 40px;" class="user-image" alt="Logo">
     </div>
      <!--div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div-->
    </form>
    
    <!-- <ul class="navbar-nav" style="margin-left: 75%;">
      <li class="nav-item">
        <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link"><?= trans('logout') ?></a>
      </li>
    </ul> -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="width: 140px !important;">
      <!-- Languages -->
      <?php  $languages = get_language_list(); ?>
      <!--li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="Languages">
          <i class="fa fa-globe"></i>
          <span class="badge badge-warning navbar-badge">
            <?php 
            $lang = ($this->session->userdata('site_lang') == '') ? $this->general_settings['default_language'] : $this->session->userdata('site_lang');
            echo get_lang_short_code($lang); 
            ?>
              
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php foreach($languages as $lang):  ?>
          <a href="<?= base_url('home/site_lang/'.$lang['id']) ?>" class="dropdown-item">
            <i class="fa fa-flag mr-2"></i> <?= $lang['name'] ?>
          </a>
          <div class="dropdown-divider"></div>
          <?php endforeach; ?>
      </li-->
      <!-- Messages Dropdown Menu -->
      <!--li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"-->
            <!-- Message Start -->
            <!--div class="media">
              <img src="<?= base_url()?>assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div-->
            <!-- Message End -->
          <!--/a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"-->
            <!-- Message Start -->
            <!--div class="media">
              <img src="<?= base_url()?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div-->
            <!-- Message End -->
          <!--/a-->
          <!--div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"-->
      
          <!--/a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li-->
      <!-- Notifications Dropdown Menu -->
      <!--li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li-->
      <!-- user panel -->
      <li class="dropdown user user-menu open">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="color: black !important; display: flex; align-items: center;">
          <!-- <img src="<?= base_url()?>assets/dist/img/setting.png" style="width: 28px; height: 28px; background: #afeeee;" class="user-image" alt="User Image"> -->
          <i class="fa fa-gear fa-lg icon" style="padding: 0px; color: #000000;"></i>
          <span id="setting_icon" class="hidden-xs ml-1" wfd-id="466">Setting</span>
        </a>
        <ul class="dropdown-menu" wfd-id="465">
              <!-- User image -->
              <li class="user-header" wfd-id="518">
                <a href="<?= base_url()?>admin/auth/profile" class="nav-link" style="color: black !important;">Profile</a>
              </li>
              <!-- Menu Body -->
              <li class="user-body" wfd-id="513">
                <a href="<?= base_url()?>admin/auth/edit_password" class="nav-link" style="color: black !important;">Edit Password</a>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" wfd-id="510">
               <a href="<?= base_url()?>admin/auth/logout" class="nav-link" style="color: black !important;">Log out</a>
              </li>
        </ul>
      </li>

      <!--li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li-->
    </ul>
  </nav>

  <?php endif; ?>

  <!-- /.navbar -->


  <!-- Sideabr -->

  <?php if(!isset($sidebar)): ?>

  <?php $this->load->view('admin/includes/_sidebar'); ?>

  <?php endif; ?>

  <!-- / .Sideabr -->
