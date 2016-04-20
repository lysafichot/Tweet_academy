$(document).ready(function(){
	$("#search").keyup(function(){
		$.ajax({
			type: "POST",
			url: "../view/handler/username.php",
			data:'keyword='+$(this).val(),

			success: function(data){
				$("#complete").show();
				$("#complete").html(data);
				
			}
		});
	});
});

