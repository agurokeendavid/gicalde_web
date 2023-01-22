<?php $this->load->view('modules/home/partials/_hero-wrap_div') ?>

<section class="ftco-section" id="make_your_reservation_section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Make Your Reservation</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card border-dark shadow-lg">
					<div class="card-body">
						<form id="form" class="forms-sample" role="form" method="post">
							<?php if (@$reservation_type == 'room') : ?>
								<input type="hidden" id="room_id" name="room_id" value="<?= @$info['id']; ?>" readonly>
							<?php elseif (@$reservation_type == 'cottage') : ?>
								<input type="hidden" id="cottage_id" name="cottage_id" value="<?= @$info['id']; ?>"
									   readonly>
							<?php endif; ?>
							<div class="row">
								<?php if (@$reservation_type == 'room') : ?>
									<div class="col-xl-4 col-sm-12">
										<div class="form-group">
											<label for="name">Room <code>*</code></label>
											<input id="name" name="name" type="text" class="form-control"
												   placeholder="Room" value="<?= @$info['name']; ?>" readonly>
										</div>
									</div>
								<?php elseif (@$reservation_type == 'cottage') : ?>
									<div class="col-xl-4 col-sm-12">
										<div class="form-group">
											<label for="name">Cottage <code>*</code></label>
											<input id="name" name="name" type="text" class="form-control"
												   placeholder="Cottage" value="<?= @$info['name']; ?>"
												   readonly>
										</div>
									</div>
								<?php endif; ?>

								<div class="col-xl-4 col-sm-12">
									<div class="form-group">
										<label for="check_in_date">Check In Date (dd/mm/yyyy)
											<code>*</code></label>
										<input type="date" class="form-control" id="check_in_date"
											   name="check_in_date"
											   placeholder="Check In Date" required autofocus>
									</div>
								</div>
								<div class="col-xl-4 col-sm-12">
									<div class="form-group">
										<label for="check_out_date">Check Out Date (dd/mm/yyyy)
											<code>*</code></label>
										<input type="date" class="form-control" id="check_out_date"
											   name="check_out_date"
											   placeholder="Check Out Date" required>
									</div>
								</div>

								<div class="col-xl-4 col-sm-12">
									<div class="form-group">
										<label for="no_of_guests">No. of Guests <code>*</code></label>
										<input id="no_of_guests" name="no_of_guests" type="number" min="0"
											   max="100" class="form-control" placeholder="No. of Guests"
											   value="<?= @$info['no_of_guests']; ?>"
											   required>
									</div>
								</div>

								<div class="col-xl-8 col-sm-12">
									<div class="form-group">
										<label for="mode_of_payment">Mode of Payment <code>*</code></label>
										<?= form_dropdown('mode_of_payment', Dropdown::get_static('mode_of_payment_online'), '', 'id="mode_of_payment" required class="form-control"') ?>
									</div>
								</div>

								<div class="col-xl-4 col-sm-12">
									<div class="form-group">
										<label for="first_name">First Name <code>*</code></label>
										<input type="text" class="form-control" id="first_name"
											   name="first_name"
											   placeholder="First Name" required>
									</div>
								</div>

								<div class="col-xl-4 col-sm-12">
									<div class="form-group">
										<label for="middle_name">Middle Name</label>
										<input type="text" class="form-control" id="middle_name"
											   name="middle_name"
											   placeholder="Middle Name">
									</div>
								</div>
								<div class="col-xl-4 col-sm-12">
									<div class="form-group">
										<label for="last_name">Last Name <code>*</code></label>
										<input type="text" class="form-control" id="last_name"
											   name="last_name"
											   placeholder="Last Name" required>
									</div>
								</div>
								<div class="col-xl-6 col-sm-12">
									<div class="form-group">
										<label for="contact_no">Contact Number <code>*</code></label>
										<input type="text" class="form-control" id="contact_no"
											   name="contact_no"
											   placeholder="Contact Number" required>
									</div>
								</div>
								<div class="col-xl-6 col-sm-12">
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
							<div class="row float-right">
								<div class="col-sm-12">
									<a href="<?= site_url('home') ?>" class="btn btn-light mr-2">Go back</a>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
