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
                        <label style="color: grey;">Local Admin:</label>
                        <input type="hidden" name="audition_id" id="audition_id" value="<?= $audition_id; ?>">
                        <select class="form-control" name="localadmin_name" id="localadmin_name">
                          <?php
                            foreach($local_admins as $local_admin):
                          ?>
                            <option value="<?= $local_admin['id'] ?>"  <?php if($audition_info['local_admin'] == $local_admin['id']) { echo "selected"; } ?> ><?= $local_admin['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="audition_name" id="audition_name" value="<?= $audition_info['audition_name']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Audition location:</label>
                        <select class="form-control" name="audition_location" id="audition_location">
                          <?php
                            foreach($audition_locations as $audition_location):
                          ?>
                            <option value="<?= $audition_location['id'] ?>"  <?php if($audition_info['audition_location'] == $audition_location['id']) { echo "selected"; } ?> ><?= $audition_location['location'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Audition Date:</label>
                        <input type="date" class="form-control form-control-sm" name="audition_date" id="audition_date" value="<?= $audition_info['audition_date']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Prize:</label>
                        <input type="text" class="form-control form-control-sm" name="prize" id="prize" placeholder="Prize" value="<?= $audition_info['prize']; ?>">
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
                        <input type="text" class="form-control form-control-sm" name="fee_solo" id="fee_solo" value="<?= $audition_info['fee_solo']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Duet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_duet" id="fee_duet" value="<?= $audition_info['fee_duet']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Trio</label>
                        <input type="text" class="form-control form-control-sm" name="fee_trio" id="fee_trio" value="<?= $audition_info['fee_trio']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Quartet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_quartet" id="fee_quartet" value="<?= $audition_info['fee_quartet']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Ensemble(5 participants)</label>
                        <input type="text" class="form-control form-control-sm" name="fee_ensemble" id="fee_ensemble" value="<?= $audition_info['fee_ensemble']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Duration*</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="duration" id="duration" value="<?= $audition_info['duration']; ?>">
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
                        <input type="date" class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" value="<?= $audition_info['audition_deadline']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Audition Fee*</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="late_fee" id="late_fee" value="<?= $audition_info['late_fee']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Available for Application</label>
                        <select class="form-control" name="status" id="status">
                          <option value="1" <?php if($audition_info['is_active'] == 1) { echo "selected"; } ?> >Close</option>
                          <option value="2" <?php if($audition_info['is_active'] == 2) { echo "selected"; } ?> >Open</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info update_little_morarts px-4 py-2" style="background: #EEA400; border: none; border-radius: 8px;" value="Update">
                        <a type="button" class="btn btn-sm btn-danger cancel px-4 py-2" style="border-radius: 8px;" id="cancel" href="<?= site_url(); ?>admin/auditions/index">Back</a>
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
          url: '<?= site_url(); ?>admin/recital/update_crescendo',
          type: 'POST',
          data: formData,       
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            var result = JSON.parse(response);
            if(!result || result == 0){
              toastr.warning('Updating the data is failed.');
            }else{
              toastr.success('The data is updated successfully.');
              setTimeout(function(){
                window.location.href = '<?= site_url(); ?>admin/recital/crescendo_list';
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