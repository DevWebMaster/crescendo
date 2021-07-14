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
                        <input type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" placeholder="Teacher Name(First Last)*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-5">
                      <div class="form-group mb-2">
                        <select class="form-control" name="add_country" id="add_country">
                          <?php
                            foreach($countries as $country):
                          ?>
                            <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-7">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" placeholder="Teacher Address(City, State/Province, Zipcode)*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="teacher_phone_num" id="teacher_phone_num" placeholder="Teacher phone number*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" placeholder="Teacher's email*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="teacher_description" id="teacher_description" placeholder="Winning years in Crescendo Competition*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <select class="form-control" name="student" id="student">
                        <?php
                          foreach($students as $student):
                        ?>
                          <option value="<?= $student['id']; ?>"><?= $student['username'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12 mt-2" style="display: inline-flex;">
                      <p>If you can't look for the student you like, please add new student who you want.</p>
                      <input type="button" class="btn btn-sm btn-info add_teacher px-2 ml-2" value="Add Student" style="background: #EEA400; border: none;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_teacher px-4 py-2" style="background: #EEA400; border: none; width: 100%; font-size: 24px;" value="Register">
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
      if($('#teacher_name').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/account/save_teacher',
          type: 'POST',
          data: formData,       
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            var result = JSON.parse(response);
            if(!result.status){
              toastr.warning('Saving the data is failed.');
            }else{
              toastr.success('The data is saved successfully.');
              setTimeout(function(){
                window.location.href = '<?= site_url(); ?>admin/account/index';
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