<div class="modal fade" tabindex="-1" role="dialog" id='show_image_upload'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery Images</h4>
        <center><span class="image-success" style="color:green;"></span></center>
      </div>
      <div class="modal-body">
        	
			<!-- The fileinput-button span is used to style the file input field as button -->
			<span class="btn btn-success fileinput-button">
				<i class="glyphicon glyphicon-plus"></i>
				<span>Select Images...</span>
				<!-- The file input field used as target for the file upload widget -->
				<input id="fileupload" type="file" name="files[]" multiple>
			</span>
			<br />
			<br />
			<!-- The global progress bar -->
			<div id="progress" class="progress">
				<div class="progress-bar progress-bar-success"></div>
			</div>
			<div data-gpid='' id='gpid'></div>
			
			<!-- The container for the uploaded files -->
			
			<div id="files" class="files"></div>
			<div class="row" id='imgHtml'>				
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id='imageModalClose'>Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


