<!-- jQuery -->
<script src="<?= site_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= site_url('assets/temps/user/js/popper.js') ?>"></script>
<script src="<?= site_url('assets/temps/user/js/bootstrap.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
<script src="<?= site_url('assets/custom/amagiloader.js') ?>"></script>
<script src="<?= site_url('assets/temps/user/js/main.js') ?>"></script>
<?php $this->load->view('partials/global_js') ?>
<script src="<?= site_url('assets/custom/global.js') ?>"></script>
<script src="<?= site_url('assets/custom/auth_overall.js') ?>"></script>

<?php if (isset($page_data['scripts_path']) && !empty($page_data['scripts_path'])) : ?>
	<?php foreach ($page_data['scripts_path'] as $value) : ?>
		<script src="<?= site_url('assets/' . $value . '.js') ?>"></script>
	<?php endforeach; ?>
<?php endif; ?>
