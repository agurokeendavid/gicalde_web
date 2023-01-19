<link rel="icon" type="image/png" href="<?= site_url('assets/images/gicalde_logo.png') ?>">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= site_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/temps/user/css/style.css') ?>">

<link rel="stylesheet" href="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/custom/auth_overall.css') ?>">

<?php if (isset($page_data['styles_path']) && !empty($page_data['styles_path'])) : ?>
	<?php foreach ($page_data['styles_path'] as $value) : ?>
		<link href="<?= site_url('assets/' . $value . '.css') ?>" rel="stylesheet">
	<?php endforeach; ?>
<?php endif; ?>
