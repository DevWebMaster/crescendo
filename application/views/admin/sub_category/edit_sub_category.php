<div class="content-wrapper">
    <section class="content">
      <label><h3><?= $title; ?></h3></label>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form method="post" enctype="multipart/form-data" id="uploadForm">
            <input type="hidden" name="edit_sub_category_id" id="edit_sub_category_id" value="<?= $edit_sub_category_id; ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-2 offset-5" style="justify-content: center;">
                  <img src="<?= site_url(); ?>/assets/img/default.png">
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Sub Category Name</label>:
                    <input type="text" class="form-control form-control-sm" name="sub_category_name" id="sub_category_name" value="<?= $sub_category_info['name'] ? $sub_category_info['name'] : '' ?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Sub Category Image</label>:
                    <input type="file" class="form-control form-control-sm" name="edit_imageToUpload" id="edit_imageToUpload">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Parent Category</label>:<br>
                    <select class="form-control form-control-sm" tabindex="1" name="parent_category" id="parent_category">
                      <?php foreach ($parent_category as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $sub_category_info['category_id']) { echo "selected"; } ?> ><?= $value['name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="flag_image" id="flag_image" value="0">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="col-12 col-md-2 offset-10">
                <div class="form-group mt-4">
                  <input type="submit" class="btn btn-sm btn-info update_sub_category px-3" value="Update">
                  <a type="button" class="btn btn-sm btn-danger cancel px-3" id="cancel" href="<?= site_url(); ?>admin/sub_category/index">Cancel</a>
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
    $('#edit_imageToUpload').click(function () {
      $('#flag_image').val(1);
    })

    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#sub_category_name').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/sub_category/update_sub_category',
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
                window.location.href = '<?= site_url();?>admin/sub_category/index';
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