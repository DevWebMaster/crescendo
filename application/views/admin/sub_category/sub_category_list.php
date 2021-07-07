<div class="content-wrapper">
    <section class="content">
      <label><h3><?= $title; ?></h3></label>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="col-md-12" style="display: inline-flex;">
                  <div class="col-12 col-md-2">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1">Sub Category Name</label>:
                      <input type="text" class="form-control form-control-sm" name="filter_sub_category_name" id="filter_sub_category_name">
                    </div>
                  </div>
                  <div class="col-12 col-md-2">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1">Parent Category</label>:
                      <select class="form-control form-control-sm" tabindex="1" name="filter_category" id="filter_category">
                        <?php foreach ($parent_category as $key => $value) { ?>
                          <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-2">
                    <div class="form-group mt-4">
                      <input type="button" class="btn btn-sm btn-info add_label_no px-5" id="filter" value="filter">
                    </div>
                  </div>
                  
                </div>
                
              </form>
            </div>
          </div>
        </div>    
      </div><!--/ row --> 

        
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <a class="btn btn-info new_sub_category float-right" id="new_sub_category" href="<?= site_url(); ?>admin/sub_category/add_sub_category">New Sub Category</a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">  
                    <table id='sub_category_list' class='table table-bordered table-striped text-center'>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Sub Category Name</th>
                          <th>Parent Category</th>
                          <th>Sub Category Image</th>
                          <th>Created Date</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </section>  
</div>
<style type="text/css">
  
    #sub_category_list td, th {
      vertical-align: middle !important;
    }
  
</style>
<script type="text/javascript">
  $(document).ready(function() {
    init_sub_category_list(filter_name = '', filter_category = '');

    $('#sub_category_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/sub_category/delete_sub_category',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_sub_category_list(filter_name = '', filter_category = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#filter').click(function(){
      var filter_name = $('#filter_sub_category_name').val();
      var filter_category = $('#filter_category').val();
      init_sub_category_list(filter_name, filter_category);
    })

    function init_sub_category_list(filter_name, filter_category){
      $('#sub_category_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/sub_category/get_sub_category_list',
            'data': { filter_name: filter_name, filter_category: filter_category }
        },
        'columns': [
           { data: 'id' },
           { data: 'name' },
           { data: 'parent_category' },
           { data: 'image' },
           { data: 'created_date' },
           { data: 'action', "width": "10%"},
        ]
      });
    }

  });
</script>