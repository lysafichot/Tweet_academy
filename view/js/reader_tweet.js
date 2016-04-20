function loadFile(event, id) {
	var reader = new FileReader();
	reader.onload = function(){
		var output = document.getElementById(id);
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

addEventListener("DOMContentLoaded", function() {

	document.getElementsByName('file-input')[0].onchange = function(event) {
		$('#img_tweet').append('<img src="" id="media_tweet" alt="">');
		loadFile(event, 'media_tweet');
	}

});
