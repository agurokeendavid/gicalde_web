$(function() {
	const updateProfileFormEl = $('#update_profile_form');
	const changePasswordFormEl = $('#change_password_form');
	const updateProfileLinkEl = $('#update_profile_link');
	const changePasswordLinkEl = $('#change_password_link');
	const updateProfileModalEl = $('#update_profile_modal');
	const changePasswordModalEl = $('#change_password_modal');
	const setPaymentDetailsModalEl = $('#set_payment_details_modal');
	const setPaymentDetailsLinkEl = $('#set_payment_details_link');
	const setPaymentDetailsFormEl = $('#set_payment_details_form');


	setPaymentDetailsFormEl.on('submit', function(e) {
		e.preventDefault();

		if (!$(this).valid()) return;

		$.ajax({
			url: `${BASE_URL}payment_details/update`,
			type: 'POST',
			async: true,
			data: $(this).serialize(),
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response.status) {
					Swal.fire({
						title: 'Success!',
						text: response.message,
						icon: 'success'
					}).then(function () {
						location.reload();
					});
					return;
				}
				Swal.fire({
					title: 'Failed!',
					text: response.message,
					icon: 'error'
				});
			},
			error: function (result) {
				console.log(result);
				Swal.fire({
					title: 'Failed!',
					text: 'Error has been occurred, Please try again later.',
					icon: 'error'
				});
			},
			complete: function () {
				AmagiLoader.hide();
			}
		});
	})

	setPaymentDetailsLinkEl.on('click', function(e) {
		e.preventDefault();
		setPaymentDetailsModalEl.modal('toggle');
	});

	setPaymentDetailsModalEl.on('shown.bs.modal', function(e) {
		e.preventDefault();
		$.ajax({
			url: `${BASE_URL}payment_details/get_first`,
			type: 'GET',
			async: true,
			data: null,
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response) {
					$('#set_payment_details_id').val(response.id);
					$('#set_payment_details_gcash_name').val(response.gcash_name);
					$('#set_payment_details_gcash_mobile_number').val(response.gcash_account_number);
					$('#set_payment_details_bank_account_name').val(response.bank_account_name);
					$('#set_payment_details_bank_account_number').val(response.bank_account_number);
					return;
				}
				Swal.fire({
					title: 'Failed!',
					text: response.message,
					icon: 'error'
				});
			},
			error: function (result) {
				console.log(result);
				Swal.fire({
					title: 'Failed!',
					text: 'Error has been occurred, Please try again later.',
					icon: 'error'
				});
			},
			complete: function () {
				AmagiLoader.hide();
			}
		});
	});

	$('.btn-show-info').on('click', function(e) {
		e.preventDefault();
		$.toast({
			heading: 'Current Page',
			text: CURRENT_PAGE,
			position: 'top-right',
			icon: 'info'
		});
	})

	changePasswordLinkEl.on('click', function(e) {
		e.preventDefault();
		changePasswordModalEl.modal('toggle');
	});

	changePasswordFormEl.on('submit', function (e) {
		e.preventDefault();
		if (!changePasswordFormEl.valid()) return;
		$.ajax({
			url: `${BASE_URL}users/change_password`,
			type: 'POST',
			async: true,
			data: $(this).serialize(),
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response.status == RESULT_SUCCESS) {
					Swal.fire({
						title: 'Success!',
						text: response.message,
						icon: 'success'
					}).then(function () {
						window.location.reload();
					});
					return;
				}
				Swal.fire({
					title: 'Failed!',
					text: response.message,
					icon: 'error'
				});
			},
			error: function (result) {
				console.log(result);
				Swal.fire({
					title: 'Failed!',
					text: 'Error has been occurred, Please try again later.',
					icon: 'error'
				});
			},
			complete: function () {
				AmagiLoader.hide();
			}
		});
	});

	$('#update_profile_gender').select2({
		width: '100%'
	});

	updateProfileLinkEl.on('click', function (e) {
		e.preventDefault();
		$.ajax({
			url: `${base_url}users/get`,
			type: 'GET',
			async: true,
			data: null,
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response) {
					$('#update_profile_employee_code').val(response.employee_code);
					$('#update_profile_first_name').val(response.first_name);
					$('#update_profile_middle_name').val(response.middle_name);
					$('#update_profile_last_name').val(response.last_name);
					$('#update_profile_dob').val(response.dob);
					$('#update_profile_gender').val(response.gender).change();
					$('#update_profile_contact_no').val(response.contact_no);
					$('#update_profile_address').val(response.address);
					updateProfileModalEl.modal('toggle');
					return;
				}
				Swal.fire({
					title: 'Failed!',
					text: response.message,
					icon: 'error'
				});
			},
			error: function (result) {
				console.log(result);
				Swal.fire({
					title: 'Failed!',
					text: 'Error has been occurred, Please try again later.',
					icon: 'error'
				});
			},
			complete: function () {
				AmagiLoader.hide();
			}
		});
	});

	updateProfileFormEl.on('submit', function (e) {
		e.preventDefault();
		if (!updateProfileFormEl.valid()) return;
		$.ajax({
			url: `${base_url}users/update_profile`,
			type: 'POST',
			async: true,
			data: $(this).serialize(),
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response.status == RESULT_SUCCESS) {
					Swal.fire({
						title: 'Success!',
						text: response.message,
						icon: 'success'
					}).then(function () {
						window.location.reload();
					});
					return;
				}
				Swal.fire({
					title: 'Failed!',
					text: response.message,
					icon: 'error'
				});
			},
			error: function (result) {
				console.log(result);
				Swal.fire({
					title: 'Failed!',
					text: 'Error has been occurred, Please try again later.',
					icon: 'error'
				});
			},
			complete: function () {
				AmagiLoader.hide();
			}
		});
	});

	$('#update_profile_gender').select2({
		width: '100%'
	});

});
