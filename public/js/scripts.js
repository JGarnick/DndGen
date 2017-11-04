$(document).ready(function(){
	$('#character-table').DataTable({});
	
	$('#tabs').tabs({
		active: 0,
	});
	
	$('#selectable').selectable();
});