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
        <div class="col-md-3 ml-1">
          <div class="radio" style="display: flex; justify-content: space-between; padding-bottom: 8px;">
            <label>
                <input type="radio" name="little_morarts" id="auditions1" value="1">
                Auditions
            </label>
            <label>
                <input type="radio" name="little_morarts" id="recitals" value="2">
                Recitals
            </label>
          </div>
        </div>
      </div>
      <div class="row" id="auditions_section" style="display: none;">
        <h4 class="ml-3 pl-1">Auditions</h4>
        <div class="col-12 text-center">
          <div class="row" style="align-items: center;">
            <div class="col-12 col-md-3">
              <div class="form-group mb-2 pl-1" style="text-align: left;">
                <input type="text" class="form-control form-control-sm" name="filter" id="filter" placeholder="Search...">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group mb-2 pl-1">
                <input type="number" min="0" max="29" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="greater" id="greater" placeholder="Score: Greater than">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group mb-2 pl-1">
                <input type="number" min="0" max="30" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="less" id="less" placeholder="Score: Less than">
              </div>
            </div>
            <div class="col-12 col-md-1" style="text-align: left; padding-left: 0px !important;">
              <div class="form-group mt-2">
                <button class="btn btn-sm" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter"><i class="fa fa-search" style="font-size: 20px;"></i></button>
              </div>
            </div>
            <!-- <div class="col-12 col-md-2"></div> -->
            <div class="col-12 col-md-1">
              <div class="form-group mt-2" style="display: flex;">
                <a class="pull-right btn btn-warning btn-large" style="color: white;" href="<?php echo site_url(); ?>admin/applications/export_to_excel_little_morarts"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                <button class="pull-right btn btn-warning btn-large ml-2" style="color: white;" data-toggle="modal" data-target="#upload_little_morarts"><i class="fa fa-file-excel-o"></i> Import from Excel</button>
              </div>
            </div>
            <?php $this->load->view('admin/applications/upload_little_morarts_modal');?>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='audition_list' class='table table-bordered table-striped text-center'>
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
                      <th>Applied By</th>
                      <th>Applied Date</th>
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
        </div>
      </div>
      <div class="row" id="recitals_section" style="display: none;">
        <h4 class="ml-3 pl-1">Recitals</h4>
        <div class="col-12 text-center">
          <div class="row" style="align-items: center;">
            <div class="col-12 col-md-3">
              <div class="form-group mb-2 pl-1" style="text-align: left;">
                <input type="text" class="form-control form-control-sm" name="recital_filter" id="recital_filter" placeholder="Recital Name">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group mb-2 pl-1">
                <input type="number" min="0" max="29" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="greater_recital" id="greater_recital" placeholder="Score: Greater than">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group mb-2 pl-1">
                <input type="number" min="0" max="30" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="less_recital" id="less_recital" placeholder="Score: Less than">
              </div>
            </div>
            <div class="col-12 col-md-1" style="text-align: left; padding-left: 0px !important;">
              <div class="form-group mt-2">
                <button class="btn btn-sm" style="background: #EEA400; color: white; border-radius: 50%; height: 35px;" id="btn_filter_recital"><i class="fa fa-search" style="font-size: 20px;"></i></button>
              </div>
            </div>
            <!-- <div class="col-12 col-md-2"></div> -->
            <div class="col-12 col-md-1">
              <div class="form-group mt-2" style="display: flex;">
                <a class="pull-right btn btn-warning btn-large" style="color: white;" href="<?php echo site_url(); ?>admin/applications/export_to_excel_recital_little_morarts"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                <button class="pull-right btn btn-warning btn-large ml-2" style="color: white;" data-toggle="modal" data-target="#upload_recital_little_morarts"><i class="fa fa-file-excel-o"></i> Import from Excel</button>
              </div>
            </div>
            <?php $this->load->view('admin/applications/upload_recital_little_morarts_modal');?>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='recital_list' class='table table-bordered table-striped text-center'>
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
                      <th>Applied By</th>
                      <th>Applied Date</th>
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
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){
    $("input[name='little_morarts']").click(function(){
      if($('#recitals').is(':checked')){
        sessionStorage.setItem('type', 2)
        $('#auditions_section').hide()
        $('#recitals_section').show()
      }else {
        sessionStorage.setItem('type', 1)
        $('#auditions_section').show()
        $('#recitals_section').hide()
      }
    })
    var type = sessionStorage.getItem("type");
    if(type == '2'){
      $('#auditions_section').hide()
      $('#recitals_section').show()
      $('#recitals').prop('checked', "checked")
    }else {
      $('#auditions_section').show()
      $('#recitals_section').hide()
      $('#auditions1').prop('checked', "checked")
    }
    init_audition_list(filter = '', greater = '', less = '');

    $('#audition_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/applications/delete_little_morarts',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_audition_list(filter = '', greater = '', less = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      var greater = $('#greater').val();
      var less = $('#less').val();
      init_audition_list(filter, greater, less);
    })

    function init_audition_list(filter, greater, less){
      $('#audition_list').DataTable({
        'fixedHeader': {
          header: true
        },
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/applications/get_apply_little_morarts_list',
            'data': { filter: filter, greater: greater, less: less }
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
           { data: 'applied_by' },
           { data: 'applied_at' },
           { data: 'score' },
           { data: 'place' },
           { data: 'evaluation' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
    init_recital_list(filter_recital = '', greater_recital = '', less_recital = '');

    $('#recital_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/applications/delete_recital_little_morarts',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_recital_list(filter_recital = '', greater_recital = '', less_recital = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter_recital').click(function(){
      var filter_recital = $('#recital_filter').val();
      var greater_recital = $('#greater_recital').val();
      var less_recital = $('#less_recital').val();
      init_recital_list(filter, greater_recital, less_recital);
    })

    function init_recital_list(filter_recital, greater_recital, less_recital){
      $('#recital_list').DataTable({
        'fixedHeader': {
          header: true
        },
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/applications/get_recital_list',
            'data': { filter: filter_recital, greater: greater_recital, less: less_recital }
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
           { data: 'applied_by' },
           { data: 'applied_at' },
           { data: 'score' },
           { data: 'place' },
           { data: 'evaluation' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>