<div id="view_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="view_modal_label"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="view_modal_label">View Information</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="form-group">
							<label for="view_photo_file_name">Photo</label>
							<br>
							<img id="view_photo_file_name" src="<?= site_url('assets/images/no_image_available.png') ?>" alt="Gallery Image" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="float-right">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
