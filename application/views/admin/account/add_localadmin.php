<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="offset-1 col-md-10">
            <label><h3><?= $title; ?></h3></label>
            <div class="card">
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="localadmin_name" id="localadmin_name" placeholder="Local Admin's Name(First Last)*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-5">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="localadmin_email" id="localadmin_email" placeholder="Local Admin's email*">
                      </div>
                    </div>
                    <div class="col-12 col-md-7">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="localadmin_address" id="localadmin_address" placeholder="Local Admin's Address(City, State/Province, Zipcode)">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="localadmin_phone_num" id="localadmin_phone_num" placeholder="Local Admin's phone*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="localadmin_note" id="localadmin_note" placeholder="Note">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4" style="text-align: center;">
                        <input type="submit" class="btn btn-sm btn-info add_localadmin px-4 py-2" style="background: #EEA400; border: none; font-size: 24px; border-radius: 16px;" value="Create">
                        <!-- <a type="button" class="btn btn-sm btn-danger cancel px-4" id="cancel" href="<?= site_url(); ?>admin/account/index">Back</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>    
      </div><!--/ row --> 

    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#localadmin_name').val() && $('#localadmin_email').val() && $('#localadmin_phone_num').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/account/save_localadmin',
          type: 'POST',
          data: formData,       
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            var result = JSON.parse(response);
            if(!result || result == 0){
              toastr.warning('Saving the data is failed.');
            }else{
              toastr.success('The data is saved successfully.');
              setTimeout(function(){
                window.location.href = '<?= site_url(); ?>admin/account/local_admin';
              }, 600);
            }
            
          }
        })
      }else{
        toastr.warning('Please fill all fields correctly.');
        return;
      }
      
    });

  });
</script>