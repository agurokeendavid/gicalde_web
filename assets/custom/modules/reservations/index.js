$(function() {
	const tableEl = $('#table');
	const approveReservationModalEl = $('#approve_reservation_modal');
	const completeReservationModalEl = $('#complete_reservation_modal');
	const approveReservationFormEl = $('#approve_reservation_form');
	const completeReservationFormEl = $('#complete_reservation_form');
	const viewDetailsModalEl = $('#view_details_modal');

	$('.view-row').on('click', function(e) {
		e.preventDefault();
		clearValueControls([$('#view_id'), $('#view_room_id'), $('#view_cottage_id'), $('#view_client_name'), $('#view_check_in_date'), $('#view_check_out_date'), $('#view_mode_of_payment'), $('#view_paid_amount'), $('#view_paid_date'), $('#view_total_price'), $('#view_no_of_guests')]);
		$('#view_id').val($(this).data('id'));
		viewDetailsModalEl.modal('toggle');
	});

	viewDetailsModalEl.on('shown.bs.modal', function (e) {
		e.preventDefault();
		$.ajax({
			url: `${BASE_URL}reservations/get/${$('#view_id').val()}`,
			type: 'GET',
			async: true,
			data: null,
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response) {
					$('#view_room_id').val(response.room_id);
					$('#view_cottage_id').val(response.cottage_id);
					$('#view_client_name').val(response.last_name + ', ' + response.first_name);
					$('#view_check_in_date').val(response.check_in_date);
					$('#view_check_out_date').val(response.check_out_date);
					$('#view_mode_of_payment').val(response.mode_of_payment);
					$('#view_paid_amount').val(response.paid_amount);
					$('#view_paid_date').val(response.paid_date);
					$('#view_total_price').val(response.total_price);
					$('#view_no_of_guests').val(response.no_of_guests);
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



	completeReservationFormEl.on('submit', function(e) {
		e.preventDefault();

		if (!$(this).valid()) return;

		$.ajax({
			url: `${BASE_URL}reservations/update_status/${RESERVATION_STATUS_COMPLETED}`,
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
	});


	approveReservationFormEl.on('submit', function(e) {
		e.preventDefault();

		if (!$(this).valid()) return;

		$.ajax({
			url: `${BASE_URL}reservations/update_status/${RESERVATION_STATUS_APPROVED}`,
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
	});

	tableEl.dataTable({
		pageLength: 10,
		searchDelay: 500,
		order: [[0, 'desc']]
	});

	$('.cancel-row').on('click', function (e) {
		e.preventDefault();
		Swal.fire({
			title: 'Are you sure you want to cancel this record?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, cancel it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: `${BASE_URL}reservations/update_status/${RESERVATION_STATUS_CANCELLED}`,
					data: { id: $(this).data('id') },
					type: 'POST',
					async: true,
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
			}
		});
	});

	$('.approve-row').on('click', function(e) {
		e.preventDefault();
		clearValueControls([$('#approve_reservation_id'), $('#approve_reservation_paid_amount'), $('#approve_reservation_paid_date')]);
		$('#approve_reservation_id').val($(this).data('id'));
		approveReservationModalEl.modal('toggle');
	});

	$('.mark-as-completed-row').on('click', function(e) {
		e.preventDefault();
		clearValueControls([$('#complete_reservation_id'), $('#complete_reservation_paid_amount'), $('#complete_reservation_paid_date')]);
		$('#complete_reservation_id').val($(this).data('id'));
		completeReservationModalEl.modal('toggle');
	});
});
