  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-pencil"></i>
              &nbsp; <?= trans('edit_localadmin') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/localadmin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('localadmin_list') ?></a>
            <a href="<?= base_url('admin/localadmin/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?= trans('add_new_localadmin') ?></a>
          </div>
        </div>
        <div class="card-body">
   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/localadmin/edit/'.$localadmin['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="name" class="col-md-2 control-label"><?= trans('localadminname') ?></label>

                <div class="col-md-12">
                  <input type="text" name="name" value="<?= $localadmin['name']; ?>" class="form-control" id="lname" placeholder="">
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="firstname" class="col-md-2 control-label"><?= trans('firstname') ?></label>

                <div class="col-md-12">
                  <input type="text" name="firstname" value="<?= $localadmin['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-md-2 control-label"><?= trans('lastname') ?></label>

                <div class="col-md-12">
                  <input type="text" name="lastname" value="<?= $localadmin['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                </div>
              </div> -->

              <div class="form-group">
                <label for="email" class="col-md-2 control-label"><?= trans('email') ?></label>

                <div class="col-md-12">
                  <input type="email" name="email" value="<?= $localadmin['email']; ?>" class="form-control" id="lemail" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-md-2 control-label"><?= trans('mobile_no') ?></label>

                <div class="col-md-12">
                  <input type="text" name="mobile_no" value="<?= $localadmin['mobile_no']; ?>" class="form-control" id="lmobile_no" placeholder="">
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="role" class="col-md-2 control-label"><?= trans('status') ?></label>

                <div class="col-md-12">
                  <select name="status" class="form-control">
                    <option value=""><?= trans('select_status') ?></option>
                    <option value="1" <?= ($localadmin['is_active'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($localadmin['is_active'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div> -->
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="<?= trans('update_localadmin') ?>" class="btn btn-primary pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
          <!-- /.box-body -->
      </div>  
    </section> 
  </div>