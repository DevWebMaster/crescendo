<div class="content-wrapper">
    <section class="content">
      <div class="row apply-item">
        <div class="col-1"></div>
        <div class="col-md-10 col-xs-10">
            <label><h3><?= $title; ?></h3></label>
            
              <?php
                foreach($little_morarts as $little_morart):
              ?>
                <div class="row pt-3 mb-2" style="background: #EEA400; color: white; border-radius: 8px; align-items: center;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5 col-xs-4">
                    <div class="form-group">
                      <label><?= $little_morart['audition_date'].' '.$little_morart['audition_name'].'  '.$little_morart['auditionlocation']; ?></label>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-2">
                    <div class="form-group">
                      <label><?= $little_morart['audition_deadline']; ?></label>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-2">
                    <div class="form-group">
                      <label class="mr-5"><?= $little_morart['is_active'] ? 'Open' : 'Close'; ?></label>
                      <a href="<?= site_url(); ?>admin/applyauditions/apply_little_morarts/<?= $little_morart['id'] ?>" id="btn_apply" class="px-3 py-1 ml-5" style="background: white; color: #EEA400; border-radius: 8px;">Apply</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            
        </div>    
      </div><!--/ row --> 

    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    
    var coll = document.getElementsByClassName("collapsible");
    for (var i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var contents = this.nextElementSibling;
        if (contents.style.maxHeight){
          contents.style.maxHeight = null;
        } else {
          contents.style.maxHeight = contents.scrollHeight + "px";
        } 
      });
    }
  });
</script>