<div id="add_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_modal_label"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form id="add_form" method="post" role="form" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title" id="add_modal_label">Add Gallery</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="photo_file">Photo <code>*</code></label>
								<input type="file" name="photo_file" id="photo_file"
									   class="file-upload-default" required>
								<div class="input-group col-xs-12">
									<input type="text" class="form-control file-upload-info" id="photo_file_info"
										   disabled="" placeholder="Photo">
									<span class="input-group-append">
                                            <button id="photo_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="float-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
