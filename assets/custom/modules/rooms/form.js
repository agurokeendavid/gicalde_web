$(function () {
	const formEl = $('form');

	formEl.on('submit', function (e) {
		e.preventDefault();

		if (!$(this).valid()) return;

		$.ajax({
			url: `${BASE_URL}rooms/form/${$('#id').val()}`,
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


	$('#photo_1_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_1_file');
		file.trigger('click');
	});
	$('#photo_1_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

	$('#photo_2_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_2_file');
		file.trigger('click');
	});
	$('#photo_2_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

	$('#photo_3_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_3_file');
		file.trigger('click');
	});
	$('#photo_3_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

	$('#photo_4_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_4_file');
		file.trigger('click');
	});
	$('#photo_4_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

	$('#photo_5_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_5_file');
		file.trigger('click');
	});
	$('#photo_5_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

	$('#photo_6_file_browse').on('click', function () {
		const file = $(this).parent().parent().parent().find('#photo_6_file');
		file.trigger('click');
	});
	$('#photo_6_file').on('change', function () {
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
})
