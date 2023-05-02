<!-- base:css -->
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= site_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/typicons.font/font/typicons.css')?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/css/vendor.bundle.base.css')?>">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="<?= site_url('assets/plugins/jquery-toast-plugin/jquery.toast.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/select2/select2.min.css')?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap-theme/select2-bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/buttons/buttons.dataTables.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="<?= site_url('assets/temps/dashboard/css/vertical-layout-light/style.css')?>">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="<?= site_url('assets/plugins/mdi/css/materialdesignicons.min.css')?>">
<!-- End plugin css for this page -->
<link rel="icon" type="image/png" href="<?= site_url('assets/images/gicalde_logo.png') ?>">
<link rel="stylesheet" href="<?= site_url('assets/custom/dashboard_overall.css')?>">
<link rel="stylesheet" href="<?= site_url('assets/custom/overall.css')?>">

<?php if (isset($page_data['styles_path']) && !empty($page_data['styles_path'])) : ?>
	<?php foreach ($page_data['styles_path'] as $value) : ?>
		<link href="<?= site_url('assets/' . $value . '.css') ?>" rel="stylesheet">
	<?php endforeach; ?>
<?php endif; ?>
