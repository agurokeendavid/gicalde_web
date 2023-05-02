<script src="<?= site_url('assets/plugins/js/vendor.bundle.base.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= site_url('assets/plugins/jquery-toast-plugin/jquery.toast.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/pdfmake/vfs_font.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/typeahead.js/typeahead.bundle.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/select2/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/moment/moment.min.js') ?>"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= site_url('assets/temps/dashboard/js/off-canvas.js') ?>"></script>
<script src="<?= site_url('assets/temps/dashboard/js/hoverable-collapse.js') ?>"></script>
<script src="<?= site_url('assets/temps/dashboard/js/template.js') ?>"></script>
<script src="<?= site_url('assets/temps/dashboard/js/settings.js') ?>"></script>
<script src="<?= site_url('assets/temps/dashboard/js/todolist.js') ?>"></script>
<!-- endinject -->

<script src="<?= site_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/chart.js/chartjs-plugin-datalabels.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/chart.js/jspdf.js') ?>"></script>
<script src="<?= site_url('assets/temps/dashboard/js/typeahead.js') ?>"></script>
<script src="<?= site_url('assets/temps/dashboard/js/select2.js') ?>"></script>
<?php $this->load->view('partials/global_js') ?>
<script src="<?= site_url('assets/custom/amagiloader.js') ?>"></script>
<script src="<?= site_url('assets/custom/global.js') ?>"></script>
<script src="<?= site_url('assets/custom/dashboard_overall.js') ?>"></script>

<?php if (isset($page_data['scripts_path']) && !empty($page_data['scripts_path'])) : ?>
	<?php foreach ($page_data['scripts_path'] as $value) : ?>
		<script src="<?= site_url('assets/' . $value . '.js') ?>"></script>
	<?php endforeach; ?>
<?php endif; ?>
