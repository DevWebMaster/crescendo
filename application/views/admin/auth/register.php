<div class="form-background" style="text-align: center; padding-top: 108px;">
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
  <div class="register-box">
    <div class="register-logo">
      <!-- <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2> -->
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <!-- <p class="login-box-msg"><?= trans('register_new_membership') ?></p> -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <?php echo form_open(base_url('admin/auth/register'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <div class="radio" style="display: flex; justify-content: space-between; padding-top: 32px;">
              <label style="color: #FFFFFF;">
                  <input type="radio" name="role_status" id="teacher" value="3" checked="checked">
                  I'm a Teacher
              </label>
              <label style="color: #FFFFFF;">
                  <input type="radio" name="role_status" id="parent" value="5">
                  I'm a Parent
              </label>
              <label style="color: #FFFFFF;">
                  <input type="radio" name="role_status" id="student" value="4">
                  I'm a Student
              </label>
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input type="text" name="username" id="name" value="<?= old("username"); ?>" class="form-control" placeholder="Full Name" >
              <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="Enter correct name as it will be shown as it appears on the Programme." style="color: white;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-flag icon"></i>
              <select class="form-control" name="country" id="country" style="color: #FFFFFF; background: grey;">
                <?php
                  foreach($countries as $country):
                ?>
                  <option style="color: black;" value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-home icon"></i>
              <input type="text" name="address" id="address" value="<?= old("address"); ?>" class="form-control" placeholder="<?= trans('address') ?>" >
              <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="Enter correct address as this will be used to as a mail recipient." style="color: white;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input type="text" name="email" id="email" value="<?= old("email"); ?>" class="form-control" placeholder="<?= trans('email') ?>" >
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-mobile icon"></i>
              <input type="text" name="mobile_no" id="mobile_no" value="<?= old("mobile_no"); ?>" class="form-control" placeholder="<?= trans('l_mobile_no') ?>" >
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input type="password" name="password" id="password" class="form-control" placeholder="<?= trans('password') ?>" >
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="<?= trans('confirm') ?>" >
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-12">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> <?= trans('i_agree_to_the') ?> <a href="#"><?= trans('terms') ?></a>
                </label>
              </div>
            </div> -->
            <?php if($this->recaptcha_status): ?>
              <div class="recaptcha-cnt">
                  <?php generate_recaptcha(); ?>
              </div>
            <?php endif; ?>
            <!-- /.col -->
            <div class="col-12">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('register') ?>">
            </div>
            <!-- /.col -->
          </div>
        <?php echo form_close(); ?>
        <p class="mt-3">
          <a style="color: #FFFFFF; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;" href="<?= base_url('admin/auth/login'); ?>" class="text-center"><?= trans('i_already_have_membership') ?></a>
        </p>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
</div>
<script>          
var images = ['bg_login.jpg'];
$('.bg-cover').css({'background-image': 'url(<?= base_url()?>assets/dist/img/auth/' + images[Math.floor(Math.random() * images.length)] + '),linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6) '});
</script>