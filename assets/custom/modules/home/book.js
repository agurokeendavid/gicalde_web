$(function () {
	const reservationCalendarEl = $('#reservation_calendar');
	const formEl = $('#form');

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
	reservationCalendarEl.fullCalendar({
		// put your options and callbacks here
		themeSystem: 'bootstrap4',
		header: {
			left: '',
			center: 'title',
			right: 'today prev,next'
		},
		now: new Date(),
		selectable: true,
		eventSources: [
			{
				events: function (start, end, timezone, callback) {
					var events = [];
					$.ajax({
						type: "GET",
						url: `${BASE_URL}reservations/get_all_by_id_and_reservation_type?reservation_type=${$('#reservation_type').val()}&id=${$('#id').val()}`,
						data: null,
						dataType: "json",
						contentType: "application/json; charset=utf-8",
						beforeSend: function () {
							AmagiLoader.show();
						},
						success: function (result, status, jqXHR) {
							$.each(result,
								function (i, data) {
									events.push({
										Id: data.id,
										title: data.title,
										start: data.start,
										color: 'red'
									});
								});
							callback(events);
						},
						error: function (jqXHR, status, err) {
							callback(events);
						},
						complete: function () {
							AmagiLoader.hide();
						}
					});
				}
			}
		],
		dayClick: function(date, jsEvent, view) {
			$('#check_in_date').val(date.format());
			$('#book_modal').modal('toggle');
		}
	})

});
