<div class="content-wrapper">
	<?php $this->load->view('partials/dashboard_page_header') ?>
	<div class="row mt-3">
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Total Staff</h4>
					<div class="d-flex justify-content-between">
						<p>Total Count</p>
						<p>max: <?= count_all('users'); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-info" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all_users_by_role_id(ROLE_STAFF), count_all('users')); ?>" aria-valuemin="0"
							 aria-valuemax="<?= count_all('users'); ?>"
							 style="width: <?= get_percentage(count_all_users_by_role_id(ROLE_STAFF), count_all('users')); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Total Rooms</h4>
					<div class="d-flex justify-content-between">
						<p>Total Count: <?= count_all('rooms'); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-success w-25" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all('rooms'), count_all('rooms')); ?>"
							 aria-valuemin="0" aria-valuemax="<?= count_all('rooms'); ?>"
							 style="width: <?= get_percentage(count_all('rooms'), count_all('rooms')); ?>% !important;"></div>
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
							Count: <?= count_all('cottages'); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-danger w-25" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all('cottages'), count_all('cottages')); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= count_all('cottages'); ?>"
							 style="width: <?= get_percentage(count_all('cottages'), count_all('cottages')); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<?php $page_visits = rand(0, 100); ?>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Page Visits</h4>
					<div class="d-flex justify-content-between">
						<p>Total Count: <?= $page_visits; ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-warning w-25" role="progressbar"
							 aria-valuenow="<?= get_percentage($page_visits, $page_visits); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= $page_visits; ?>"
							 style="width: <?= get_percentage($page_visits, $page_visits); ?>% !important;"></div>
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
								<h2 class="mb-2 mt-2 font-weight-bold"><?= money_php(get_total_earning()) ?></h2>
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
								<h2 class="mb-2 mt-2 font-weight-bold"><?= count_all('reservations'); ?></h2>
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
					<h4 class="card-title"><a href="<?= site_url('reservations/index/' . RESERVATION_STATUS_PENDING) ?>">Pending</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= count_all_reservations_by_reservation_status(RESERVATION_STATUS_PENDING); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-info" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_PENDING), count_all('reservations')); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= count_all('reservations'); ?>"
							 style="width: <?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_PENDING), count_all('reservations')); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= site_url('reservations/index/' . RESERVATION_STATUS_APPROVED) ?>">Approved</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= count_all_reservations_by_reservation_status(RESERVATION_STATUS_APPROVED); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-warning" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_APPROVED), count_all('reservations')); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= count_all('reservations'); ?>"
							 style="width: <?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_APPROVED), count_all('reservations')); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= site_url('reservations/index/' . RESERVATION_STATUS_COMPLETED) ?>">Completed</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= count_all_reservations_by_reservation_status(RESERVATION_STATUS_COMPLETED); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-success" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_COMPLETED), count_all('reservations')); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= count_all('reservations'); ?>"
							 style="width: <?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_COMPLETED), count_all('reservations')); ?>% !important;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><a href="<?= site_url('reservations/index/' . RESERVATION_STATUS_CANCELLED) ?>">Cancelled</a></h4>
					<div class="d-flex justify-content-between">
						<p>Total
							Count: <?= count_all_reservations_by_reservation_status(RESERVATION_STATUS_CANCELLED); ?></p>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar bg-danger" role="progressbar"
							 aria-valuenow="<?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_CANCELLED), count_all('reservations')); ?>"
							 aria-valuemin="0"
							 aria-valuemax="<?= count_all('reservations'); ?>"
							 style="width: <?= get_percentage(count_all_reservations_by_reservation_status(RESERVATION_STATUS_CANCELLED), count_all('reservations')); ?>% !important;"></div>
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
									<?php foreach (get_all_audit_trail() as $value): ?>
										<div class="d-flex justify-content-between mb-4">
											<a class="text-secondary font-weight-medium"
											   href="#"><?= $value['email_address'] ?></a>
											<div class="small">
												<?= view_date($value['created_at']); ?>
											</div>
										</div>
									<?php
									endforeach; ?>
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
