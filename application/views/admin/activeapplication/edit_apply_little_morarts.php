<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="offset-1 col-md-10">
            <label><h3><?= $title; ?></h3></label>
            <hr>
            <!-- <div class="card"> -->
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <!-- <div class="card-body"> -->
                  <fieldset>
                    <legend>Audition Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <input type="hidden" name="apply_id" id="apply_id" value="<?= $apply_id; ?>">
                          <label class="title mr-2">Audition Center:</label>
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_name" id="audition_name" value="<?= $little_morart[0]['audition_name']; ?>">
                          <input type="hidden" name="audition_id" id="audition_id" value="<?= $little_morart[0]['id']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Available for Application:</label>
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['is_active'] ? 'Open' : 'Close'; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Location:</label>
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_location" id="audition_location" value="<?= $little_morart[0]['auditionlocation']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-4">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Date:</label>
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['audition_date']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Application Deadline</label>
                          <input style="width: 65%;" type="date" readonly class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" value="<?= $little_morart[0]['audition_deadline']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Fee</label>
                          <input style="width: 65%;" type="number" readonly class="form-control form-control-sm" name="late_fee" id="late_fee" value="<?= $little_morart[0]['late_fee']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <!-- <label>Special Request:</label> -->
                          <input type="checkbox" name="isonline" id="isonline"> Online Video
                        </div>
                      </div>
                    </div>
                    <div id="online_video_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Video link:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="video_link" id="video_link">
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>Special Request:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <!-- <label>Special Request:</label> -->
                          <input type="checkbox" name="special_request" id="special_request"> Do you have a special request?
                        </div>
                      </div>
                    </div>
                    <div id="special_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Request Date:</label>
                            <input style="width: 20%;" readonly type="date" class="form-control form-control-sm" name="request_date" id="request_date" value="<?= $little_morart[0]['audition_date'] ?>">
                            <input style="width: 20%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm ml-3" name="request_hour" id="request_hour" value="<?= explode('-', $little_morart[0]['request_time'])[0]; ?>">
                            <label class="title mr-2 mt-1">hour</label>
                            <input style="width: 20%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm ml-3" name="request_minute" id="request_minute" value="<?= explode('-', $little_morart[0]['request_time'])[1]; ?>">
                            <label class="title mr-2 mt-1">minute</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Request Need:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="request_need" id="request_need" value="<?= $little_morart[0]['request_need'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>Student Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Student Name:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?= $little_morart[0]['student_name']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Country:</label>
                          <select style="width: 65%;" class="form-control" name="country_id" id="country_id">
                            <?php
                              foreach($countries as $country):
                            ?>
                              <option value="<?= $country['id']; ?>" <?php if($little_morart[0]['country_id'] == $country['id']) { echo "selected"; } ?>><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Address:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_address" id="student_address" value="<?= $little_morart[0]['address']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Mobile Number:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_mobile_no" id="student_mobile_no" value="<?= $little_morart[0]['mobile_no']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Instrument:</label>
                          <select style="width: 65%;" class="form-control" name="instrument" id="instrument">
                            <?php
                              foreach($instruments as $instrument):
                            ?>
                              <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['instrument'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label style="font-weight: bold;">Performance:</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="radio" style="display: flex; justify-content: space-between; padding-bottom: 8px;">
                          <label>
                              <input type="radio" name="performance_type" id="solo" value="1" checked="checked">
                              Solo (USD <?= $little_morart[0]['fee_solo'] ?>)
                              <input type="hidden" name="solo_price" id="solo_price" value="<?= $little_morart[0]['fee_solo']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="duet" value="2">
                              Duet (USD <?= $little_morart[0]['fee_duet'] ?>)
                              <input type="hidden" name="duet_price" id="duet_price" value="<?= $little_morart[0]['fee_duet']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="trio" value="3">
                              Trio (USD <?= $little_morart[0]['fee_trio'] ?>)
                              <input type="hidden" name="trio_price" id="trio_price" value="<?= $little_morart[0]['fee_trio']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="quartet" value="4">
                              Quartet (USD <?= $little_morart[0]['fee_quartet'] ?>)
                              <input type="hidden" name="quartet_price" id="quartet_price" value="<?= $little_morart[0]['fee_quartet']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="ensemble" value="5">
                              Ensemble(5 participants) (USD <?= $little_morart[0]['fee_ensemble'] ?>)
                              <input type="hidden" name="ensemble_price" id="ensemble_price" value="<?= $little_morart[0]['fee_ensemble']; ?>">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="solo_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="co_performers" id="co_performers" value="<?= $little_morart[0]['co_performers']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>REPERTOIRE:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Composer:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="composer" id="composer" value="<?= $little_morart[0]['composer']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Title(Op., No., mov., key):</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="title" id="title" value="<?= $little_morart[0]['title']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Duration(in minutes):</label>
                          <div style="display: flex; align-items: center; width: 65%;">
                            <input type="number" readonly class="form-control form-control-sm mr-1" name="student_time" id="student_time" value="<?= $little_morart[0]['duration']; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="'Enter accurate time of piece as this will be the allotted time allowed."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>Teacher Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Teacher:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" value="<?= $little_morart[0]['teacher']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Country:</label>
                          <select style="width: 65%;" class="form-control" name="teacher_country_id" id="teacher_country_id">
                            <?php
                              foreach($countries as $country):
                            ?>
                              <option value="<?= $country['id']; ?>" <?php if($little_morart[0]['teacher_country_id'] == $country['id']) { echo "selected"; } ?>><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Address:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $little_morart[0]['teacher_address']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Mobile Number:</label>
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $little_morart[0]['teacher_mobile']; ?>">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>Payment:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="radio" style="display: flex; justify-content: space-around; padding-bottom: 8px;">
                          <label>
                              <input type="radio" name="payment_type" id="paypal" value="1" <?php if($little_morart[0]['payment_type'] == 1) { echo "checked"; } ?> >
                              Paypal
                          </label>
                          <label>
                              <input type="radio" name="payment_type" id="order_check" value="2" <?php if($little_morart[0]['payment_type'] == 2) { echo "checked"; } ?> >
                              Money check/order
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="paypal_section">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Transaction ID:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="transaction_id" id="transaction_id" value="<?= $little_morart[0]['transaction_id']; ?>">
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Transaction Date:</label>
                            <input style="width: 65%;" type="date" class="form-control form-control-sm" name="transaction_date" id="transaction_date" value="<?= $little_morart[0]['transaction_date']; ?>" max="<?= date('Y-m-d'); ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="order_section" style="display: none;">
                      <div class="row">
                        <div class="offset-6 col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Payment Code:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="payment_code" id="payment_code" value="<?= $little_morart[0]['payment_code']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>            
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group flex-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_little_morarts px-4 py-2" style="background: #EEA400; border: none; border-radius: 16px; width: 100%;" value="Submit">
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
              </form>
            <!-- </div> -->
        </div>    
      </div><!--/ row --> 

    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#student_time').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/activeapplication/update_little_morarts_application',
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
                window.location.href = '<?= site_url(); ?>admin/activeapplication/index';
              }, 600);
            }
            
          }
        })
      }else{
        toastr.warning('Please fill all fields correctly.');
        return;
      }
      
    });

    $('#special_request').change(function() {
      if(this.checked){
        $('#special_section').show()
      }else{
        $('#special_section').hide()
      }
    })
    $('#isonline').change(function() {
      if(this.checked){
        $('#online_video_section').show()
      }else{
        $('#online_video_section').hide()
      }
    })
    $("input[name='performance_type']").click(function(){
      if($('#solo').is(':checked')){
        $('#solo_section').hide()
      }else{
        $('#solo_section').show()
      }
    })
    
    $("input[name='payment_type']").click(function(){
      if($('#paypal').is(':checked')){
        $('#paypal_section').show()
        $('#order_section').hide()
      }else{
        $('#paypal_section').hide()
        $('#order_section').show()
      }
    })

    // var deadline = new Date($('#audition_deadline').val());
    // var current_date = new Date();
    // if((deadline - current_date) < 0){

    // }
  });
</script>