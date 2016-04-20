$(document).ready(function() {

	$("#formTweet").on('submit', function ( event ){
		event.preventDefault();

		var content = $('#tweet-textarea').val(); 
		var file = $('#file-input').val();
		var path = file.split("\\");
		path = path[path.length - 1];

		$.ajax({
			type: "POST",
			url: "../view/handler/tweet.php",
			data:'tweetcontent=' +content+ '&file-input='+path,

			success: function(data) {

				$('#tweet-textarea').val('');
				$('#img_tweet').empty();
				$('#file-input').val('');

				$('#timeajax').empty();
				$('#timeajax').html(data);
				
			}
		});

	});

	
});