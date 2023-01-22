<div id="set_payment_details_modal" class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="set_payment_details_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" role="document">
			<form method="POST" id="set_payment_details_form" role="form">
				<input type="hidden" id="set_payment_details_id" name="set_payment_details_id" readonly>
				<div class="modal-header">
					<h4 class="modal-title" id="set_payment_details_modal_label">Set Payment Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="set_payment_details_gcash_name">GCash Name: <code>*</code></label>
								<input type="text" class="form-control" id="set_payment_details_gcash_name"
									   name="set_payment_details_gcash_name" placeholder="Enter GCash Name" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="set_payment_details_gcash_mobile_number">GCash Mobile Number: <code>*</code></label>
								<input type="text" class="form-control" id="set_payment_details_gcash_mobile_number"
									   name="set_payment_details_gcash_mobile_number" placeholder="Enter GCash Mobile Number" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<label for="set_payment_details_bank_account_name">Bank Account Name: <code>*</code></label>
								<input type="text" class="form-control" id="set_payment_details_bank_account_name"
									   name="set_payment_details_bank_account_name" placeholder="Enter bank account number" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<label for="set_payment_details_bank_account_number">Bank Account Number: <code>*</code></label>
								<input type="text" class="form-control" id="set_payment_details_bank_account_number"
									   name="set_payment_details_bank_account_number" placeholder="Enter bank account number" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="float-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
