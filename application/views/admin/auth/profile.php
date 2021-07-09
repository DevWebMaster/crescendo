<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Password</h1>
        </div><!-- /.col -->
        <!--div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><?= trans('home') ?></a></li>
            <li class="breadcrumb-item active"><?= trans('dashboard') ?></li>
          </ol>
        </div--><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-2 col-8 text-center">
          <form>
            <div class="form-group has-feedback" style="text-align: left;">
              <label>User Name:</label>
              <div class="input-container">
                <input type="text" name="profile_name" id="profile_name" value="<?= $old["username"]; ?>" class="form-control" placeholder="Username" >
              </div>
            </div>
            <div class="form-group has-feedback" style="text-align: left;">
              <label>Country:</label>
              <div class="input-container">
                <select class="form-control" name="profile_country" id="profile_country">
                  <?php
                    foreach($countries as $country):
                  ?>
                    <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                  <?php endforeach; ?>
                </select>
                <input type="hidden" id="country_id" value="<?= $old["country"] ?>">
              </div>
            </div>
            <div class="form-group has-feedback" style="text-align: left;">
              <label>Address:</label>
              <div class="input-container">
                <input type="text" name="profile_address" id="profile_address" value="<?= $old["address"]; ?>" class="form-control" placeholder="<?= trans('address') ?>" >
              </div>
            </div>
            <div class="form-group has-feedback" style="text-align: left;">
              <label>Email:</label>
              <div class="input-container">
                <input type="text" name="profile_email" id="profile_email" value="<?= $old["email"]; ?>" class="form-control" placeholder="<?= trans('email') ?>" >
              </div>
            </div>
            <div class="form-group has-feedback" style="text-align: left;">
              <label>Mobile No:</label>
              <div class="input-container">
                <input type="text" name="profile_mobile_no" id="profile_mobile_no" value="<?= $old["mobile_no"]; ?>" class="form-control" placeholder="<?= trans('l_mobile_no') ?>" >
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="button" name="btn_update" id="btn_update" class="btn btn-primary btn-block btn-flat" value="Update">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){
    var country_id = $('#country_id').val();
    $('#profile_country').val(country_id);

    $("#btn_update").click(function(){
      var username = $('#profile_name').val()
      var country = $('#profile_country').val()
      var address = $('#profile_address').val()
      var email = $('#profile_email').val()
      var mobile_no = $('#profile_mobile_no').val()
      $.ajax({
        url: "<?= site_url(); ?>admin/auth/update_profile",
        type: "POST",
        data: { 
          username: username, 
          country: country,
          address: address,
          email: email,
          mobile_no: mobile_no
        },
        success: function(response){
          var result = JSON.parse(response)
          if(result){
            toastr.success('Profile is updated correctly.')
          }else{
            toastr.warning('Updating of Profile is failed.')
          }
        }
      })
    })
  })
</script>