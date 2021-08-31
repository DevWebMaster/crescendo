<!--------  modal ---------->	
<div class="modal fade" id="upload_recital_crescendo" tabindex="-1" role="dialog" aria-labelledby="upload_little_morartsLabel">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="upload_little_morartsLabel">Upload CSV File for Recital Crescendo:</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <form method="post" enctype="multipart/form-data" id="recitaluploadForm">
	    <div class="modal-body">
	     	<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
						  	<input type="file" name="recitalfileToUpload" id="recitalfileToUpload">
			      		</div>
			    	</div>
			    </div>		
			</div><!--/ row -->
			<div class="loader" style="margin-left: 40%; display: none;"></div>
	    </div><!--/body -->
	    <div class="modal-footer">
	    	<input type="submit" class="btn btn-sm btn-info add_label_no px-3" value="Upload">
		    <button type="button" class="btn btn-default" id="btn_close" data-dismiss="modal">Close</button>
	    </div><!--/footer -->
    </form>
</div>
</div>
</div>
<!---------modal---------->
<script type="text/javascript">
	$(document).ready(function(){
		$('#recitaluploadForm').submit(function(e) {
			$('.loader').show();
			e.preventDefault();
			if($('#recitalfileToUpload').val()){
				$('.add_label_no').prop("disabled",true);
				var formData = new FormData(this);
				console.log(formData);
				$.ajax({
					url: '<?= site_url(); ?>admin/applications/import_from_excel_recital_crescendo',
					type: 'POST',
					data: formData,				
					cache: false,
					contentType: false,
					processData: false,
					success: function(response) {
						console.log(response);
						var result = JSON.parse(response);
						$('.loader').hide();
						if(result['status'] == 0){
							// result = 'Fail to upload the csv file.';
							toastr.warning(result['message']);
							// setTimeout(function(){ 
			    //               window.location.href = "<?php echo site_url('admin/applications/crescendo'); ?>";
			    //             }, 3000);
						}else{
							toastr.success('Imported successfully.');
							// setTimeout(function(){ 
			    //               window.location.href = "<?php echo site_url('admin/applications/crescendo'); ?>";
			    //             }, 3000);
						}						
					}
				})
			}else{
				toastr.warning('Please select the csv file to upload.');
				return;
			}
		});
		$('#btn_close').click(function(){
			$('.loader').hide();
			if($('#recitalfileToUpload').val()){
				window.location.href = "<?php echo site_url('admin/applications/crescendo'); ?>";
			}
			$('#recitalfileToUpload').val('');
			
		})
	});
</script>