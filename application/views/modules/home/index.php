<?php $this->load->view('modules/home/partials/_hero-wrap_div'); ?>

<section class="ftco-section services-section bg-light">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate">
				<h2 class="mb-4">The resort where you can do anything.</h2>
				<p>The Gicalde Farm is a relief the stress that has been
					around for a while because the resort offers various services. Come and experience firsthand the
					ways to alleviate your stress and have you relax.
				</p>
				<p>We are committed to provide excellent and quality service.We are driven by values, right
					character and positive attitude that are determined to make your experience worthwhile and
					memorable . . . </p> <br> <br>
				<p><a href="<?= site_url('home/about') ?>" class="btn btn-primary py-3 px-4">READ &nbsp;MORE</a></p>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><span class="flaticon-king-size"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Accommodations</h3>
								<p>The resort is primarily intended for the guests to unwind and enjoy. Our Resort's
									accommodation Welcomes people from children to adults. . .
								</p> <br>
								<p><a href="<?= site_url('home/about') ?>"> Read More.</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><span class="flaticon-route"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Location</h3>
								<p>The resort is a place of relaxation for guests. It is family-friendly and the
									place is quiet and peaceful, the perfect quality time to spend with your friends
									and families. . .</p>
								<p><a href="<?= site_url('home/about') ?>"> Read More.</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><span class="flaticon-sun-umbrella"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Activities</h3>
								<p>The Gicalde Farm provides a place for the guests to be rested. The resort
									will offer more activities like Kayak, Camping, and more, to make your stay
									memorable. . .</p>
								<p><a href="<?= site_url('home/about') ?>"> Read More.</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><span class="flaticon-tour-guide"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Management</h3>
								<p>The resort management makes sure that our guest arrives safely and on time. We
									provide relaxation and peace inside the resort by keeping things in order. . .
								</p>
								<p><a href="<?= site_url('home/about') ?>"> Read More.</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('modules/home/partials/_summary_section') ?>

<br><br>
<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Our Rooms</h2>
			</div>
		</div>

		<div class="row">
			<?php if (!empty($rooms)) : ?>
				<?php foreach ($rooms as $key => $value) : ?>
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<div id="carousel_rooms" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<?php if (!empty($value['room_photos'])) : ?>
										<?php foreach ($value['room_photos'] as $room_photo_key => $room_photo_val) : ?>
											<li data-target="#carousel_rooms" data-slide-to="<?= $room_photo_key; ?>"
												class="<?= $room_photo_key == 0 ? 'active' : null; ?>"></li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ol>
								<div class="carousel-inner">
									<?php if (!empty($value['room_photos'])) : ?>
										<?php foreach ($value['room_photos'] as $room_photo_key => $room_photo_val) : ?>
											<div class="carousel-item <?= $room_photo_key == 0 ? 'active' : null; ?>">
												<img src="<?= site_url('assets/uploads/rooms/' . $room_photo_val['photo_file_name']) ?>"
													 class="d-block w-100"
													 alt="<?= $room_photo_val['photo_file_name']; ?>">
											</div>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
								<a class="carousel-control-prev" href="#carousel_rooms" role="button"
								   data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carousel_rooms" role="button"
								   data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="text p-4">
								<?php if ($value['slots'] > 0) : ?>
									<span class="badge badge-success">Available</span>
								<?php else: ?>
									<?php $reservations = get_all_reservations_by_room_id($value['id']); ?>
									<?php if (!empty($reservations)) : ?>
										<?php foreach ($reservations as $reservation_val) : ?>
											<span class="badge badge-danger"><?= view_date($reservation_val['check_in_date']);?></span>
										<?php endforeach; ?>
									<?php endif; ?>
								<?php endif; ?>
								<span class="price"><?= money_php($value['price']) ?></span>
