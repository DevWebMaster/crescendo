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
        <div class="col-12 text-center">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group mb-2" style="text-align: left;">
                <label for="" class="control-label mb-1">Parent Name</label>:
                <input type="text" class="form-control form-control-sm" name="filter" id="filter">
              </div>
            </div>
            <div class="col-12 col-md-1" style="text-align: left; padding-left: 0px !important;">
              <div class="form-group mt-4">
                <button class="btn btn-sm" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter"><i class="fa fa-search" style="font-size: 20px;"></i></button>
              </div>
            </div>
            <div class="offset-4 col-12 col-md-1">
              <div class="form-group mt-4">
                <a class="btn add_new float-right" style="background: #EEA400; color: white;" id="add_new" href="<?= site_url(); ?>admin/account/add_parent">Add New</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='parent_list' class='table table-bordered table-striped text-center'>
                  <thead>
                    <tr style="background: #EEA400; color: white;">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Country</th>
                      <th>Supervisor</th>
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
    init_parent_list(filter = '');

    $('#parent_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/account/delete_parent',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_parent_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_parent_list(filter);
    })

    function init_parent_list(filter){
      $('#parent_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/account/get_parent_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'name' },
           { data: 'email' },
           { data: 'country' },
           { data: 'supervisor' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>