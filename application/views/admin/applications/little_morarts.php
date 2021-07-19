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
        <h4 class="ml-3">Auditions</h4>
        <div class="col-12 text-center">
          <div class="row" style="align-items: center;">
            <div class="col-12 col-md-6">
              <div class="form-group mb-2" style="text-align: left;">
                <input type="text" class="form-control form-control-sm" name="audition_filter" id="audition_filter" placeholder="Audition Name">
              </div>
            </div>
            <div class="col-12 col-md-1" style="text-align: left; padding-left: 0px !important;">
              <div class="form-group mt-2">
                <button class="btn btn-sm" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter"><i class="fa fa-search" style="font-size: 20px;"></i></button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='audition_list' class='table table-bordered table-striped text-center'>
                  <thead>
                    <tr style="background: #EEA400; color: white;">
                      <th>ID</th>
                      <th>Local Admin</th>
                      <th>Audition Name</th>
                      <th>Audition Location</th>
                      <th>Audition Date</th>
                      <th>Audition Fee</th>
                      <th>Audition Deadline</th>
                      <th>Late Fee</th>
                      <th>Duration</th>
                      <th>Is Active</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <h4 class="ml-3">Recitals</h4>
        <div class="col-12 text-center">
          <div class="row" style="align-items: center;">
            <div class="col-12 col-md-6">
              <div class="form-group mb-2" style="text-align: left;">
                <input type="text" class="form-control form-control-sm" name="recital_filter" id="recital_filter" placeholder="Recital Name">
              </div>
            </div>
            <div class="col-12 col-md-1" style="text-align: left; padding-left: 0px !important;">
              <div class="form-group mt-2">
                <button class="btn btn-sm" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter_recital"><i class="fa fa-search" style="font-size: 20px;"></i></button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='recital_list' class='table table-bordered table-striped text-center'>
                  <thead>
                    <tr style="background: #EEA400; color: white;">
                      <th>ID</th>
                      <th>Local Admin</th>
                      <th>Audition Name</th>
                      <th>Audition Location</th>
                      <th>Audition Date</th>
                      <th>Audition Fee</th>
                      <th>Audition Deadline</th>
                      <th>Late Fee</th>
                      <th>Duration</th>
                      <th>Is Active</th>
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
    init_audition_list(filter = '');

    $('#audition_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/applications/delete_audition',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_audition_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_audition_list(filter);
    })

    function init_audition_list(filter){
      $('#audition_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/applications/get_audition_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'local_admin' },
           { data: 'audition_name' },
           { data: 'audition_location' },
           { data: 'audition_date' },
           { data: 'audition_fee' },
           { data: 'audition_deadline' },
           { data: 'late_fee' },
           { data: 'duration' },
           { data: 'is_active' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
    init_recital_list(filter = '');

    $('#recital_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/applications/delete_recital',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_recital_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_recital_list(filter);
    })

    function init_recital_list(filter){
      $('#recital_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/applications/get_recital_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'local_admin' },
           { data: 'audition_name' },
           { data: 'audition_location' },
           { data: 'audition_date' },
           { data: 'audition_fee' },
           { data: 'audition_deadline' },
           { data: 'late_fee' },
           { data: 'duration' },
           { data: 'is_active' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>