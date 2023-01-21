<!-- partial:../../partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
		<a class="navbar-brand brand-logo" href="#"><img
					src="<?= site_url('assets/images/gicalde_logo.png') ?>" alt="logo"/></a>
		<a class="navbar-brand brand-logo-mini" href="#"><img
					src="<?= site_url('assets/images/gicalde_logo.png') ?>" alt="logo"/></a>
		<button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button"
				data-toggle="minimize">
			<span class="typcn typcn-th-menu"></span>
		</button>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
		<ul class="navbar-nav navbar-nav-right">
			<?php if ($this->session->userdata('user')) : ?>
				<?php if ($this->session->userdata('user')['role_id'] == ROLE_ADMINISTRATOR) : ?>
					<li class="nav-item dropdown  d-flex">
						<a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
						   id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="typcn typcn-cog mr-0"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
							 aria-labelledby="notificationDropdown">
							<p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-success">
										<i class="typcn typcn-info-large mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 id="set_payment_details_link" class="preview-subject font-weight-normal">Set
										Payment Details</h6>
								</div>
							</a>
						</div>
					</li>
				<?php endif; ?>
				<li class="nav-item nav-profile dropdown">
					<a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
						<i class="typcn typcn-user-outline mr-0"></i>
						<span class="nav-profile-name"><?= $this->session->userdata('user')['first_name'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
						<a id="update_profile_link" class="dropdown-item" href="javascript:void(0);">
							<i class="typcn typcn-user text-primary"></i>
							Update Profile
						</a>
						<a id="change_password_link" class="dropdown-item" href="javascript:void(0);">
							<i class="typcn typcn-cog text-primary"></i>
							Change Password
						</a>
						<a class="dropdown-item" href="<?= site_url('auth/logout') ?>">
							<i class="typcn typcn-power text-primary"></i>
							Logout
						</a>
					</div>
				</li>
			<?php endif; ?>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
				data-toggle="offcanvas">
			<span class="typcn typcn-th-menu"></span>
		</button>
	</div>
</nav>
