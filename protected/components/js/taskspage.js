$(document).ready(function(){
	$('.tp-projects').sortable({
		handle: 'span.tp-icon-handle'
	});
	
	$('.tp-tasks').nestedSortable({
		listType: 'ul',
		disableNesting: 'no-nest',
		forcePlaceholderSize: true,
		handle: 'span.tp-icon-handle',
		helper:	'clone',
		items: 'li',
		maxLevels: 6,
		opacity: .6,
		placeholder: 'placeholder',
		revert: 250,
		tabSize: 25,
		tolerance: 'pointer',
		toleranceElement: '> div'
	});
	
	$('.tp-tasks').tasklist();
	
	$('.selectable').selectable();
	
	$('#serialize').click(function(e){
		e.preventDefault();
		console.log($('#tasklist').sortable('serialize'));
	});
});