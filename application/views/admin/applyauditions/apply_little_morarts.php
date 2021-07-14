<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="offset-1 col-md-10">
            <label><h3><?= $title; ?></h3></label>
            <div class="card">
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-8">
                      <div class="form-group mb-2">
                        <label class="title">Audition Name:</label>
                        <input type="text" readonly class="form-control form-control-sm" name="audition_name" id="audition_name" value="<?= $little_morart[0]['audition_name']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label class="title">Available for Application:</label>
                        <input type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['is_active'] ? 'Open' : 'Close'; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-8">
                      <div class="form-group mb-2">
                        <label class="title">Audition Location:</label>
                        <input type="text" readonly class="form-control form-control-sm" name="audition_location" id="audition_location" value="<?= $little_morart[0]['audition_location']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label class="title">Audition Date:</label>
                        <input type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['audition_date']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label class="title">Student Name:</label>
                        <select class="form-control" name="student_name" id="student_name">
                          <?php
                            foreach($students as $student):
                          ?>
                            <option value="<?= $student['id']; ?>"><?= $student['username'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-8">
                      <div class="form-group mb-2">
                        <label class="title">Instrument:</label>
                        <select class="form-control" name="instrument" id="instrument">
                          <?php
                            foreach($instruments as $instrument):
                          ?>
                            <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label>Student Time:</label>
                        <input type="number" class="form-control form-control-sm" name="student_time" id="student_time">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <!-- <label>Special Request:</label> -->
                        <input type="checkbox" name="special_request" id="special_request"> Special Request
                      </div>
                    </div>
                  </div>
                  <div id="special_section" style="display: none;">
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <label class="title">Request Date:</label>
                          <input type="date" class="form-control form-control-sm" name="request_date" id="request_date">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <label class="title">Request Need:</label>
                          <input type="text" class="form-control form-control-sm" name="request_need" id="request_need" placeholder="ex. help for handicap, or autistic students">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
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
                        </label>
                        <label>
                            <input type="radio" name="performance_type" id="duet" value="2">
                            Duet (USD <?= $little_morart[0]['fee_duet'] ?>)
                        </label>
                        <label>
                            <input type="radio" name="performance_type" id="trio" value="3">
                            Trio (USD <?= $little_morart[0]['fee_trio'] ?>)
                        </label>
                        <label>
                            <input type="radio" name="performance_type" id="quarter" value="4">
                            Quartet (USD <?= $little_morart[0]['fee_quartet'] ?>)
                        </label>
                        <label>
                            <input type="radio" name="performance_type" id="ensemble" value="5">
                            Ensemble(5 participants) (USD <?= $little_morart[0]['fee_ensemble'] ?>)
                        </label>
                      </div>
                    </div>
                  </div>
                  <div id="solo_section" style="display: none;">
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <label class="title">Co_performers:</label>
                          <input type="text" class="form-control form-control-sm" name="co_performers" id="co_performers">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label class="title">Composer:</label>
                        <input type="text" class="form-control form-control-sm" name="composer" id="composer">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label class="title">Title:</label>
                        <input type="text" class="form-control form-control-sm" name="title" id="title">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label class="title">Teacher:</label>
                        <select class="form-control" name="teacher" id="teacher">
                          <?php
                            foreach($teachers as $teacher):
                          ?>
                            <option value="<?= $teacher['id']; ?>"><?= $teacher['username'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-2">
                      <div class="form-group mb-2">
                        <label style="font-weight: bold;">Late Fee</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-8">
                      <div class="form-group mb-2">
                        <label class="title">Application Deadline</label>
                        <input type="date" readonly class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" value="<?= $little_morart[0]['audition_deadline']; ?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="form-group mb-2">
                        <label class="title">Audition Fee</label>
                        <input type="number" readonly class="form-control form-control-sm" name="late_fee" id="late_fee" value="<?= $little_morart[0]['late_fee']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label class="title">Total Price:</label>
                        <input type="text" readonly class="form-control form-control-sm" name="total_price" id="total_price">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <label class="title">Payment</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="radio" style="display: flex; justify-content: space-around; padding-bottom: 8px;">
                        <label>
                            <input type="radio" name="payment_type" id="paypal" value="1" checked="checked">
                            Paypal
                        </label>
                        <label>
                            <input type="radio" name="payment_type" id="order_check" value="2">
                            Money check/order
                        </label>
                      </div>
                    </div>
                  </div>
                  <div id="paypal_section">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="form-group mb-2">
                          <label class="title">Transaction ID:</label>
                          <input type="text" class="form-control form-control-sm" name="transaction_id" id="transaction_id">
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group mb-2">
                          <label class="title">Transaction Date:</label>
                          <input type="date" class="form-control form-control-sm" name="transaction_date" id="transaction_date">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="order_section" style="display: none;">
                    <div class="row">
                      <div class="offset-6 col-12 col-md-6">
                        <div class="form-group mb-2">
                          <label class="title">Payment Code:</label>
                          <input type="text" class="form-control form-control-sm" name="payment_code" id="payment_code">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_little_morarts px-4 py-2" style="background: #EEA400; border: none; border-radius: 16px; width: 100%;" value="Submit">
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
          url: '<?= site_url(); ?>admin/auditions/save_little_morarts',
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
                window.location.href = '<?= site_url(); ?>admin/auditions/index';
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
  });
</script>