<div id="complete_reservation_modal" class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="complete_reservation_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" role="document">
			<form method="POST" id="complete_reservation_form" role="form">
				<input type="hidden" id="complete_reservation_id" name="complete_reservation_id" readonly>
				<div class="modal-header">
					<h4 class="modal-title" id="complete_reservation_modal_label">Mark as Complete Reservation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="complete_reservation_paid_amount">Remaining Paid Amount: <code>*</code></label>
								<input type="number" min="0" step="0.01" class="form-control" id="complete_reservation_paid_amount"
									   name="complete_reservation_paid_amount" placeholder="Remaining Paid Amount" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="complete_reservation_paid_date">Paid Date: (dd/mm/yyyy) <code>*</code></label>
								<input type="date" class="form-control" id="complete_reservation_paid_date"
									   name="complete_reservation_paid_date" placeholder="Paid Date" required>
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
