<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $page_data['section'] . ' | ' . SYSTEM_TITLE ?></title>
	<?php $this->load->view('partials/dashboard_styles'); ?>
</head>

<body>
<div class="container-scroller">
	<?php $this->load->view('partials/dashboard_navbar'); ?>
	<div class="container-fluid page-body-wrapper">
		<?php $this->load->view('partials/dashboard_settings_panel'); ?>
		<?php $this->load->view('partials/dashboard_sidebar'); ?>
		<div class="main-panel">
