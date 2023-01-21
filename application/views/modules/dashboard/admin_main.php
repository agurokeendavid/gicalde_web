<div class="content-wrapper">
	<?php $this->load->view('partials/dashboard_page_header') ?>
	<div class="row mt-3">
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Total Staff</h4>
					<div class="d-flex justify-content-between">
						<p>Total Count</p>
						<p>max: <?= isset($staffs_count) && !empty($staffs_count) ? $staffs_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-info" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>" aria-valuemin="0"
							 aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Total Rooms</h4>
					<div class="d-flex justify-content-between">
						<p>Total Count: <?= isset($rooms_count) && !empty($rooms_count) ? $rooms_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-success w-25" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0" aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Total Cottages</h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($amenities_count) && !empty($amenities_count) ? $amenities_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-danger w-25" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Page Visits</h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($page_visits_count) && !empty($page_visits_count) ? $page_visits_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"
							 aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-xl-6 col-sm-12 d-flex grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex flex-wrap justify-content-between">
						<h4 class="card-title mb-3">Sales Summary</h4>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="me-1">
								<div class="text-info mb-1">
									Total Earning
								</div>
								<h2 class="mb-2 mt-2 font-weight-bold"><?= money_php(0) ?></h2>
								<div class="font-weight-bold">Since Last Month</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-sm-12 d-flex grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex flex-wrap justify-content-between">
						<h4 class="card-title mb-3">No. of Reservations</h4>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="me-1">
								<div class="text-info mb-1">
									Total Reservation
								</div>
								<h2 class="mb-2 mt-2 font-weight-bold"><?= 0 ?></h2>
								<div class="font-weight-bold">Since Last Month</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<h4 class="font-weight-bold">Reservations</h4>
	</div>
	<div class="row mt-3">
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= base_url() ?>reservations/manage_pending">Pending</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($pending_reservations_count) && !empty($pending_reservations_count) ? $pending_reservations_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-info" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= base_url() ?>reservations/manage_ongoing">Ongoing</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($ongoing_reservations_count) && !empty($ongoing_reservations_count) ? $ongoing_reservations_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-warning" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0" aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= base_url() ?>reservations/manage_checkin">Check In</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($checkin_reservations_count) && !empty($checkin_reservations_count) ? $checkin_reservations_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-warning" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0" aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= base_url() ?>reservations/manage_completed">Completed</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($completed_reservations_count) && !empty($completed_reservations_count) ? $completed_reservations_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-success" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0" aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= base_url() ?>reservations/manage_cancelled">Cancelled</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= isset($cancelled_reservations_count) && !empty($cancelled_reservations_count) ? $cancelled_reservations_count : 0; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-danger" role="progressbar"
							 aria-valuenow="<?= get_percentage(0, 0); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= 0; ?>"
							 style="width: <?= get_percentage(0, 0); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-xl-9 d-flex grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex flex-wrap justify-content-between">
						<h4 class="card-title mb-3">Announcements</h4>
					</div>
					<div class="row">
						<div class="col-12">
							<h2 class="text-center mx-auto">No announcements available</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 d-flex grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex flex-wrap justify-content-between">
						<h4 class="card-title mb-3">Last User Logged In</h4>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-sm-12">
									<div class="d-flex justify-content-between mb-4">
										<div class="font-weight-medium">Email Address</div>
										<div class="font-weight-medium">Date & Time</div>
									</div>
									<?php if (isset($activity_logs) && !empty($activity_logs)): ?>
										<?php foreach ($activity_logs as $value): ?>
											<div class="d-flex justify-content-between mb-4">
												<a class="text-secondary font-weight-medium"
												   href="#"><?= $value['email_address'] ?></a>
												<div class="small">
													<?= view_date($value['created_at'], 'date'); ?>
												</div>
											</div>
										<?php
										endforeach; ?>
									<?php
									endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
