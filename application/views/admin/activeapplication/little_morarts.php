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
        <div class="col-12 col-md-7 col-xs-12">
          <label for="" class="control-label mb-1 pl-1"></label>
          <div class="form-group mb-2" style="text-align: left;">
            
            <div style="display: flex;">
              <input type="text" class="form-control form-control-sm ml-1" name="filter" id="filter" placeholder="Search...">
              <?php
                if($this->session->userdata('admin_role_id') == 1):
              ?>
              <input type="number" min="0" max="29" oninput="validity.valid||(value='');" class="form-control form-control-sm ml-2" name="greater" id="greater" placeholder="Score: Greater than">
              <input type="number" min="0" max="30" oninput="validity.valid||(value='');" class="form-control form-control-sm ml-2" name="less" id="less" placeholder="Score: Less than">
              <?php
                endif;
              ?>
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
                    <th>Applied By</th>
                    <th>Applied Date</th>
                    <th>Score</th>
                    <th>Place</th>
                    <th>Evaluation</th>
                    <th>Recital</th>
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
    init_application_list(filter = '', greater = '', less = '');
    $('#application_list tbody').on('click', 'td button.print_button', function(){
      var encoded_contents = $(this).attr('contents');  
      var contentsToPrint = JSON.parse(encoded_contents);
      var instrument = contentsToPrint.other_instrument != '' ? contentsToPrint.other_instrument : contentsToPrint.instrument;
      var co_data = '';
      if(contentsToPrint.co_performers1 != '' && contentsToPrint.co_performers1 != null){
        co_data = '<div class="row" style="display: flex; align-item: center;"><p style="font-weight: bold;">Co performers:' + '</p><p style="text-indent: 200px; font-weight: bold;">' + 'Co Instrument: ' + '</p></div>'
          + '<div class="row" style="display: flex; align-item: center;"><p>' + contentsToPrint.co_performers1 + '</p><p style="text-indent: 200px;">' + contentsToPrint.co_instrument1 + '</p></div>';
      }
      if(contentsToPrint.co_performers2 != '' && contentsToPrint.co_performers2 != null){
        co_data += '<div class="row" style="display: flex; align-item: center;"><p>' + contentsToPrint.co_performers2 + '</p><p style="text-indent: 200px;">' + contentsToPrint.co_instrument2 + '</p></div>';
      }
      if(contentsToPrint.co_performers3 != '' && contentsToPrint.co_performers3 != null){
        co_data += '<div class="row" style="display: flex; align-item: center;"><p>' + contentsToPrint.co_performers3 + '</p><p style="text-indent: 200px;">' + contentsToPrint.co_instrument3 + '</p></div>';
      }
      var special_data = '';
      if(contentsToPrint.special_request == 1){
        special_data = '<div class="row" style="font-weight: bold;">Special Request</div>'
          + '<div class="row" style="display: flex; align-item: center;"><p>Request Date: ' + contentsToPrint.request_time + '</p><p style="text-indent: 200px;">' + 'Request Need: ' + contentsToPrint.request_reason + '</p></div>';
      }
      var payment_data = '';
      if(contentsToPrint.payment_type == 'Paypal'){
        payment_data = '<div class="row" style="display: flex; align-item: center;"><p>Transaction ID: ' + contentsToPrint.transaction_id + '</p><p style="text-indent: 200px;">' + 'Transaction Date: ' + contentsToPrint.transaction_date + '</p></div>';
      }else{
        payment_data = '<div class="row" style="display: flex; align-item: center;"><p>Payment Code: ' + contentsToPrint.payment_code + '</p></div>';
      }
      var popupWin = window.open('', '_blank', 'width=calc(100%),height=calc(100%)');
      popupWin.document.open();
      popupWin.document.write('<html><body onload="window.print()">' 
        + '<div class="row" style="font-size: 25px; font-weight: bold;">Audition Information:</div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Audition Name: ' + contentsToPrint.audition_name + '</p><p style="text-indent: 200px;">' + 'Audition Center: ' + contentsToPrint.audition_center + '</p></div>'
        + '<div class="row"><p>Online Video: ' + contentsToPrint.video_link + '</p></div>'
        + '<div class="row" style="font-size: 25px; font-weight: bold;">Teacher Information:</div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Teacher Name: ' + contentsToPrint.teacher_name + '</p><p style="text-indent: 200px;">' + 'Teacher Email: ' + contentsToPrint.teacher_email + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Teacher Country: ' + contentsToPrint.teacher_country + '</p><p style="text-indent: 200px;">' + 'Teacher Address: ' + contentsToPrint.teacher_address + '</p></div>'
        + '<div class="row" style="font-size: 25px; font-weight: bold;">Student Information:</div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Student Name: ' + contentsToPrint.student_name + '</p><p style="text-indent: 200px;">' + 'Student Email: ' + contentsToPrint.student_email + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Student Country: ' + contentsToPrint.country + '</p><p style="text-indent: 200px;">' + 'Student Address: ' + contentsToPrint.address + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Student Mobile No: ' + contentsToPrint.mobile_no + '</p><p style="text-indent: 200px;">' + 'Student Birthday: ' + contentsToPrint.birthday + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Student Age: ' + contentsToPrint.age + '</p><p style="text-indent: 200px;">' + 'Studying Year: ' + contentsToPrint.studying_year + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Student Level: ' + contentsToPrint.level + '</p><p style="text-indent: 200px;">' + 'Instrument: ' + instrument + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Performance Type: ' + contentsToPrint.performance_type + '</p><p style="text-indent: 200px;">' + 'Performance Price: ' + contentsToPrint.performance_price + '</p></div>'
        + co_data
        + special_data
        + '<div class="row" style="font-size: 25px; font-weight: bold;">Repertoire</div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Composer: ' + contentsToPrint.composer + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Title: ' + contentsToPrint.title + '</p></div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Duration: ' + contentsToPrint.duration + '</p></div>'
        + '<div class="row" style="font-size: 25px; font-weight: bold;">Payment</div>'
        + '<div class="row" style="display: flex; align-item: center;"><p>Type: ' + contentsToPrint.payment_type + '</p><p style="text-indent: 200px;">' + 'Paid Amount: ' + contentsToPrint.paid_amount + '</p></div>'
        + payment_data
        + '</html>');
      popupWin.document.close();
    });
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
            init_application_list(filter = '', greater = '', less = '');
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
      init_application_list(filter, greater, less);
    })

    function init_application_list(filter, greater, less){
      $('#application_list').DataTable({
        'fixedHeader': {
          header: true
        },
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/activeapplication/get_little_morarts_application_list',
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
           { data: 'recital' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>