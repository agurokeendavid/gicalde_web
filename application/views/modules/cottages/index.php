<div class="content-wrapper">
	<?php $this->load->view('partials/dashboard_page_header') ?>
	<div class="row mt-3">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">
						<?= $page_data['module']; ?>
					</h4>
					<p class="card-description">
						<?= $page_data['section']; ?>
					</p>
					<div class="table-responsive">
						<table id="table" class="table table-hover table-striped table-bordered">
							<thead>
							<tr>
								<th>
									ID
								</th>
								<th>
									Cottage
								</th>
								<th>
									No. of Guests
								</th>
								<th>
									Price
								</th>
								<th>
									Slots
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
							<?php if (!empty($cottages)) : ?>
								<?php foreach ($cottages as $value) : ?>
									<tr>
										<td><?= $value['id']; ?></td>
										<td><?= $value['name']; ?></td>
										<td><?= $value['no_of_guests']; ?></td>
										<td><?= money_php($value['price']); ?></td>
										<td><?= $value['slots']; ?></td>
										<td><?= '<div class="badge bg-info">' . get_person_name($value['created_by']) . '</div>' . ' <div>' . view_date($value['created_at'], 'date_am_pm') . '</div>'; ?></td>
										<td><?= !empty($value['updated_at']) ? '<div class="badge bg-info">' . get_person_name($value['updated_by']) . '</div>' . ' <div>' . view_date($value['updated_at'], 'date_am_pm') . '</div>' : 'N/A' ?></td>
										<td class="btn-group">
											<a rel="tooltip" class="btn btn-sm btn-info view-row"
											   href="javascript:void(0);" data-id="<?= $value['id']; ?>" title="View"><i
													class="fa fa-eye"></i></a>
											<a id="edit" rel="tooltip" class="btn btn-sm btn-primary"
											   href="<?= site_url('cottages/form/' . $value['id']) ?>" title="Update"><i
													class="fa fa-edit"></i></a>
											<a href="javascript:void(0);" class="btn btn-sm btn-danger delete-row"
											   data-id="<?= $value['id']; ?>" title="Delete"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
							</tbody>
							<tfoot>
							<tr>
								<th>
									ID
								</th>
								<th>
									Cottage
								</th>
								<th>
									No. of Guests
								</th>
								<th>
									Price
								</th>
								<th>
									Slots
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
