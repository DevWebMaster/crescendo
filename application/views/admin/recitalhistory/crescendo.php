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
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='application_list' class='table table-bordered table-striped text-center'>
                  <thead>
                    <tr style="background: #EEA400; color: white;">
                      <th>ID</th>
                      <th>Student Name</th>
                      <th>Composition</th>
                      <th>Title</th>
                      <th>Paid/Unpaid</th>
                      <th>Student time</th>
                      <th>Score</th>
                      <th>Place</th>
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
    init_application_list(filter = '');


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
            'url':'<?= site_url(); ?>admin/history/get_crescendo_application_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'student_name' },
           { data: 'composition' },
           { data: 'title' },
           { data: 'is_paid' },
           { data: 'student_time' },
           { data: 'score' },
           { data: 'place' },
        ]
      });
    }
  })
</script>