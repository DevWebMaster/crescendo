<div class="form-background" style="text-align: center; padding-top: 150px;">
  <div class="public_nav">
    <div class="pnav_bar">
      <img src="<?= base_url()?>assets/dist/img/logo.png" width="48px" height="48px">
      <div class="pnav_body">
        <div class="pnav_item">
          <a class="pnav_link" href="" target="_blank">CRESCENDO INTERNATIONAL COMPETITION</a>
        </div>
        <div class="pnav_item">
          <a class="pnav_link" href="" target="_blank">LITTLE MOZARTS</a>
        </div>
        <div class="pnav_item">
          <a class="pnav_link" href="" target="_blank">INTERNATIONAL STUDENT EXCHANGE PROGRAM</a>
        </div>
        <div class="pnav_item">
          <a class="pnav_link" href="" target="_blank">ABOUT US</a>
        </div>
      </div>
    </div>
  </div>
  <h1 style="color: #FFFFFF; font-weight: 'bold';"><!--a href="<?= base_url('admin'); ?>" style="color: #FFFFFF; font-weight: 'bold';"-->Crescendo International Competitions<!--/a--></h1>
  <div class="login-box">
    
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <!-- <p class="login-box-msg"><?= trans('l_auth_login_msg') ?></p> -->

        <?php $this->load->view('admin/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input type="text" name="username" id="name" class="form-control input-field" placeholder="Username" style="color: #FFFFFF !important; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;">
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input type="password" name="password" id="password" class="form-control" placeholder="<?= trans('password') ?>" style="color: #FFFFFF; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;">
            </div>
          </div>
          <div class="row" style="text-align: left;">
            <div class="col-12">
              <div class="checkbox icheck">
                <label style="color: #FFFFFF; padding-bottom: 16px;">
                  <input type="checkbox" name="islocaladmin" id="islocaladmin"> Local Admin
                </label>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <div class="rpw">
            <div class="col-12">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('signin') ?>">
            </div>
            <!-- /.col -->
          </div>
        <?php echo form_close(); ?>

        <p class="mb-1 mt-1" >
          <a style="color: #FFFFFF; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;" href="<?= base_url('admin/auth/forgot_password'); ?>"><small><?= trans('i_forgot_my_password') ?></small></a>
        </p>
        <p class="mb-0">
          <a style="color: #FFFFFF; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;" href="<?= base_url('admin/auth/register'); ?>" class="text-center"><small><?= trans('register_new_membership') ?></small></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</div>
<script>          
var images = ['bg_login.jpg'];
$('.bg-cover').css({'background-image': 'url(<?= base_url()?>assets/dist/img/auth/' + images[Math.floor(Math.random() * images.length)] + '),linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6) '});
</script>
