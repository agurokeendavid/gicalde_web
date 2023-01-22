<div class="content-wrapper">
	<?php $this->load->view('partials/dashboard_page_header') ?>
	<div class="row mt-3">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">
						<?= $page_data['section']; ?>
					</h4>
					<p class="card-description">
						<?= $page_data['section']; ?>
					</p>
					<div class="table-responsive">
						<table id="table" class="table table-hover table-striped table-bordered">
							<thead>
							<tr>
								<th>
									Room
								</th>
								<th>
									Cottage
								</th>
								<th>
									Name
								</th>
								<th>
									Check In Date
								</th>
								<th>
									Check Out Date
								</th>
								<th>
									Mode of Payment
								</th>
								<th>
									Paid Amount
								</th>
								<th>
									Paid Date
								</th>
								<th>
									Total Price
								</th>
								<th>
									Created By
								</th>
								<th>
									Updated By
								</th>
								<th style="width: 10%;">
									Actions
								</th>
							</tr>
							</thead>
							<tbody>
							<?php if (!empty($reservations)) : ?>
								<?php foreach ($reservations as $value) : ?>
									<tr>
										<td><?= !empty($value['room_id']) ? get_value_by_table_name($value['room_id'], 'rooms', 'name') : 'N/A'; ?></td>
										<td><?= !empty($value['cottage_id']) ? get_value_by_table_name($value['cottage_id'], 'rooms', 'name') : 'N/A'; ?></td>
										<td><?= $value['last_name'] . ', ' . $value['first_name']; ?></td>
										<td><?= view_date($value['check_in_date']); ?></td>
										<td><?= view_date($value['check_out_date']); ?></td>
										<td><?= Dropdown::get_static('mode_of_payment_online', $value['mode_of_payment'], 'view'); ?></td>
										<td><?= money_php($value['paid_amount']); ?></td>
										<td><?= view_date($value['paid_date']); ?></td>
										<td><?= money_php($value['total_price']); ?></td>
										<td><?= '<div class="badge bg-info">' . get_person_name($value['created_by']) . '</div>' . ' <div>' . view_date($value['created_at'], 'date_am_pm') . '</div>'; ?></td>
										<td><?= !empty($value['updated_at']) ? '<div class="badge bg-info">' . get_person_name($value['updated_by']) . '</div>' . ' <div>' . view_date($value['updated_at'], 'date_am_pm') . '</div>' : 'N/A' ?></td>
										<td class="dropdown">
											<button class="btn btn-primary btn-sm dropdown-toggle" type="button"
													id="dropdown_actions" data-toggle="dropdown" aria-haspopup="true"
													aria-expanded="false">
												<i class="typcn typcn-cog"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdown_actions">
												<h6 class="dropdown-header">Actions</h6>
												<div class="dropdown-divider"></div>
												<?php if (@$reservation_status) : ?>
													<?php if ($reservation_status == RESERVATION_STATUS_PENDING) : ?>
														<button rel="tooltip" class="dropdown-item approve-row" title="Approve" data-id="<?= $value['id']; ?>">Approve
														</button>
														<button rel="tooltip" class="dropdown-item cancel-row" title="Cancel" data-id="<?= $value['id']; ?>">
															Cancel
														</button>
														<button rel="tooltip" class="dropdown-item view-row" title="View" data-id="<?= $value['id']; ?>">View Details
														</button>
													<?php elseif ($reservation_status == RESERVATION_STATUS_APPROVED) : ?>
														<button rel="tooltip" class="dropdown-item mark-as-completed-row" title="Mark as Completed" data-id="<?= $value['id']; ?>">Mark as Completed
														</button>
														<button rel="tooltip" class="dropdown-item view-row" title="View" data-id="<?= $value['id']; ?>">View Details
														</button>
													<?php elseif ($reservation_status == RESERVATION_STATUS_COMPLETED) : ?>
														<button rel="tooltip" class="dropdown-item view-row" title="View" data-id="<?= $value['id']; ?>">View Details
														</button>
													<?php elseif ($reservation_status == RESERVATION_STATUS_CANCELLED) : ?>
														<button rel="tooltip" class="dropdown-item view-row" title="View" data-id="<?= $value['id']; ?>">View Details
														</button>
													<?php endif; ?>
												<?php endif; ?>

											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
							</tbody>
							<tfoot>
							<tr>
								<th>
									Room
								</th>
								<th>
									Cottage
								</th>
								<th>
									Name
								</th>
								<th>
									Check In Date
								</th>
								<th>
									Check Out Date
								</th>
								<th>
									Mode of Payment
								</th>
								<th>
									Paid Amount
								</th>
								<th>
									Paid Date
								</th>
								<th>
									Total Price
								</th>
								<th>
									Created By
								</th>
								<th>
									Updated By
								</th>
								<th style="width: 10%;">
									Actions
								</th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('modules/reservations/index/approve_reservation_modal'); ?>
<?php $this->load->view('modules/reservations/index/complete_reservation_modal'); ?>
<?php $this->load->view('modules/reservations/index/view_details_modal') ?>
