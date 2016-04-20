function loadFile(event, id) {
	var reader = new FileReader();
	reader.onload = function(){
		var output = document.getElementById(id);
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
}

addEventListener("DOMContentLoaded", function() {
	document.getElementsByName('avatar')[0].onchange = function(event) {
		loadFile(event, 'img_avatar');
	}
	document.getElementsByName('cover')[0].onchange = function(event) {
		loadFile(event, 'img_cover');
	}
});
