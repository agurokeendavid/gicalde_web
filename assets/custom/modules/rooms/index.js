$(function() {
	const tableEl = $('#table');
	const viewDetailsModalEl = $('#view_details_modal');

	tableEl.dataTable({
		pageLength: 10,
		searchDelay: 500,
		order: [[0, 'desc']]
	});

	$('.view-row').on('click', function(e) {
		e.preventDefault();
		clearValueControls([$('#view_id'), $('#view_name'), $('#view_description'), $('#view_no_of_houses'), $('#view_no_of_guests'), $('#view_no_of_rooms'), $('#view_price'), $('#view_slots')]);
		$('#view_id').val($(this).data('id'));
		viewDetailsModalEl.modal('toggle');
	});

	viewDetailsModalEl.on('shown.bs.modal', function (e) {
		e.preventDefault();
		$.ajax({
			url: `${BASE_URL}rooms/get/${$('#view_id').val()}`,
			type: 'GET',
			async: true,
			data: null,
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response) {
					$('#view_name').val(response.name);
					$('#view_description').val(response.description);
					$('#view_no_of_houses').val(response.no_of_houses);
					$('#view_no_of_guests').val(response.no_of_guests);
					$('#view_no_of_rooms').val(response.no_of_rooms);
					$('#view_price').val(response.price);
					$('#view_slots').val(response.slots);
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

	$('.delete-row').on('click', function (e) {
		e.preventDefault();
		Swal.fire({
			title: 'Are you sure you want to delete this record?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: `${BASE_URL}rooms/delete`,
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
});
