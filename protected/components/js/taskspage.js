$(document).ready(function() {
	console.log(TP);
	
	$('.tp-projects').sortable( {
		handle : 'span.tp-icon-handle'
	});

	$('.tp-tasks').tasklist( {
		project : 1,
		baseUrl: TP.baseUrl
	});

	$('.selectable').selectable();

	$('#serialize').click(function(e) {
		e.preventDefault();
		console.log($('#tasklist').nestedSortable('serialize'));
		console.log($('#task-form').serialize());
	});
});