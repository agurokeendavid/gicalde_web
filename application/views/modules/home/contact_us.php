<div class="hero-wrap js-fullheight" style="background-image: url('<?= site_url('assets/images/5.jpg') ?>');"
	 data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
			 data-scrollax-parent="true">
			<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
				<p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.9 }"></p>
				<h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pb contact-section">

	<div class="container">

		<section class="row justify-content-center pb-4">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<h2 class="mb-4">CONTACT US</h2>
			</div>
		</section>

		<div class="row d-flex contact-info">
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-map-signs"></span>
					</div>
					<h3 class="mb-2">Address</h3>
					<p><a href="">Balinmanok, Brgy. Osmena Dasol, Pangasinan, Philippines</a></p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-phone2"></span>
					</div>
					<h3 class="mb-2">Contact Number</h3>
					<p><a href="tel://+63992 324 5647" TARGET="_blank">+63992 324 5647 <br> +63927 485 4839</a></p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-paper-plane"></span>
					</div>
					<h3 class="mb-2">Email Address</h3>
					<p><a href="gicaldefarm@gmail.com">gicaldefarm@gmail.com</a></p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-globe"></span>
					</div>
					<h3 class="mb-2">Website</h3>
					<p><a href="<?= base_url() ?>" TARGET="_blank"><?= SYSTEM_LINK; ?></a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">
		<div class="row block-12">
			<div class="col-md-6 order-md-last d-flex">
				<form id="form" role="form" method="post" class="bg-light p-5 contact-form">
					<h1>Get In Touch!</h1><br>
					<div class="form-group">
						<input id="name" name="name" type="text" class="form-control" placeholder="Your Name" required autofocus>
					</div>
					<div class="form-group">
						<input id="email_address" name="email_address" type="text" class="form-control" placeholder="Your Email" required>
					</div>
					<div class="form-group">
						<input id="subject" name="subject" type="text" class="form-control" placeholder="Subject">
					</div>
					<div class="form-group">
						<textarea id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
					</div>
				</form>

			</div>

			<div class="col-md-6 d-flex">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2720.183837204855!2d119.80268025111481!3d15.92304627096476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3393f2db06f1f6d9%3A0xb25a4d26e6b4fb84!2sVilla%20Balinmanok%20(bmk)%20Private%20Beach%20Resorts!5e1!3m2!1sen!2sph!4v1654955949756!5m2!1sen!2sph"
					width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</section>
