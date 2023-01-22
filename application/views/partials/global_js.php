<script type="text/javascript">
	const BASE_URL = '<?= base_url(); ?>';
	const CURRENT_USER_ID = '<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : null; ?>';
	const BOOL_YES = <?= BOOL_YES; ?>;
	const BOOL_NO = <?= BOOL_NO; ?>;
	const RESULT_FAILED = <?= RESULT_FAILED; ?>;
	const RESULT_SUCCESS = <?= RESULT_SUCCESS; ?>;
	const ROLE_ADMINISTRATOR = <?= ROLE_ADMINISTRATOR; ?>;
	const ROLE_STAFF = <?= ROLE_STAFF; ?>;
	const RESERVATION_STATUS_PENDING = <?= RESERVATION_STATUS_PENDING ?>;
	const RESERVATION_STATUS_APPROVED = <?= RESERVATION_STATUS_APPROVED ?>;
	const RESERVATION_STATUS_COMPLETED = <?= RESERVATION_STATUS_COMPLETED ?>;
	const RESERVATION_STATUS_CANCELLED = <?= RESERVATION_STATUS_CANCELLED ?>;
	const RESULT_STATUS = '<?= $this->session->userdata('RESULT_STATUS'); ?>';
	const RESULT_MESSAGE = '<?= $this->session->userdata('RESULT_MESSAGE'); ?>';
	<?php
	$this->session->unset_userdata('RESULT_STATUS');
	$this->session->unset_userdata('RESULT_MESSAGE');
	?>
</script>
