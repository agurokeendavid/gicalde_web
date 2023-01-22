<script src="<?= site_url('assets/temps/home/js/jquery.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/jquery-migrate-3.0.1.min.js')?>"></script>
<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= site_url('assets/temps/home/js/popper.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/bootstrap.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/jquery.easing.1.3.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/jquery.waypoints.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/jquery.stellar.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/owl.carousel.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/jquery.magnific-popup.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/aos.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/jquery.animateNumber.min.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/bootstrap-datepicker.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/scrollax.min.js')?>"></script>
<script src="<?= site_url('assets/plugins/jquery-toast-plugin/jquery.toast.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= site_url('assets/temps/home/js/google-map.js')?>"></script>
<script src="<?= site_url('assets/temps/home/js/main.js')?>"></script>
<?php $this->load->view('partials/global_js') ?>
<script src="<?= site_url('assets/custom/amagiloader.js') ?>"></script>
<script src="<?= site_url('assets/custom/global.js') ?>"></script>
<?php if (isset($page_data['scripts_path']) && !empty($page_data['scripts_path'])) : ?>
	<?php foreach ($page_data['scripts_path'] as $value) : ?>
		<script src="<?= site_url('assets/' . $value . '.js') ?>"></script>
	<?php endforeach; ?>
<?php endif; ?>
