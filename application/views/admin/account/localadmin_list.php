<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title; ?></h1>
        </div><!-- /.col -->
        <!--div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><?= trans('home') ?></a></li>
            <li class="breadcrumb-item active"><?= trans('dashboard') ?></li>
          </ol>
        </div--><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-12 col-md-6 col-xs-12">
              <label for="" class="control-label mb-1 pl-1">Local Admin Name</label>:
              <div class="form-group mb-2" style="text-align: left;">
                
                <div style="display: flex;">
                  <input type="text" class="form-control form-control-sm ml-1" name="filter" id="filter">
                  <button class="btn btn-sm ml-3" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter"><i class="fa fa-search" style="font-size: 20px;"></i></button>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-5"></div>
            <div class="col-12 col-md-1 col-xs-12">
              <div class="form-group mt-4">
                <a class="btn add_new float-right" style="background: #EEA400; color: white;" id="add_new" href="<?= site_url(); ?>admin/account/add_teacher">Add New</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='localadmin_list' class='table table-bordered table-striped text-center'>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Note</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){
    init_localadmin_list(filter = '');

    $('#localadmin_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/account/delete_localadmin',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_localadmin_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_localadmin_list(filter);
    })

    function init_localadmin_list(filter){
      $('#localadmin_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/account/get_localadmin_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'name' },
           { data: 'email' },
           { data: 'address' },
           { data: 'mobile_no' },
           { data: 'note' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>