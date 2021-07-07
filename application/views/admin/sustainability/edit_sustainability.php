<div class="content-wrapper">
    <section class="content">
      <label><h3><?= $title; ?></h3></label>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form method="post" enctype="multipart/form-data" id="uploadForm">
            <input type="hidden" name="edit_sustainability_id" id="edit_sustainability_id" value="<?= $edit_sustainability_id; ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-2 offset-5" style="justify-content: center;">
                  <img src="<?= site_url(); ?>/assets/img/default.png">
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>sustainability Name</label>:
                    <input type="text" class="form-control form-control-sm" name="sustainability_name" id="sustainability_name" value="<?= $sustainability_info['name'] ? $sustainability_info['name'] : '' ?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">sustainability Image</label>:
                    <input type="file" class="form-control form-control-sm" name="edit_imageToUpload" id="edit_imageToUpload">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Status</label>:<br>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="active" value="active">&nbsp;&nbsp;Active
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="deactive" value="deactive">&nbsp;&nbsp;De-active
                    </label>
                    <input type="hidden" name="flag_image" id="flag_image" value="0">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="col-12 col-md-2 offset-10">
                <div class="form-group mt-4">
                  <input type="submit" class="btn btn-sm btn-info update_sustainability px-3" value="Update">
                  <a type="button" class="btn btn-sm btn-danger cancel px-3" id="cancel" href="<?= site_url(); ?>admin/sustainability/index">Cancel</a>
                </div>
              </div>
            </div>
            </form>
            <input type="hidden" id="sustainability_status" value="<?= $sustainability_info['status']; ?>">
          </div>
        </div>    
      </div><!--/ row --> 

    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit_imageToUpload').click(function () {
      $('#flag_image').val(1);
    })
    var sustainability_status = $('#sustainability_status').val();
    if(sustainability_status == 1)
      $('#active').attr('checked', 'checked')
    else
      $('#deactive').attr('checked', 'checked')
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#sustainability_name').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/sustainability/update_sustainability',
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
                window.location.href = '<?= site_url();?>admin/sustainability/index';
              }, 600)
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