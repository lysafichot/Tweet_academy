$(document).ready(function() {
setInterval(refresh, 5000); 

	function refresh() {
		$.ajax({
			type: "GET",
			url: "../view/handler/timeline.php",

			success: function(data) {
		
				$('#timeajax').empty();
				$('#timeajax').html(data);
				
			}

		});
	}	
});