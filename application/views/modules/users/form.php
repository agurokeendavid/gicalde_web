<div class="content-wrapper">
	<?php $this->load->view('partials/dashboard_page_header') ?>
	<div class="row mt-3">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">User Information</h4>
					<p class="card-description">Personal info</p>
					<hr>
					<form id="form" class="forms-sample" role="form" method="post">
						<input type="hidden" id="id" name="id" value="<?= @$info['id']; ?>" readonly>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="employee_code">Employee Code <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="employee_code" name="employee_code"
										   placeholder="Employee Code" value="<?= @$info['employee_code']; ?>" required
										   autofocus>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="email_address">Email Address <span
												class="text-danger">*</span></label>
									<input type="email" class="form-control" id="email_address" name="email_address"
										   placeholder="Email Address" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="first_name">First Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="first_name" name="first_name"
										   placeholder="First Name" value="<?= @$info['first_name']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input type="text" class="form-control" id="middle_name" name="middle_name"
										   placeholder="Middle Name" value="<?= @$info['middle_name']; ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="last_name">Last Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="last_name" name="last_name"
										   placeholder="Last Name" value="<?= @$info['last_name']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="dob">Date of Birth (dd/mm/yyyy) <span
												class="text-danger">*</span></label>
									<input type="date" class="form-control" id="dob" name="dob"
										   placeholder="Date of Birth" value="<?= @$info['dob']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="gender">Gender <span class="text-danger">*</span></label>
									<?= form_dropdown('gender', Dropdown_library::get_static('gender'), @$info['gender'], 'id="gender" required') ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_no">Contact No. <span class="text-danger">*</span></label>
									<input type="number" class="form-control" id="contact_no" name="contact_no"
										   placeholder="Contact No." value="<?= @$info['contact_no']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="address">Address <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="address" name="address"
										   placeholder="Address" value="<?= @$info['address']; ?>" required>
								</div>
							</div>
						</div>
						<div class="row float-right">
							<div class="col-sm-12">
								<a href="<?= base_url() ?>users/manage" class="btn btn-light mr-2">Cancel</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
