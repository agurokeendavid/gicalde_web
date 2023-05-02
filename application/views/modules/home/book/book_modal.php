<div id="book_modal" class="modal fade" tabindex="-1" role="dialog"
	 aria-labelledby="book_modal_label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" role="document">
			<div class="modal-header">
				<h4 class="modal-title">Book Reservation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form" method="POST">
				<div class="modal-body">
					<div class="row">
						<?php if (@$reservation_type == 'room') : ?>
							<input type="hidden" id="room_id" name="room_id" value="<?= @$info['id']; ?>" readonly>
						<?php elseif (@$reservation_type == 'cottage') : ?>
							<input type="hidden" id="cottage_id" name="cottage_id" value="<?= @$info['id']; ?>"
								   readonly>
						<?php endif; ?>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="name">Room/Cottage <code>*</code></label>
								<input id="name" name="name" type="text" class="form-control"
									   placeholder="Room" value="<?= @$info['name']; ?>" readonly>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="check_in_date">Check In Date (dd/mm/yyyy)
									<code>*</code></label>
								<input type="date" class="form-control" id="check_in_date"
									   name="check_in_date" placeholder="Check In Date" min="<?= DATE_NOW; ?>" required
									   autofocus>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="check_out_date">Check Out Date (dd/mm/yyyy)
									<code>*</code></label>
								<input type="date" class="form-control" id="check_out_date"
									   name="check_out_date" placeholder="Check Out Date" min="<?= DATE_NOW; ?>"
									   required>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label for="no_of_guests">No. of Guests <code>*</code></label>
								<input id="no_of_guests" name="no_of_guests" type="number" min="0"
									   max="100" class="form-control" placeholder="No. of Guests"
									   value="<?= @$info['no_of_guests']; ?>"
									   required>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="form-group">
								<label for="mode_of_payment">Mode of Payment <code>*</code></label>
								<?= form_dropdown('mode_of_payment', Dropdown::get_static('mode_of_payment_online'), '', 'id="mode_of_payment" required class="form-control"') ?>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<label for="first_name">First Name <code>*</code></label>
								<input type="text" class="form-control" id="first_name"
									   name="first_name"
									   placeholder="First Name" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control" id="middle_name"
									   name="middle_name"
									   placeholder="Middle Name">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="last_name">Last Name <code>*</code></label>
								<input type="text" class="form-control" id="last_name"
									   name="last_name"
									   placeholder="Last Name" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="contact_no">Contact Number <code>*</code></label>
								<input type="text" class="form-control" id="contact_no"
									   name="contact_no"
									   placeholder="Contact Number" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email_address">Email Address <code>*</code></label>
								<input type="email" class="form-control" id="email_address"
									   name="email_address"
									   placeholder="Email Address" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="address">Address <code>*</code></label>
								<textarea class="form-control" id="address" name="address"
										  placeholder="Address" rows="3"
										  required></textarea>
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
