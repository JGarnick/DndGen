$(document).ready(function(){
	$('#character-table').DataTable({});
	
	$('#left-tabs').tabs({
		active: 0,
	});
	$('#right-tabs').tabs({
		active: 0,
	});
	
	$('#selectable-race').selectable({
		selected: showHideSubraces,
		
	});
	
	function showHideSubraces(){
		var race = $('.ui-selected')[0].innerText;

		if($($('.ui-selected')[0]).attr('data-has-subrace') === 'true')
		{
			$('.subrace-wrapper').show();
			
			$('#selectable-sub-race span').each( function(){
				if($(this).attr('data-parent-race') == race)
				{
					$(this).show();
				}
				else
				{
					$(this).hide();
				}
			});
		}
		else
		{
			$('.subrace-wrapper').hide();
		}
	};
	showHideSubraces();
	$('#selectable-sub-race').selectable();
});