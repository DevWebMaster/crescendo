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
              <label for="" class="control-label mb-1 pl-1">Location</label>:
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
                <a class="btn add_new float-right" style="background: #EEA400; color: white;" id="add_new" href="<?= site_url(); ?>admin/audition_location/add_audition_location">Add New</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive px-1">  
                <table id='audition_location_list' class='table table-bordered table-striped text-center'>
                  <thead>
                    <tr style="background: #EEA400; color: white;">
                      <th>ID</th>
                      <th>Location</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
    <!--------  modal ----------> 
      <div class="modal fade" id="edit_location_modal" tabindex="-1" role="dialog" aria-labelledby="edit_location_modalLabel">
      <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="edit_location_modalLabel">Edit Audition Location</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-sm" name="m_location" id="m_location" placeholder="Audition Location">
                  </div>
                </div>
              </div>
          </div><!--/body -->
          <div class="modal-footer">
            <input type="hidden" id="edit_location_id">
            <button type="button" class="btn btn-info" id="btn_save" data-dismiss="modal" style="background: #EEA400; border: none;">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div><!--/footer -->
      </div>
      </div>
      </div>
      <!---------modal---------->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){
    init_audition_location_list(filter = '');

    $('#audition_location_list tbody').on('click', 'td a.delete-row', function(){
      var id = $(this).attr('id');  
      $.ajax({
        url: '<?= site_url(); ?>admin/audition_location/delete_audition_location',
        type: 'POST',
        data: {id: id},
        success: function(response){
          var del_status = JSON.parse(response);
          if(del_status){
            toastr.success("Deleted the row successfully.");
            init_audition_location_list(filter = '');
          }else{
            toastr.warning("Deleting is failed.");
          }
        }
      })
    });

    $('#btn_filter').click(function(){
      var filter = $('#filter').val();
      init_audition_location_list(filter);
    })

    function init_audition_location_list(filter){
      $('#audition_location_list').DataTable({
        'destroy': true,
        'processing': true,
        // 'serverSide': true,
        'pagingType': "simple",
        'serverMethod': 'post',
        'ajax': {
            'url':'<?= site_url(); ?>admin/audition_location/get_audition_location_list',
            'data': { filter: filter }
        },
        'columns': [
           { data: 'id' },
           { data: 'location' },
           { data: 'action', "width": "10%"},
        ]
      });
    }
    $('#audition_location_list tbody').on('click', 'td a.edit-row', function(){
      var location_id = $(this).attr('id');  
      $('#edit_location_id').val(location_id);
    });

    $('#btn_save').click(function(){
      var m_location = $('#m_location').val()
      var m_location_id = $('#edit_location_id').val()
      $.ajax({
        url: '<?= site_url(); ?>admin/audition_location/update_location',
        type: 'POST',
        data: {m_location_id: m_location_id, m_location: m_location},
        success: function(response){
          var edit_status = JSON.parse(response);
          if(edit_status){
            toastr.success("Edited the row successfully.");
            init_audition_location_list();
          }else{
            toastr.warning("Editing is failed.");
          }
        }
      })
    })
  })
</script>