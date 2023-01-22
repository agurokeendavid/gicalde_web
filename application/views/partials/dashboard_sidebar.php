<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<?php if ($this->session->userdata('user')) : ?>
		<ul class="nav">
			<li class="nav-item">
				<div class="d-flex sidebar-profile">
					<div class="sidebar-profile-image">
						<img src="<?= site_url('assets/images/user_logo_blue_icon.png') ?>" alt="image">
						<span class="sidebar-status-indicator"></span>
					</div>
					<div class="sidebar-profile-name">
						<p class="sidebar-name">
							<?= $this->session->userdata('user')['first_name'] ?>
						</p>
						<p class="sidebar-designation">
							<?= Dropdown::get_static('roles', $this->session->userdata('user')['role_id'], 'view'); ?>
						</p>
					</div>
				</div>
				<p class="sidebar-menu-title">Dash menu</p>
			</li>
			<?php if ($this->session->userdata('user')['role_id'] == ROLE_ADMINISTRATOR) : ?>
				<li class="nav-item <?= (strtolower($page_data['section']) == 'main') ? 'active' : null; ?>">
					<a class="nav-link" href="<?= base_url() ?>dashboard/admin_main">
						<i class="typcn typcn-device-desktop menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item <?= (strtolower($page_data['section']) == 'messages') ? 'active' : null; ?>">
					<a class="nav-link" href="#">
						<i class="typcn typcn-message menu-icon"></i>
						<span class="menu-title">Messages</span>
					</a>
				</li>
				<li class="nav-item <?= (strtolower($page_data['section']) == 'pending reservations' || strtolower($page_data['section']) == 'ongoing reservations' || strtolower($page_data['section']) == 'check in reservations' || strtolower($page_data['section']) == 'completed reservations' || strtolower($page_data['section']) == 'cancelled reservations') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#reservations_nav" aria-expanded="false"
					   aria-controls="reservations_nav">
						<i class="typcn typcn-document-text menu-icon"></i>
						<span class="menu-title">Reservations</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['section']) == 'pending reservations' || strtolower($page_data['section']) == 'ongoing reservations' || strtolower($page_data['section']) == 'check in reservations' || strtolower($page_data['section']) == 'completed reservations' || strtolower($page_data['section']) == 'cancelled reservations') ? 'active' : null; ?>"
						 id="reservations_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['section']) == 'pending reservations') ? 'active' : null; ?>"
										href="#">Pending</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['section']) == 'ongoing reservations' ? 'active' : null; ?>"
								   href="#">Ongoing</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['section']) == 'check in reservations' ? 'active' : null; ?>"
								   href="#">Check In</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['section']) == 'completed reservations' ? 'active' : null; ?>"
								   href="#">Completed</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['section']) == 'cancelled reservations' ? 'active' : null; ?>"
								   href="#">Cancelled</a>
							</li>
						</ul>
					</div>
				</li>
				<li
						class="nav-item <?= (strtolower($page_data['section']) == 'add staff' || strtolower($page_data['section']) == 'manage staffs' || strtolower($page_data['section']) == 'update staff') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#staff_nav" aria-expanded="false"
					   aria-controls="staff_nav">
						<i class="typcn typcn-user menu-icon"></i>
						<span class="menu-title">Staffs</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['section']) == 'add staff' || strtolower($page_data['section']) == 'manage staffs' || strtolower($page_data['section']) == 'update staff') ? 'show' : null; ?>"
						 id="staff_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['section']) == 'add staff') ? 'active' : null; ?>"
										href="<?= site_url('users/form') ?>">Add Staff</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= (strtolower($page_data['section']) == 'manage staffs' || strtolower($page_data['section']) == 'update staff') ? 'active' : null; ?>"
								   href="<?= site_url('users') ?>">Manage Staffs</a>
							</li>
						</ul>
					</div>
				</li>

				<li
						class="nav-item <?= (strtolower($page_data['section']) == 'add room' || strtolower($page_data['section']) == 'manage rooms' || strtolower($page_data['section']) == 'update room') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#rooms_nav" aria-expanded="false"
					   aria-controls="rooms_nav">
						<i class="typcn typcn-home menu-icon"></i>
						<span class="menu-title">Rooms</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['section']) == 'add room' || strtolower($page_data['section']) == 'manage rooms' || strtolower($page_data['section']) == 'update room') ? 'show' : null; ?>"
						 id="rooms_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['section']) == 'add room') ? 'active' : null; ?>"
										href="<?= site_url('rooms/form') ?>">Add Room</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= (strtolower($page_data['section']) == 'manage rooms' || strtolower($page_data['section']) == 'update room') ? 'active' : null; ?>"
								   href="<?= site_url('rooms') ?>">Manage Rooms</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="nav-item <?= (strtolower($page_data['section']) == 'add cottage' || strtolower($page_data['section']) == 'manage cottages' || strtolower($page_data['section']) == 'update cottage') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#cottages_nav" aria-expanded="false"
					   aria-controls="cottages_nav">
						<i class="typcn typcn-waves menu-icon"></i>
						<span class="menu-title">Cottages</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['section']) == 'add cottage' || strtolower($page_data['section']) == 'manage cottages' || strtolower($page_data['section']) == 'update cottage') ? 'show' : null; ?>"
						 id="cottages_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['section']) == 'add cottage') ? 'active' : null; ?>"
										href="<?= site_url('cottages/form') ?>">Add Cottage</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= (strtolower($page_data['section']) == 'manage cottages' || strtolower($page_data['section']) == 'update cottage') ? 'active' : null; ?>"
								   href="<?= site_url('cottages') ?>">Manage Cottages</a>
							</li>
						</ul>
					</div>
				</li>
			<?php elseif ($this->session->userdata('user')['role_id'] == ROLE_STAFF) : ?>
				<li class="nav-item <?= (strtolower($page_data['title']) == 'main') ? 'active' : null; ?>">
					<a class="nav-link" href="<?= base_url() ?>dashboard/staff_main">
						<i class="typcn typcn-device-desktop menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item <?= (strtolower($page_data['title']) == 'messages') ? 'active' : null; ?>">
					<a class="nav-link" href="<?= base_url() ?>messages/admin_messages">
						<i class="typcn typcn-message menu-icon"></i>
						<span class="menu-title">Messages</span>
					</a>
				</li>
				<li class="nav-item <?= (strtolower($page_data['title']) == 'pending reservations' || strtolower($page_data['title']) == 'ongoing reservations' || strtolower($page_data['title']) == 'check in reservations' || strtolower($page_data['title']) == 'completed reservations' || strtolower($page_data['title']) == 'cancelled reservations') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#reservations_nav" aria-expanded="false"
					   aria-controls="reservations_nav">
						<i class="typcn typcn-document-text menu-icon"></i>
						<span class="menu-title">Reservations</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['title']) == 'pending reservations' || strtolower($page_data['title']) == 'ongoing reservations' || strtolower($page_data['title']) == 'check in reservations' || strtolower($page_data['title']) == 'completed reservations' || strtolower($page_data['title']) == 'cancelled reservations') ? 'active' : null; ?>"
						 id="reservations_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['title']) == 'pending reservations') ? 'active' : null; ?>"
										href="<?= base_url() ?>reservations/manage_pending">Pending</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['title']) == 'ongoing reservations' ? 'active' : null; ?>"
								   href="<?= base_url() ?>reservations/manage_ongoing">Ongoing</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['title']) == 'check in reservations' ? 'active' : null; ?>"
								   href="<?= base_url() ?>reservations/manage_checkin">Check In</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['title']) == 'completed reservations' ? 'active' : null; ?>"
								   href="<?= base_url() ?>reservations/manage_completed">Completed</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= strtolower($page_data['title']) == 'cancelled reservations' ? 'active' : null; ?>"
								   href="<?= base_url() ?>reservations/manage_cancelled">Cancelled</a>
							</li>
						</ul>
					</div>
				</li>

				<li
						class="nav-item <?= (strtolower($page_data['title']) == 'add room' || strtolower($page_data['title']) == 'manage rooms' || strtolower($page_data['title']) == 'update room') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#rooms_nav" aria-expanded="false"
					   aria-controls="rooms_nav">
						<i class="typcn typcn-home menu-icon"></i>
						<span class="menu-title">Rooms</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['title']) == 'add room' || strtolower($page_data['title']) == 'manage rooms' || strtolower($page_data['title']) == 'update room') ? 'show' : null; ?>"
						 id="rooms_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['title']) == 'add room') ? 'active' : null; ?>"
										href="<?= base_url() ?>rooms/form">Add Room</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= (strtolower($page_data['title']) == 'manage rooms' || strtolower($page_data['title']) == 'update room') ? 'active' : null; ?>"
								   href="<?= base_url() ?>rooms/manage">Manage Rooms</a>
							</li>
						</ul>
					</div>
				</li>
				<li
						class="nav-item <?= (strtolower($page_data['title']) == 'add amenity' || strtolower($page_data['title']) == 'manage amenities' || strtolower($page_data['title']) == 'update amenity') ? 'active' : null; ?>">
					<a class="nav-link" data-toggle="collapse" href="#amenities_nav" aria-expanded="false"
					   aria-controls="amenities_nav">
						<i class="typcn typcn-waves menu-icon"></i>
						<span class="menu-title">Amenities</span>
						<i class="typcn typcn-chevron-right menu-arrow"></i>
					</a>
					<div class="collapse <?= (strtolower($page_data['title']) == 'add amenity' || strtolower($page_data['title']) == 'manage amenities' || strtolower($page_data['title']) == 'update amenity') ? 'show' : null; ?>"
						 id="amenities_nav">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a
										class="nav-link <?= (strtolower($page_data['title']) == 'add amenity') ? 'active' : null; ?>"
										href="<?= base_url() ?>amenities/form">Add Amenities</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= (strtolower($page_data['title']) == 'manage amenities' || strtolower($page_data['title']) == 'update amenity') ? 'active' : null; ?>"
								   href="<?= base_url() ?>amenities/manage">Manage Amenities</a>
							</li>
						</ul>
					</div>
				</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</nav>
