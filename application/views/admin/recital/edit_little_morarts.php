<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h3><?= $title; ?></h3></label>
            <div class="card">
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="card-body">
                  <input type="hidden" name="audition_id" id="audition_id" value="<?= $audition_id; ?>">
                  <!-- <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Local Admin:</label>
                        <select class="form-control" name="localadmin_name" id="localadmin_name">
                          <?php
                            foreach($local_admins as $local_admin):
                          ?>
                            <option value="<?= $local_admin['id'] ?>"  <?php if($audition_info['local_admin'] == $local_admin['id']) { echo "selected"; } ?> ><?= $local_admin['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div> -->
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
                        <label style="color: grey;">Recital Venue:</label>
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
                    <div class="col-12 col-md-5">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Recital Date:</label>
                        <input type="date" class="form-control form-control-sm" name="audition_date" id="audition_date" value="<?= $audition_info['audition_date']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Recital Time:</label>
                        <input type="time" class="form-control form-control-sm" name="audition_time" id="audition_time" value="<?= $audition_info['audition_time1']; ?>">
                      </div>
                    </div>
                  </div>
                  <?php if($audition_info['audition_time2'] != ''): ?>
                    <div class="row">
                      <div class="col-12 col-md-5">
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group mb-2">
                          <label style="color: grey;">Recital Time2:</label>
                          <input type="time" class="form-control form-control-sm" name="audition_time2" id="audition_time2" value="<?= $audition_info['audition_time2']; ?>">
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if($audition_info['audition_time3'] != ''): ?>
                    <div class="row">
                      <div class="col-12 col-md-5">
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group mb-2">
                          <label style="color: grey;">Recital Time2:</label>
                          <input type="time" class="form-control form-control-sm" name="audition_time3" id="audition_time3" value="<?= $audition_info['audition_time3']; ?>">
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2 mt-5">
                        <label style="font-weight: bold;">Recital Fee</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;" class="pb-4">Solo</label>
                        <input type="text" class="form-control form-control-sm" name="fee_solo" id="fee_solo" value="<?= $audition_info['fee_solo']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;" class="pb-4">Duet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_duet" id="fee_duet" value="<?= $audition_info['fee_duet']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;" class="pb-4">Trio</label>
                        <input type="text" class="form-control form-control-sm" name="fee_trio" id="fee_trio" value="<?= $audition_info['fee_trio']; ?>">
                      </div>
                    </div>
                    <!-- <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Quartet</label>
                        <input type="text" class="form-control form-control-sm" name="fee_quartet" id="fee_quartet" value="<?= $audition_info['fee_quartet']; ?>">
                      </div>
                    </div> -->
                    <div class="col-12 col-md-6">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Ensemble of 4 or more participants<br>(fee per each performer)</label>
                        <input type="text" class="form-control form-control-sm" name="fee_ensemble" id="fee_ensemble" value="<?= $audition_info['fee_ensemble']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Duration*:</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="duration" id="duration" value="<?= $audition_info['duration']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Ticket Price</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="ticket_price" id="ticket_price" value="<?= $audition_info['ticket_price']; ?>">
                      </div>
                    </div>
                    <!-- <div class="col-12 col-md-3">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Tickets Quantity</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="tickets_quantity" id="tickets_quantity" value="<?= $audition_info['tickets_quantity']; ?>">
                      </div>
                    </div> -->
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Discounted Price</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="discounted_price" id="discounted_price" value="<?= $audition_info['discounted_price']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Discounted Quantity</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="discounted_quantity" id="discounted_quantity" value="<?= $audition_info['discounted_quantity']; ?>">
                      </div>
                    </div>
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
                        <input type="date" class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" value="<?= $audition_info['audition_deadline']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label style="color: grey;">Late Fee*</label>
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
                        <a type="button" class="btn btn-sm btn-danger cancel px-4 py-2" style="border-radius: 8px;" id="cancel" href="<?= site_url(); ?>admin/recital/index">Back</a>
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
          url: '<?= site_url(); ?>admin/recital/update_little_morarts',
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
                window.location.href = '<?= site_url(); ?>admin/recital/index';
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