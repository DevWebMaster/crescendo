<?php 
$cur_tab = $this->uri->segment(2)==''?'applyauditions': $this->uri->segment(2);  
?>  


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
    <img src="<?= base_url()?>assets/dist/img/logo.png" alt="Infinity Trans" style="width: 58px; height:  58px;" />
    <span class="brand-text font-weight-light">&nbsp;&nbsp;&nbsp;Crescendo</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= ucwords($this->session->userdata('username')); ?></a>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php 
          $menu = get_sidebar_menu($this->session->userdata('admin_role_id')); 

          foreach ($menu as $nav):

            $sub_menu = get_sidebar_sub_menu($nav['id']);

            $has_submenu = (count($sub_menu) > 0) ? true : false;
        ?>

        <?php if( 1==1 ||   $this->rbac->check_module_permission($nav['controller_name'])): ?> 

        <li id="<?= ($nav['controller_name']) ?>" class="nav-item <?= ($has_submenu) ? 'has-treeview' : '' ?> has-treeview">

          <a href="<?= base_url('admin/'.$nav['controller_name']) ?>" class="nav-link">
            <i class="nav-icon fa <?= $nav['fa_icon'] ?>"></i>
            <p>
              <?= $nav['module_name'] ?>
              <?= ($has_submenu) ? '<i class="right fa fa-angle-left"></i>' : '' ?>
            </p>
          </a>

          <!-- sub-menu -->
          <?php 
            if($has_submenu): 
          ?>
          <ul class="nav nav-treeview">

            <?php foreach($sub_menu as $sub_nav): ?>

            <li class="nav-item">
              <!--a href="<?= base_url('admin/'.$nav['controller_name'].'/'.$sub_nav['link']); ?>" class="nav-link"-->
              <a href="<?= base_url('admin/'.$sub_nav['link']); ?>" class="nav-link">
                <i class="fa <?= $sub_nav['fa_icon'] ?> "></i>
                <p><?= $sub_nav['name'] ?></p>
              </a>
            </li>

            <?php endforeach; ?>
           
          </ul>
          <?php endif; ?>
          <!-- /sub-menu -->
        </li>

        <?php endif; ?>
        <?php if($nav['module_name'] == 'Applications'): ?>
          <div style="border-bottom: 1px solid grey; margin-left: 20px; margin-right: 20px; margin-top: 10px; margin-bottom: 10px;"></div>
        <?php endif; ?>

        <?php endforeach; ?>

        <!--li class="nav-header"><?= trans('miscellaneous') ?></li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs" class="nav-link">
            <i class="nav-icon fa fa-file"></i>
            <p><?= trans('documentation') ?></p>
          </a>
        </li>
        <li class="nav-header"><?= trans('labels') ?></li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-danger"></i>
            <p class="text"><?= trans('important') ?></p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-warning"></i>
            <p><?= trans('warning') ?></p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-info"></i>
            <p><?= trans('informational') ?></p>
          </a>
        </li-->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>