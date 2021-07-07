<div class="content-wrapper">
    <section class="content">
      <label><h3><?= $title; ?></h3></label>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form method="post" enctype="multipart/form-data" id="uploadForm">
            <input type="hidden" name="edit_product_id" id="edit_product_id" value="<?= $edit_product_id; ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-2 offset-5" style="justify-content: center;">
                  <img src="<?= site_url(); ?>/assets/img/default.png">
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Category</label>:
                      <select class="form-control form-control-sm" tabindex="1" name="parent_category" id="parent_category">
                        <?php foreach ($parent_category as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $product_info['category_id']) { echo "selected"; } ?> ><?= $value['name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Sub Category</label>:
                      <select class="form-control form-control-sm" tabindex="1" name="sub_category_ids" id="sub_category_ids">
                        <?php foreach ($sub_category as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $product_info['sub_category_id']) { echo "selected"; } ?> ><?= $value['name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Sub Sub Category</label>:
                      <select class="form-control form-control-sm" tabindex="1" name="sub_sub_category_ids" id="sub_sub_category_ids">
                        <?php foreach ($sub_sub_category as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $product_info['sub_sub_category_id']) { echo "selected"; } ?> ><?= $value['name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Sustainability</label>:
                      <select name="sustainability_ids[]" class="form-control select2" multiple="multiple"  >
                          <?php 
                            foreach($sustainability_ids as $k =>$i) 
                              {   
                                  if($i['selected']==1):
                          ?>      
                                  <option selected value="<?= $i['value'] ?>"><?= $i['text'];?></option> 
                           <?php  else: ?>
                                  <option  value="<?= $i['value'] ?>"><?= $i['text'];?></option> 
                           <?php  endif;  ?>
                           <?php   } // end foreach ?>
                      </select>  
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Benefits</label>:
                      <select name="benefits_ids[]" class="form-control select2" multiple="multiple"  >
                          <?php 
                            foreach($benefits_ids as $k =>$i) 
                              {   
                                  if($i['selected']==1):
                          ?>      
                                  <option selected value="<?= $i['value'] ?>"><?= $i['text'];?></option> 
                           <?php  else: ?>
                                  <option  value="<?= $i['value'] ?>"><?= $i['text'];?></option> 
                           <?php  endif;  ?>
                           <?php   } // end foreach ?>
                      </select>   
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Material</label>:
                      <select class="form-control form-control-sm" tabindex="1" name="material_ids" id="material_ids">
                        <?php foreach ($material as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $product_info['material_id']) { echo "selected"; } ?> ><?= $value['name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Product Name</label>:
                    <input type="text" class="form-control form-control-sm" name="product_name" id="product_name" value="<?= $product_info['name'] ?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Product Image</label>:
                    <input type="file" class="form-control form-control-sm" name="edit_imageToUpload" id="edit_imageToUpload">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1">Status</label>:<br>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="active" value="active" checked>&nbsp;&nbsp;Active
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="deactive" value="deactive">&nbsp;&nbsp;De-active
                    </label>
                  </div>
                  <input type="hidden" name="flag_image" id="flag_image" value="0">
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Product Description</label>:
                    <textarea cols="5" class="form-control form-control-sm" name="description" id="description"><?= $product_info['description'] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Product Idea For</label>:
                    <input type="text" class="form-control form-control-sm" name="product_idea_for" id="product_idea_for" value="<?= $product_info['idea_for'] ?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Item Code</label>:
                    <input type="text" class="form-control form-control-sm" name="item_code" id="item_code" value="<?= $product_info['item_code'] ?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Product Short Description</label>:
                    <input type="text" class="form-control form-control-sm" name="product_short_description" id="product_short_description" value="<?= $product_info['short_desc'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-3">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Unit</label>:
                    <select class="form-control form-control-sm" tabindex="1" name="size_unit" id="size_unit">
                      <option value="0" <?php if (0 == $product_info['s_unit']) { echo "selected"; } ?> >Inch</option>
                      <option value="1" <?php if (1 == $product_info['s_unit']) { echo "selected"; } ?>>Oz</option>
                    </select>
                  </div>
                </div>
                  <div class="col-12 col-md-3" id="inch_mode1">
                    <div class="form-group mb-2">
                      <label class="control-label mb-1">Dimension<i style="color: red;">*</i></label>
                      <input type="number" min="0" oninput="validity.valid||(value='');" placeholder="length" class="form-control form-control-sm" name="length" id="length" value="<?= $product_info['length'] ?>" />
                    </div>
                  </div> <!-- /column -->       
                  <div class="col-12 col-md-3" id="inch_mode2">
                    <div class="form-group mb-2">
                      <label class="control-label mb-1">&nbsp;</label>
                      <input type="number" min="0" oninput="validity.valid||(value='');" placeholder="width" name="width" class="form-control form-control-sm" id="width" value="<?= $product_info['width'] ?>" />
                    </div>
                  </div> <!-- /column -->       
                  <div class="col-12 col-md-3" id="inch_mode3">
                    <div class="form-group mb-2">
                      <label class="control-label mb-1">&nbsp;</label>
                      <input type="number" min="0" oninput="validity.valid||(value='');" placeholder="height" name="height" class="form-control  form-control-sm" id="height" value="<?= $product_info['height'] ?>" />
                    </div>
                  </div> <!-- /column -->       
                  <div class="col-12 col-md-9" style="display: none;" id="oz_mode">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1"><i style="color: red;">*</i>Dimension</label>:
                      <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="size_oz" id="size_oz" value="<?= $product_info['size_oz'] ?>">
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2">
                    <label for="" class="control-label mb-1"><i style="color: red;">*</i>Product Pieces</label>:
                    <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="product_pieces" id="product_pieces" value="<?= $product_info['pieces'] ?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group mb-2 mt-4">
                    <input type="checkbox" name="is_lid" id="is_lid">&nbsp;&nbsp;Is Lid
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="col-12 col-md-2 offset-10">
                <div class="form-group mt-4">
                  <input type="submit" class="btn btn-sm btn-info update_product px-3" value="Update">
                  <a type="button" class="btn btn-sm btn-danger cancel px-3" id="cancel" href="<?= site_url(); ?>admin/product/index">Cancel</a>
                </div>
              </div>
            </div>
            </form>
            <input type="hidden" id="product_status" value="<?= $product_info['status']; ?>">
            <input type="hidden"id="lid_val" value="<?= $product_info['is_lid'] ?>">
          </div>
        </div>    
      </div><!--/ row --> 

    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2()
    if($('#lid_val').val() == 1)
      $('#is_lid').attr('checked', 'checked')

    $('#size_unit').change(function(){
      var size_unit = $('#size_unit').val()
      if(size_unit == 0){
        $('#inch_mode1').show();
        $('#inch_mode2').show();
        $('#inch_mode3').show();
        $('#oz_mode').hide();
      }else{
        $('#inch_mode1').hide();
        $('#inch_mode2').hide();
        $('#inch_mode3').hide();
        $('#oz_mode').show();
      }
    })
    $('#parent_category').change(function(){
      var category_id = $('#parent_category').val();
      $.ajax({
          url: '<?= site_url(); ?>admin/product/get_sub_category_ids',
          type: 'POST',
          data: {category_id: category_id},
          success: function(response){
            var result = JSON.parse(response);
            var sub_html = '';
            for(var i = 0; i < result.length; i++){
              sub_html += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
            }
            $('#sub_category_ids').html(sub_html);
          }
      })
    });
    $('#sub_category_ids').change(function(){
      var category_id = $('#parent_category').val();
      var sub_category_id = $('#sub_category_ids').val();
      $.ajax({
          url: '<?= site_url(); ?>admin/product/get_sub_sub_category_ids',
          type: 'POST',
          data: {category_id: category_id, sub_category_id: sub_category_id},
          success: function(response){
            var result = JSON.parse(response);
            var sub_sub_html = '';
            for(var i = 0; i < result.length; i++){
              sub_sub_html += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
            }
            $('#sub_sub_category_ids').html(sub_sub_html);
          }
      })
    });
    $('#edit_imageToUpload').click(function () {
      $('#flag_image').val(1);
    })
    var product_status = $('#product_status').val();
    if(product_status == 1)
      $('#active').attr('checked', 'checked')
    else
      $('#deactive').attr('checked', 'checked')

    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#product_name').val() && $('#description').val() && $('#product_idea_for').val() && $('#item_code').val() && $('#product_short_description').val() && $('#product_pieces').val() && (($('#length').val() && $('#width').val() && $('#height').val()) || $('#size_oz').val())){
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/product/update_product',
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
                window.location.href = '<?= site_url();?>admin/product/index';
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