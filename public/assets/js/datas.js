$(document).ready(function(){
	$('.list').DataTable({
		pageLength : 5,
    	lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
	});
}) 