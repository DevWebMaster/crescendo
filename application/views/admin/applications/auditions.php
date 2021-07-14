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
        <h4 class="ml-3">Little Morarts</h4>
        <div class="col-12 text-center">
          <div class="row" style="align-items: center;">
            <div class="col-12 col-md-6">
              <div class="form-group mb-2" style="text-align: left;">
                <input type="text" class="form-control form-control-sm" name="little_morarts_filter" id="little_morarts_filter" placeholder="Little Morarts Name">
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
                <table id='little_morarts_list' class='table table-bordered table-striped text-center'>
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
        <h4 class="ml-3">Crescendo</h4>
        <div class="col-12 text-center">
          <div class="row" style="align-items: center;">
            <div class="col-12 col-md-6">
              <div class="form-group mb-2" style="text-align: left;">
                <input type="text" class="form-control form-control-sm" name="crescendo_filter" id="crescendo_filter" placeholder="Crescendo Name">
              </div>
            </div>
            <div class="col-12 col-md-1" style="text-align: left; padding-left: 0px !important;">
              <div class="form-group mt-2">
                <button class="btn btn-sm" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter_crescendo"><i class="fa fa-search" style="font-size: 20px;"></i></button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='crescendo_list' class='table table-bordered table-striped text-center'>
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
    init_little_morarts_list(filter = '');

    $('#little_morarts_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/auditions/delete_little_morarts',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_little_morarts_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_little_morarts_list(filter);
    })

    function init_little_morarts_list(filter){
      $('#little_morarts_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/auditions/get_little_morarts_list',
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
    init_crescendo_list(filter = '');

    $('#crescendo_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/auditions/delete_crescendo',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_crescendo_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_crescendo_list(filter);
    })

    function init_crescendo_list(filter){
      $('#crescendo_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/auditions/get_crescendo_list',
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