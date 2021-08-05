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
        <div class="col-12 col-md-6 col-xs-12">
          <label for="" class="control-label mb-1 pl-1"></label>
          <div class="form-group mb-2" style="text-align: left;">
            
            <div style="display: flex;">
              <input type="text" class="form-control form-control-sm ml-1" name="filter" id="filter" placeholder="Search...">
              <button class="btn btn-sm ml-3" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter"><i class="fa fa-search" style="font-size: 20px;"></i></button>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-5"></div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
            <div class="table-responsive px-1">  
              <table id='application_list' class='table table-bordered table-striped text-center'>
                <thead>
                  <tr style="background: #EEA400; color: white;">
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Age</th>
                    <th>Level</th>
                    <th>Teacher Name</th>
                    <th>Composition</th>
                    <th>Instrument</th>
                    <th>Composer</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Paid/Unpaid</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Special Need</th>
                    <th>Score</th>
                    <th>Place</th>
                    <th>Evaluation</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
              </table>
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
    init_application_list(filter = '');

    $('#application_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/activeapplication/delete_little_morarts',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_application_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_application_list(filter);
    })

    function init_application_list(filter){
      $('#application_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/activeapplication/get_little_morarts_application_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'student_name' },
           { data: 'student_age' },
           { data: 'level' },
           { data: 'teacher_name' },
           { data: 'composition' },
           { data: 'instrument' },
           { data: 'composer' },
           { data: 'title' },
           { data: 'student_time' },
           { data: 'is_paid' },
           { data: 'payment_type' },
           { data: 'payment_status' },
           { data: 'special_need' },
           { data: 'score' },
           { data: 'place' },
           { data: 'evaluation' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>