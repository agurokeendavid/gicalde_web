$(function () {
	const formEl = $('#form');

	$('#check_in_date').on('change', function(e) {
		e.preventDefault();
		let isFound = false;
		let events = [];
		let category = $('#room_id').length > 0 ? 'room' : 'cottage';
		// $.ajax({
		// 	url: `${BASE_URL}reservations/get_all_by_category/${category}`,
		// 	type: 'POST',
		// 	async: false,
		// 	data: null,
		// 	dataType: 'json',
		// 	beforeSend: function () {
		// 		AmagiLoader.show();
		// 	},
		// 	success: function (response) {
		// 		// response.forEach((event) => {
		// 		// 	events.push(event.check_in_date);
		// 		// });
		//
		// 		response.forEach((event) => {
		// 			console.log(new Date($(this).val()));
		// 			if (new Date(event.check_in_date).toISOString().slice(0,10).replace(/-/g,"") == new Date($(this).val()).toISOString().slice(0,10).replace(/-/g,"")) {
		// 				alert('This date is already booked.');
		// 				isFound = true;
		// 			}
		// 		});
		//
		// 		if (isFound) {
		// 			$(this).val(null);
		// 		}
		// 	},
		// 	error: function (result) {
		// 		Swal.fire({
		// 			title: 'Failed!',
		// 			text: 'Error has been occurred, Please try again later.',
		// 			icon: 'error'
		// 		});
		// 	},
		// 	complete: function () {
		// 		AmagiLoader.hide();
		// 	}
		// });
	});

	// $('#check_out_date').datepicker({
	// 	beforeShowDay: function(date){
	// 		events.forEach((eventParam) => {
	// 			if (new Date(date).toISOString().slice(0,10).replace(/-/g,"") == new Date(eventParam).toISOString().slice(0,10).replace(/-/g,"")) {
	// 				return [false,"","unAvailable"];
	// 			} else {
	// 				return true;
	// 			}
	// 		});
	//
	//
	// 	}
	// });
	formEl.on('submit', function (e) {
		e.preventDefault();

		if (!$(this).valid()) return;

		$.ajax({
			url: `${BASE_URL}home/book`,
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
});
