<div class="content-wrapper">
    <section class="content">
      <label><h3><?= $title; ?></h3></label>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form method="post" enctype="multipart/form-data" id="uploadForm">
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
                    <input type="text" class="form-control form-control-sm" name="sub_category_name" id="sub_category_name">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Sub Category Image</label>:
                    <input type="file" class="form-control form-control-sm" name="imageToUpload" id="imageToUpload">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Parent Category</label>:<br>
                    <select class="form-control form-control-sm" tabindex="1" name="parent_category" id="parent_category">
                      <?php foreach ($parent_category as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="col-12 col-md-2 offset-10">
                <div class="form-group mt-4">
                  <input type="submit" class="btn btn-sm btn-info add_sub_category px-4" value="Add">
                  <a type="button" class="btn btn-sm btn-danger cancel px-4" id="cancel" href="<?= site_url(); ?>admin/sub_category/index">Cancel</a>
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
      if($('#sub_category_name').val() && $('#imageToUpload').val()){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/sub_category/save_sub_category',
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
                window.location.href = '<?= site_url(); ?>admin/sub_category/index';
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