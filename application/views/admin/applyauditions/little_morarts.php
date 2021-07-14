<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="offset-1 col-md-10">
            <label><h3><?= $title; ?></h3></label>
            
              <?php
                foreach($little_morarts as $little_morart):
              ?>
                <div class="row pt-3" style="background: #EEA400; color: white; border-radius: 8px; align-items: center;">
                  <div class="offset-1 col-md-6">
                    <div class="form-group">
                      <label><?= $little_morart['audition_date'].' '.$little_morart['audition_name'].'  '.$little_morart['audition_location']; ?></label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label><?= $little_morart['audition_deadline']; ?></label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label><?= $little_morart['is_active'] ? 'Open' : 'Close'; ?></label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <a href="<?= site_url(); ?>admin/applyauditions/apply_little_morarts/<?= $little_morart['id'] ?>" id="btn_apply" class="px-3 py-1" style="background: white; color: #EEA400; border-radius: 8px;">Apply</a>
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