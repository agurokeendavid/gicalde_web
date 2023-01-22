<div id="approve_reservation_modal" class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="approve_reservation_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" role="document">
			<form method="POST" id="approve_reservation_form" role="form">
				<input type="hidden" id="approve_reservation_id" name="approve_reservation_id" readonly>
				<div class="modal-header">
					<h4 class="modal-title" id="approve_reservation_modal_label">Approve Reservation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="approve_reservation_paid_amount">Downpayment Amount: <code>*</code></label>
								<input type="number" min="0" step="0.01" class="form-control" id="approve_reservation_paid_amount"
									   name="approve_reservation_paid_amount" placeholder="Downpayment Amount" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="approve_reservation_paid_date">Paid Date: (dd/mm/yyyy) <code>*</code></label>
								<input type="date" class="form-control" id="approve_reservation_paid_date"
									   name="approve_reservation_paid_date" placeholder="Paid Date" required>
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
