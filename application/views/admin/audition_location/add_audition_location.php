<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h3><?= $title; ?></h3></label>
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                  <div class="row">
                    <div class="col-12 col-md-8">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="location" id="location" placeholder="Audition Location">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group" style="text-align: center;">
                        <input type="submit" class="btn btn-sm btn-info add_location px-4 py-2" style="background: #EEA400; border: none; border-radius: 8px;" value="Create">
                        <!-- <a type="button" class="btn btn-sm btn-danger cancel px-4" id="cancel" href="<?= site_url(); ?>admin/account/index">Back</a> -->
                      </div>
                    </div>
                  </div>
              </form>
        </div>    
      </div><!--/ row --> 
      
    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#location').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/audition_location/save_location',
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
                window.location.href = '<?= site_url(); ?>admin/audition_location/index';
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