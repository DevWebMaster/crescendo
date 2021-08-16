<div class="content-wrapper">
    <section class="content">
      <div class="row apply-item">
        <div class="col-1"></div>
        <div class="col-md-10 col-xs-10">
            <label><h3><?= $title; ?></h3></label>
            
              <?php
                foreach($crescendo_list as $crescendo):
              ?>
                <div class="row pt-3 mb-2" style="background: #EEA400; color: white; border-radius: 8px; align-items: center;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5 col-xs-4">
                    <div class="form-group">
                      <label><?= $crescendo['audition_date'].' '.$crescendo['audition_name'].'  '.$crescendo['auditionlocation']; ?></label>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-2">
                    <div class="form-group">
                      <label><?= $crescendo['audition_deadline']; ?></label>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-2">
                    <div class="form-group">
                      <label class="mr-5"><?= $crescendo['is_active'] ? 'Open' : 'Close'; ?></label>
                      <a href="<?= site_url(); ?>admin/applyrecital/apply_crescendo/<?= $crescendo['id'] ?>" id="btn_apply" class="px-3 py-1 ml-5" style="background: white; color: #EEA400; border-radius: 8px;">Apply</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            
        </div>    
      </div><!--/ row --> 

    </section>  
</div>
