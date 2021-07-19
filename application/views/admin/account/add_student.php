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
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" placeholder="Student Name(First Last)*">
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
                        <input type="text" class="form-control form-control-sm" name="student_address" id="student_address" placeholder="Student Address(City, State/Province, Zipcode)*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="date" class="form-control form-control-sm" name="student_birthday" id="student_birthday" placeholder="Date of Birth*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="student_phone_num" id="student_phone_num" placeholder="Student phone number*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="student_email" id="student_email" placeholder="Student's email*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-sm" name="student_description" id="student_description" placeholder="Winning years in Crescendo Competition*">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <select class="form-control" name="teacher" id="teacher">
                        <?php
                          foreach($teachers as $teacher):
                        ?>
                          <option value="<?= $teacher['id']; ?>"><?= $teacher['username'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row" style="align-items: center;">
                    <div class="col-12 col-md-12 mt-2" style="display: inline-flex;">
                      <p>If you can't look for the teacher you like, please add new teacher who you want.</p>
                      <button class="btn btn-sm btn-info add_teacher px-2 ml-2" data-toggle="modal" data-target="#add_teacher_modal" style="border: none;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Teacher</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_student px-4 py-2" style="background: #EEA400; border: none; width: 100%; font-size: 24px;" value="Register">
                        <!-- <a type="button" class="btn btn-sm btn-danger cancel px-4" id="cancel" href="<?= site_url(); ?>admin/account/index">Back</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>    
      </div><!--/ row --> 
      <!--------  modal ----------> 
      <div class="modal fade" id="add_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="add_teacher_modalLabel">
      <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="add_teacher_modalLabel">Add Teacher</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-sm" name="m_teacher_name" id="m_teacher_name" placeholder="Teacher Name(First Last)*">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-5">
                  <div class="form-group mb-2">
                    <select class="form-control" name="m_add_country" id="m_add_country">
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
                    <input type="text" class="form-control form-control-sm" name="m_teacher_address" id="m_teacher_address" placeholder="Teacher Address(City, State/Province, Zipcode)*">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-sm" name="m_teacher_phone_num" id="m_teacher_phone_num" placeholder="Teacher phone number*">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-sm" name="m_teacher_email" id="m_teacher_email" placeholder="Teacher's email*">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-sm" name="m_teacher_description" id="m_teacher_description" placeholder="Winning years in Crescendo Competition*">
                  </div>
                </div>
              </div>  

          </div><!--/body -->
          <div class="modal-footer">
            <input type="hidden" id="add_teacher_id">
            <button type="button" class="btn btn-info" id="btn_save" data-dismiss="modal" style="background: #EEA400; border: none;">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div><!--/footer -->
      </div>
      </div>
      </div>
      <!---------modal---------->
    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#student_name').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/account/save_student',
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

    $('#btn_save').click(function(){
      var m_teacher_name = $('#m_teacher_name').val()
      var m_add_country = $('#m_add_country').val()
      var m_teacher_address = $('#m_teacher_address').val()
      var m_teacher_phone_num = $('#m_teacher_phone_num').val()
      var m_teacher_email = $('#m_teacher_email').val()
      var m_teacher_description = $('#m_teacher_description').val()
      $.ajax({
        url: '<?= site_url(); ?>admin/account/add_teacher_of_student',
          type: 'POST',
          data: {
            m_teacher_name: m_teacher_name, 
            m_add_country: m_add_country, 
            m_teacher_address: m_teacher_address,
            m_teacher_phone_num: m_teacher_phone_num,
            m_teacher_email: m_teacher_email,
            m_teacher_description: m_teacher_description
          },       
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
                window.location.href = '<?= site_url(); ?>admin/account/add_student';
              }, 600);
            }
            
          }
      })
    })

  });
</script>