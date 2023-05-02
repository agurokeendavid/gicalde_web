$(function() {
	const tableEl = $('#table');

	const addModalEl = $('#add_modal');
	const addFormEl = $('#add_form');
	const viewModalEl = $('#view_modal');


	$('.view-row').on('click', function(e) {
		e.preventDefault();
		clearValueControls([$('#view_photo_file_name')]);
		$.ajax({
			url: `${BASE_URL}galleries/get/${$('#view_id').val()}`,
			type: 'GET',
			async: true,
			data: null,
			dataType: 'json',
			beforeSend: function () {
				AmagiLoader.show();
			},
			success: function (response) {
				if (response) {
					$('#view_photo_file_name').attr('src', `${BASE_URL}assets/uploads/galleries/${response.photo_file_name}`);
					viewModalEl.modal('toggle');
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

	addModalEl.on('shown.bs.modal', function(e) {
		e.preventDefault();
		clearValueControls([$('#photo_file')]);
	})

	addFormEl.on('submit', function(e) {
		e.preventDefault();
		if (!$(this).valid()) return;

		$.ajax({
			url: `${BASE_URL}galleries/add`,
			type: 'POST',
			async: true,
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
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
					url: `${BASE_URL}galleries/delete`,
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

	$('#btn_add').on('click', function(e) {
		e.preventDefault();
		addModalEl.modal('toggle');
	});

	tableEl.dataTable({
		pageLength: 10,
		searchDelay: 500,
		order: [[0, 'desc']]
	});

	$('#photo_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_file');
		file.trigger('click');
	});
	$('#photo_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

});
