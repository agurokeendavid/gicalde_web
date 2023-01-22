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
							<label for="view_room_id">Room Name</label>
							<input type="text" class="form-control" id="view_room_id" name="view_room_id"
								   placeholder="Room Name" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_cottage_id">Cottage Name</label>
							<input type="text" class="form-control" id="view_cottage_id" name="view_cottage_id"
								   placeholder="Cottage Name" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_client_name">Client Name</label>
							<input type="text" class="form-control" id="view_client_name" name="view_client_name"
								   placeholder="Client Name" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_check_in_date">Check In Date (dd/mm/yyyy)</label>
							<input type="date" class="form-control" id="view_check_in_date" name="view_check_in_date"
								   placeholder="Check In Date" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_check_out_date">Check Out Date (dd/mm/yyyy)</label>
							<input type="date" class="form-control" id="view_check_out_date" name="view_check_out_date"
								   placeholder="Check Out Date" readonly>
						</div>
					</div>


					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_mode_of_payment">Mode of Payment</label>
							<input type="text" class="form-control" id="view_mode_of_payment" name="view_mode_of_payment"
								   placeholder="Mode of Payment" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_paid_amount">Paid Amount</label>
							<input type="number" class="form-control" id="view_paid_amount" name="view_paid_amount"
								   placeholder="Paid Amount" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_paid_date">Paid Date (dd/mm/yyyy)</label>
							<input type="date" class="form-control" id="view_paid_date" name="view_paid_date"
								   placeholder="Paid Date" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_total_price">Total Price</label>
							<input type="number" class="form-control" id="view_total_price" name="view_total_price"
								   placeholder="Total Price" readonly>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_no_of_guests">No. of Guests</label>
							<input type="number" class="form-control" id="view_no_of_guests" name="view_no_of_guests" placeholder="No. of Guests"
								   readonly>
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
