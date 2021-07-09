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
            <div class="form-group has-feedback">
              <div class="input-container">
                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Current Password" style="color: #000000; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;">
              </div>
            </div>
            <div class="form-group has-feedback">
              <div class="input-container">
                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" style="color: #000000; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;">
              </div>
            </div>
            <div class="form-group has-feedback">
              <div class="input-container">
                <input type="password" name="check_password" id="check_password" class="form-control" placeholder="Confirm Password" style="color: #000000; font-size: 17px; letter-spacing: 0.02em; font-weight: 500;">
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="button" name="btn_update" id="btn_update" class="btn btn-primary btn-block btn-flat" value="Update">
              </div>
              <!-- /.col -->
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
    $("#btn_update").click(function(){
      var old_password = $('#old_password').val()
      var new_password = $('#new_password').val()
      var check_password = $('#check_password').val()
      if(new_password != check_password){
        toastr.warning('Confirm the new password. It is incorrect.')
        return;
      }
      $.ajax({
        url: "<?= site_url(); ?>admin/auth/update_password",
        type: "POST",
        data: { old_password: old_password, new_password: new_password },
        success: function(response){
          var result = JSON.parse(response)
          if(result == 'S'){
            toastr.success('Password is updated correctly.')
            $('#old_password').val('')
            $('#new_password').val('')
            $('#check_password').val('')
          }else{
            toastr.warning('Current password is incorrect. Please try to type again.')
          }
        }
      })
    })
  })
</script>