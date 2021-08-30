<!--------  modal ---------->	
<div class="modal fade" id="upload_little_morarts" tabindex="-1" role="dialog" aria-labelledby="upload_little_morartsLabel">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="upload_little_morartsLabel">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <form method="post" enctype="multipart/form-data" id="uploadForm">
	    <div class="modal-body">
	     	<div class="row">
				<div class="col-md-12">
					<label>Do you want to apply the student continuously?</label>
			    </div>		
			</div><!--/ row -->
			<div class="loader" style="margin-left: 40%; display: none;"></div>
	    </div><!--/body -->
	    <div class="modal-footer">
	    	<button type="button" class="btn btn-sm btn-info add_label_no px-3" id="btn_confirm">Yes</button>
		    <button type="button" class="btn btn-default" id="btn_close" data-dismiss="modal">No</button>
	    </div><!--/footer -->
    </form>
</div>
</div>
</div>
<!---------modal---------->
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_confirm').click(function(){
			window.location.href = '<?= site_url(); ?>admin/activeapplication/index';
		})
		$('#btn_close').click(function(){
			window.location.href = '<?= site_url(); ?>admin/activeapplication/index';
		})
	});
</script>