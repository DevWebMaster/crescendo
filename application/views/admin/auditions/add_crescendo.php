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
                        <label style="color: grey;">Audition Center:</label>
                        <select class="form-control" name="audition_location" id="audition_location">
                          <?php
                            foreach($audition_locations as $audition_location):
                          ?>
                            <option value="<?= $audition_location['id']; ?>"><?= $audition_location['location']; ?></option>
                          <?php endforeach; ?>
                        </select>
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
                      <div class="form-group mb-2 mt-5">
                        <label style="font-weight: bold;">Audition Fee</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;" class="pb-4">Solo</label>
                        <input type="text" class="form-control form-control-sm" name="fee_solo" id="fee_solo" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;" class="pb-4">Duet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_duet" id="fee_duet" placeholder="">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;" class="pb-4">Trio</label>
                        <input type="text" class="form-control form-control-sm" name="fee_trio" id="fee_trio" placeholder="">
                      </div>
                    </div>
                    <!-- <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Quartet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_quartet" id="fee_quartet" placeholder="">
                      </div>
                    </div> -->
                    <div class="col-12 col-md-6">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Ensemble of 4 or more participants<br>(fee per each performer)</label>
                        <input type="text" class="form-control form-control-sm" name="fee_ensemble" id="fee_ensemble" placeholder="">
                      </div>
                    </div>
                    <!-- <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Duration*</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="duration" id="duration" placeholder="minutes">
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2 mt-5">
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
                        <label style="color: grey;">Late Fee*</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="late_fee" id="late_fee" value="50">
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
                        <input type="submit" class="btn btn-sm btn-info add_crescendo px-4" style="background: #EEA400; border: none; border-radius: 8px;" value="Create">
                        <a type="button" class="btn btn-sm btn-danger cancel px-4" style="border-radius: 8px;" id="cancel" href="<?= site_url(); ?>admin/auditions/index">Back</a>
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
      if($('#audition_name').val()){
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
      }else if($('#audition_name').val() == ''){
        toastr.warning('Please fill Audition Name correctly.');
        return;
      }else if($('#audition_date').val() == ''){
        toastr.warning('Please fill Audition Date correctly.');
        return;
      }else if($('#fee_solo').val() == ''){
        toastr.warning('Please fill Fee of Solo option correctly.');
        return;
      }else if($('#fee_duet').val() == ''){
        toastr.warning('Please fill Fee of Duet option correctly.');
        return;
      }else if($('#fee_trio').val() == ''){
        toastr.warning('Please fill Fee of Trio option correctly.');
        return;
      }else if($('#fee_ensemble').val() == ''){
        toastr.warning('Please fill Fee of Ensemble option correctly.');
        return;
      }else if($('#audition_deadline').val() == ''){
        toastr.warning('Please fill Audition Deadline correctly.');
        return;
      }else if($('#late_fee').val() == ''){
        toastr.warning('Please fill late fee correctly.');
        return;
      }
      
    });

  });
</script>