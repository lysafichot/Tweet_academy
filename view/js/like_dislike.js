$(document).ready(function() {


	if($('.already').val() == 1) {
		$(".follows").hide();
		$(".defollows").show();
	}
	else{
		$(".defollows").hide();
		$(".follows").show();
	}

	if($('.user').val() == 'moi') {
		$(".follows").hide();
		$(".defollows").hide();
	}

	$(".follows").submit(function(e){
		e.preventDefault();
		var get = $('.user').val(); 
		var session = $(".session").val();
		$.ajax({
			type: "POST",
			url: "../view/handler/like.php",
			data:'user=' +get+ '&session=' +session,

			success: function(data) {
				$('#abonne').text(data);
				$('.follows').hide();
				$('.defollows').show();
			}
		});
	});

	$(".defollows").submit(function(ev){
		ev.preventDefault();
		var get = $('.user_d').val(); 
		var session = $(".session_d").val();
		
		$.ajax({
			type: "POST",
			url: "../view/handler/like.php",
			data:'user_d=' +get+ '&session_d=' +session,

			success: function(data) {
				$('#abonne').text(data);
				$('.defollows').hide();
				$('.follows').show();
			}
		});
	});
});