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
							<label for="view_name">Cottage Name</label>
							<input type="text" class="form-control" id="view_name" name="view_name"
								   placeholder="Room Name" readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_no_of_guests">No. of Guests</label>
							<input type="number" class="form-control" id="view_no_of_guests" name="view_no_of_guests" placeholder="No. of Guests"
								   readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_price">Price (₱)</label>
							<input type="text" class="form-control" id="view_price" name="view_price"
								   placeholder="Price (₱)" readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_slots">Slots</label>
							<input type="number" class="form-control" id="view_slots" name="view_slots" placeholder="Slots"
								   readonly>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="view_description">Description</label>
							<textarea class="form-control" id="view_description" name="view_description" placeholder="Description"
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
