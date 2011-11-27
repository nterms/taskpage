/**
 * jQuery tasklist plugin - a tasklist component developed as a plugin for jQuery
 * 
 * @author Sarnga Abeykoon <developer@nterms.com>
 */

(function($){
	/**
	 * Task List
	 */
	var methods = {
		init: function(options) {
		
			var settings = $.extend({
				project: 0,
				parent: 0,
				baseUrl: ''
			}, options || {});
			
			return this.each(function(){
				var	tasklist	= $(this);
				var	data		= tasklist.data('tasklist');
				
				// if the tasklist is still not initialized
				if(!data) {
					$(this).data('tasklist', {
						target: tasklist,
						project: settings.project
					});
				}
				
				// Make the list nested sortable and other operations if the 
				// jQuery.ui.nestedSortable is available
				if($.ui.nestedSortable) {
					tasklist.nestedSortable({
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
					
					// save updated list
					tasklist.bind('sortupdate', function(event, ui) {
						console.log('tasklist updated ' + tasklist.nestedSortable('serialize'));
					});
				}
				
				tasklist.bind('click.tasklist', methods._click);
			});
		},
		
		click: function(event) {
			alert("task is clicked " + $(event.target).attr('class'));
		},
		
		save: function(msg) {
			var data = $(this).data('tasklist');
			console.log('Task list saved to project ' + data.project + ' ' + msg);
			return true;
		},
		
		addTask: function(task) {
			console.log(task);
			var tasklist = $(this);
			var settings = tasklist.data('tasklist');
			
			$.ajax({
				url : 'index.php?r=task/create',
				type : 'post',
				data : task+'&Task[project]='+settings.project,
				dataType : 'json',
				success : function(data) {
					if (data != null && typeof data == 'object') {
						console.log('Task saved');
						console.log(data);
						
						// task is saved - create and add a new item to the task list
						tasklist.append('<li id="task_' + data.id + '" class="ui-widget-content tp-task">' +
										'<div>' +
										'<span class="tp-icon tp-icon-24 tp-icon-handle"></span>' +
										'<span class="tp-task-check"><input type="checkbox" id="task_check_' + data.id + '" name="task_check_' + data.id + '" /></span>' +
										'<span class="tp-task-name">' + data.name + '</span>' +
										'</div>' +
										'</li>'
										);
					} else {
						console.log('error saving task');
					}
				},
				error : function() {
					console.log('error saving task');
				}
			});
			return false;
		},
		
		updateTask: function(task) {
			
		},
		
		deleteTask: function(task) {
			return true;
		}
	};
	
	$.fn.tasklist = function(method) {
		if(methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if(typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' + method + ' does not exist on jQuery.tasklist');
		}
		
	};
})(jQuery);