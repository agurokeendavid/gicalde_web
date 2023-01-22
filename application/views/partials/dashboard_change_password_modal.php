<div id="change_password_modal" class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="change_password_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" id="change_password_form" role="form">
				<div class="modal-header">
					<h4 class="modal-title" id="change_password_modal_label">Change Password</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="new_password_change_password">New Password <code>*</code></label>
								<input type="password" class="form-control" id="new_password_change_password"
									   name="new_password_change_password" placeholder="Enter new password" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="verify_new_password_change_password">Verify New Password <code>*</code></label>
								<input type="password" class="form-control" id="verify_new_password_change_password"
									   name="verify_new_password_change_password" placeholder="Enter verify new password"
									   required>
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
