<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h3><?= $title; ?></h3></label>
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="hidden" name="apply_id" id="apply_id" value="<?= $apply_id; ?>">
                        <input type="text" readonly class="form-control form-control-sm" name="student_name" id="student_name" value="<?= $apply_info['student_name']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" readonly class="form-control form-control-sm" name="position" id="position" value="<?= $apply_info['position']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" readonly class="form-control form-control-sm" name="is_paid" id="is_paid" value="<?= $apply_info['is_paid'] == 1 ? 'Paid' : 'Unpaid'; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" readonly class="form-control form-control-sm" name="student_time" id="student_time" value="<?= $apply_info['duration']; ?> min">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Score:</label>
                        <input type="number" min="0" max="30" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="score" id="score" value="<?= $apply_info['score']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Place:</label>
                        <input type="text" class="form-control form-control-sm" name="place" id="place" value="<?= $apply_info['place']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Evaluation:</label>
                        <input type="file" class="form-control form-control-sm" name="evaluation" id="evaluation">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info update_apply px-4 py-2" style="background: #EEA400; border: none; width: 100%; font-size: 24px;" value="Update">
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
      if($('#score').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/applications/update_crescendo_apply',
          type: 'POST',
          data: formData,       
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            var result = JSON.parse(response);
            if(!result){
              toastr.warning('Saving the data is failed.');
            }else{
              toastr.success('The data is saved successfully.');
              setTimeout(function(){
                window.location.href = '<?= site_url(); ?>admin/applications/crescendo';
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