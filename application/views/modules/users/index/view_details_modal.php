<div id="view_details_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="view_details_modal_label"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<input type="hidden" id="view_id" name="view_id" readonly>
			<div class="modal-header">
				<h4 class="modal-title" id="view_details_modal_label">View Information</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_code">Employee Code</label>
							<input type="text" class="form-control" id="view_code" name="view_code"
								   placeholder="Employee Code" readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_name">Name</label>
							<input type="text" class="form-control" id="view_name" name="view_name"
								   placeholder="Name" readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_dob">Date of Birth (dd/mm/yyyy)</label>
							<input type="date" class="form-control" id="view_dob" name="view_dob" placeholder="Date of Birth"
								   readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_gender">Gender</label>
							<input type="text" class="form-control" id="view_gender" name="view_gender"
								   placeholder="Gender" readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_address">Address</label>
							<textarea class="form-control" id="view_address" name="view_address" placeholder="Address"
									  rows="3" readonly></textarea>
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
