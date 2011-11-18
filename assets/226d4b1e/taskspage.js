$(document).ready(function(){
	$('.tp-projects').sortable({
		handle: 'span.tp-icon-handle'
	});
	
	$('.tp-tasks').tasklist()
	.sortable({
		handle: 'span.tp-icon-handle'
	});
	$('.selectable').selectable();
	
	$('#serialize').click(function(e){
		e.preventDefault();
		console.log($('#tasklist').sortable('serialize'));
	});
});