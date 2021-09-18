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
                    <div class="col-12 col-md-12" style="text-align: right;">
                      <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_crescendo px-4" style="background: #EEA400; border: none; border-radius: 8px;" value="Backup DB">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive px-1">  
                        <table id='db_list' class='table table-bordered table-striped text-center'>
                          <thead>
                            <tr style="background: #EEA400; color: white;">
                              <th>No</th>
                              <th>Name</th>
                              <th>Download</th>
                              <th>Created Date</th>
                              <th width="10%">Action</th>
                            </tr>
                          </thead>
                        </table>
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
        var formData = new FormData(this);
        $.ajax({
          url: '<?= site_url(); ?>admin/backup_db/db_backup',
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
                window.location.href = '<?= site_url(); ?>admin/backup_db/index';
              }, 600);
            }
            
          }
        })
    });
    init_db_list(filter = '');
    $('#db_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/backup_db/delete_db',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_db_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });
    function init_db_list(filter){
      $('#db_list').DataTable({
        'fixedHeader': {
          header: true
        },
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/backup_db/get_db_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'no' },
           { data: 'name' },
           { data: 'download'},
           { data: 'created_at' },
           { data: 'action', "width": "10%"},
        ]
      });
    }

  });
</script>