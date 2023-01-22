<div id="update_profile_modal" class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="update_profile_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" role="document">
			<form method="POST" id="update_profile_form" role="form">
				<div class="modal-header">
					<h4 class="modal-title">Update Profile</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_code">Employee Code <code>*</code></label>
								<input type="text" class="form-control" id="update_profile_code"
									   name="update_profile_code" placeholder="Enter employee code" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_first_name">First Name <code>*</code></label>
								<input type="text" class="form-control" id="update_profile_first_name"
									   name="update_profile_first_name" placeholder="Enter first name" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_middle_name">Middle Name</label>
								<input type="text" class="form-control" id="update_profile_middle_name"
									   name="update_profile_middle_name" placeholder="Enter middle name">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_last_name">Last Name <code>*</code></label>
								<input type="text" class="form-control" id="update_profile_last_name"
									   name="update_profile_last_name" placeholder="Enter last name" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_dob">Date of Birth <code>*</code></label>
								<input type="date" class="form-control" id="update_profile_dob"
									   name="update_profile_dob" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_gender">Gender <code>*</code></label>
								<?= form_dropdown('update_profile_gender', Dropdown::get_static('gender'), '', 'id="update_profile_gender" class="form-control" required') ?>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_contact_no">Contact Number <code>*</code></label>
								<input type="text" class="form-control" id="update_profile_contact_no"
									   name="update_profile_contact_no" placeholder="Enter contact number" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="update_profile_address">Address <code>*</code></label>
								<input type="text" class="form-control" id="update_profile_address"
									   name="update_profile_address" placeholder="Enter address" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="float-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
