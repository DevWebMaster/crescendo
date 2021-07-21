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
           { data: 'composition' },
           { data: 'title' },
           { data: 'is_paid' },
           { data: 'student_time' },
           { data: 'score' },
           { data: 'place' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
  })
</script>