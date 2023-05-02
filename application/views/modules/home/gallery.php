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
<section class="ftco-section testimony-section bg-bottom" id="gallery_section">
	<div class="container">
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="row justify-content-center">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<h2 class="mb-4"><?= SYSTEM_TITLE; ?> Gallery</h2>
					</div>
				</div>
				<?php if ($photos) : ?>
					<?php if (count($photos) > 0) : ?>
						<div class="carousel-testimony owl-carousel ftco-owl">
							<?php foreach ($photos as $key => $value) : ?>
								<?php if ($key <= 3) : ?>
									<div class="col-md-12 ftco-animate">
										<div class="project-destination1">
											<div class="img" style="background-image: url('<?= base_url() ?>assets/uploads/galleries/<?= $value['photo_file_name']?>');">
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if (count($photos) > 4) : ?>
						<div class="carousel-testimony owl-carousel ftco-owl">
							<?php foreach ($photos as $key => $value) : ?>
								<?php if ($key >= 4 && $key <= 7) : ?>
									<div class="col-md-12 ftco-animate">
										<div class="project-destination1">
											<div class="img" style="background-image: url('<?= base_url() ?>assets/uploads/galleries/<?= $value['photo_file_name']?>');">
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if (count($photos) > 8) : ?>
						<div class="carousel-testimony owl-carousel ftco-owl">
							<?php foreach ($photos as $key => $value) : ?>
								<?php if ($key >= 8 && $key <= 11) : ?>
									<div class="col-md-12 ftco-animate">
										<div class="project-destination1">
											<div class="img" style="background-image: url('<?= base_url() ?>assets/uploads/galleries/<?= $value['photo_file_name']?>');">
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if (count($photos) > 12) : ?>
						<div class="carousel-testimony owl-carousel ftco-owl">
							<?php foreach ($photos as $key => $value) : ?>
								<?php if ($key >= 12 && $key <= 15) : ?>
									<div class="col-md-12 ftco-animate">
										<div class="project-destination1">
											<div class="img" style="background-image: url('<?= base_url() ?>assets/uploads/galleries/<?= $value['photo_file_name']?>');">
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<!-- Facebook Recent Post Section -->
<?php $this->load->view('modules/home/partials/_facebook_recent_post_section') ?>
