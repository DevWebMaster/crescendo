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
                      <label for="" class="control-label mb-1">Benefits Name</label>:
                      <input type="text" class="form-control form-control-sm" name="filter_benefits_name" id="filter_benefits_name">
                    </div>
                  </div>
                  <div class="col-12 col-md-2">
                    <div class="form-group mb-2">
                      <label for="" class="control-label mb-1">Status</label>:
                      <select class="form-control form-control-sm" tabindex="1" name="filter_status" id="filter_status">
                          <option value="2">All</option>
                          <option value="1">Active</option>
                          <option value="0">De-active</option>
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
                  <a class="btn btn-info new_benefits float-right" id="new_benefits" href="<?= site_url(); ?>admin/benefits/add_benefits">New Benefits</a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">  
                    <table id='benefits_list' class='table table-bordered table-striped text-center'>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Benefits Name</th>
                          <th>Benefits Image</th>
                          <th>Status</th>
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
  
    #benefits_list td, th {
      vertical-align: middle !important;
    }
  
</style>
<script type="text/javascript">
  $(document).ready(function() {
    init_benefits_list(filter_name = '', filter_status = '');

    $('#benefits_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/benefits/delete_benefits',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_benefits_list(filter_name = '', filter_status = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#filter').click(function(){
      var filter_name = $('#filter_benefits_name').val();
      var filter_status = $('#filter_status').val();
      init_benefits_list(filter_name, filter_status);
    })

    function init_benefits_list(filter_name, filter_status){
      $('#benefits_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/benefits/get_benefits_list',
            'data': { filter_name: filter_name, filter_status: filter_status }
        },
        'columns': [
           { data: 'id' },
           { data: 'name' },
           { data: 'image' },
           { data: 'status' },
           { data: 'created_date' },
           { data: 'action', "width": "10%"},
        ]
      });
    }

  });
</script>