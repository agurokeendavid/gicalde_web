$(function() {
	const tableEl = $('#table');
	tableEl.dataTable({
		pageLength: 10,
		searchDelay: 500,
		order: [[0, 'desc']]
	});
});