<!--								<span class="days">--><?php //= $value['description']; ?><!--</span>-->
								<h3><a href=""><?= strtoupper($value['name']); ?></a></h3>
								<center>
									<ul>
										<li><span class="ion-ios-people"></span><?= $value['no_of_guests']; ?> Guests
										</li>
										<li><span class="flaticon-king-size"></span><?= $value['no_of_rooms']; ?>
											Bedrooms
										</li>
									</ul>
									<ul>
										<li><span class="flaticon-shower"></span>Individual CR</li>
										<li><span class="flaticon-sun-umbrella"></span>Kitchen &amp; Living Room</li>
									</ul>
									<?php if ($value['slots'] > 0) : ?>
										<a href="<?= site_url('home/book?room_id=' . $value['id']) ?>"
										   class="btn btn-primary"> <span>&nbsp;&nbsp; Book now &nbsp;&nbsp;</span></a>
									<?php else: ?>
										<a href="javascript:void(0);" class="btn btn-primary"
										   onclick="return alert('This room is fully booked.');"><span>&nbsp;&nbsp; Book now &nbsp;&nbsp;</span></a>
									<?php endif; ?>
									&nbsp;&nbsp;
									<a href="<?= site_url('home/gallery') ?>" class="btn btn-primary"> <span>&nbsp; More Photos
										&nbsp;</span></a>
								</center>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">OUR COTTAGES</h2>
			</div>
		</div>
		<div class="row">
			<?php if (!empty($cottages)) : ?>
				<?php foreach ($cottages as $key => $value) : ?>
					<div class="col-md-4 ftco-animate">
						<div class="project-wrap">
							<div id="carousel_cottages" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<?php if (!empty($value['cottage_photos'])) : ?>
										<?php foreach ($value['cottage_photos'] as $cottage_photo_key => $cottage_photo_val) : ?>
											<li data-target="#carousel_cottages"
												data-slide-to="<?= $cottage_photo_key; ?>"
												class="<?= $cottage_photo_key == 0 ? 'active' : null; ?>"></li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ol>
								<div class="carousel-inner">
									<?php if (!empty($value['cottage_photos'])) : ?>
										<?php foreach ($value['cottage_photos'] as $cottage_photo_key => $cottage_photo_val) : ?>
											<div class="carousel-item <?= $cottage_photo_key == 0 ? 'active' : null; ?>">
												<img src="<?= site_url('assets/uploads/cottages/' . $cottage_photo_val['photo_file_name']) ?>"
													 class="d-block w-100"
													 alt="<?= $cottage_photo_val['photo_file_name']; ?>">
											</div>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
								<a class="carousel-control-prev" href="#carousel_cottages" role="button"
								   data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carousel_cottages" role="button"
								   data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="text p-4">
								<?php if ($value['slots'] > 0) : ?>
									<span class="badge badge-success">Available</span>
								<?php else: ?>
									<span class="badge badge-danger">Fully Booked</span>
								<?php endif; ?>
								<span class="price"><?= money_php($value['price']) ?></span>
								<span class="days"><?= $value['description']; ?></span>
								<h3><a href=""><?= strtoupper($value['name']); ?></a></h3>
								<center>
									<ul>
										<li><span class="ion-ios-people"></span><?= $value['no_of_guests']; ?> Guests
										</li>
									</ul>
									<?php if ($value['slots'] > 0) : ?>
										<a href="<?= site_url('home/book?cottage_id=' . $value['id']) ?>"
										   class="btn btn-primary"><span>&nbsp;&nbsp; Book now &nbsp;&nbsp;</span></a>
									<?php else: ?>
										<a href="javascript:void(0);" class="btn btn-primary"
										   onclick="return alert('This cottage is fully booked.');"><span>&nbsp;&nbsp; Book now &nbsp;&nbsp;</span></a>
									<?php endif; ?>

									&nbsp;&nbsp;
									<a href="<?= site_url('home/gallery') ?>" class="btn btn-primary"> <span>&nbsp; More Photos
										&nbsp;</span></a>
								</center>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php $this->load->view('modules/home/partials/_testimonial_section'); ?>
<?php $this->load->view('modules/home/partials/_facebook_recent_post_section'); ?>



