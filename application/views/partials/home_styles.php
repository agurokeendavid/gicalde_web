<link rel="icon" type="image/png" href="<?= site_url('assets/images/gicalde_logo.png'); ?>">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/open-iconic-bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/animate.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/owl.carousel.min.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/owl.theme.default.min.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/magnific-popup.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/aos.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/ionicons.min.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/bootstrap-datepicker.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/jquery.timepicker.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/flaticon.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/icomoon.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/jquery-toast-plugin/jquery.toast.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/jquery-ui/jquery-ui.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/plugins/fullcalendar/fullcalendar.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/home/css/style.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/custom/home_overall.css'); ?>">
<link rel="stylesheet" href="<?= site_url('assets/custom/overall.css')?>">

<?php if (isset($page_data['styles_path']) && !empty($page_data['styles_path'])) : ?>
	<?php foreach ($page_data['styles_path'] as $value) : ?>
		<link href="<?= site_url('assets/' . $value . '.css') ?>" rel="stylesheet">
	<?php endforeach; ?>
<?php endif; ?>
