<?php $this->load->view('modules/home/partials/_hero-wrap_div') ?>
<?php $this->load->view('modules/home/book/book_modal') ?>

<section class="ftco-section" id="make_your_reservation_section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Make Your Reservation</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card border-dark shadow-lg">
					<div class="card-body">
						<div class="alert alert-success" role="alert">
							<h4 class="alert-heading">Take  Note!</h4>
							<p>Before creating a reservation, please pay the 50% down-payment of your payment to process your reservation. After you fill-up your information payment details will be sent to your email.</p>
						</div>
						<hr>
						<h4>Reservation Type: <?= ucfirst(@$reservation_type);?></h4>
						<h4>Name: <?= @$info['name'];?></h4>
						<hr>
						<a href="<?= site_url('home')?>" class="btn btn-primary">Go back</a>
						<input type="hidden" id="reservation_type" name="reservation_type" value="<?= @$reservation_type; ?>" readonly>
						<input type="hidden" id="id" name="id" value="<?= @$info['id']; ?>" readonly>
						<div id="reservation_calendar"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
