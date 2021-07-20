<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h3><?= $title; ?></h3></label>
            <div class="card">
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <select class="form-control" name="localadmin_name" id="localadmin_name">
                          <?php
                            foreach($local_admins as $local_admin):
                          ?>
                            <option value="<?= $local_admin['id']; ?>"><?= $local_admin['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="audition_name" id="audition_name" placeholder="Audition Name*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="audition_location" id="audition_location" placeholder="Audition Location and Address*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="date" class="form-control form-control-sm" name="audition_date" id="audition_date" placeholder="Date of Audition*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="font-weight: bold;">Audition Fee</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Solo</label>
                        <input type="text" class="form-control form-control-sm" name="fee_solo" id="fee_solo" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Duet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_duet" id="fee_duet" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Trio</label>
                        <input type="text" class="form-control form-control-sm" name="fee_trio" id="fee_trio" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Quartet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_quartet" id="fee_quartet" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Ensemble(5 participants)</label>
                        <input type="text" class="form-control form-control-sm" name="fee_ensemble" id="fee_ensemble" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Duration*</label>
                        <input type="number" class="form-control form-control-sm" name="duration" id="duration" placeholder="minutes">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label>Late Fee</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Application Deadline*</label>
                        <input type="date" class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" placeholder="Audition Deadline">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Audition Fee*</label>
                        <input type="number" class="form-control form-control-sm" name="late_fee" id="late_fee" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Available for Application</label>
                        <select class="form-control" name="status" id="status">
                          <option value="1">Close</option>
                          <option value="2">Open</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_crescendo px-4 py-2" style="background: #EEA400; border: none; font-size: 24px; border-radius: 16px;" value="Create">
                        <a type="button" class="btn btn-sm btn-danger cancel px-4" style="font-size: 24px; border-radius: 16px;" id="cancel" href="<?= site_url(); ?>admin/auditions/index">Back</a>
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
      if($('#audition_name').val() && $('#audition_location').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/auditions/save_crescendo',
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
                window.location.href = '<?= site_url(); ?>admin/auditions/crescendo_list';
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