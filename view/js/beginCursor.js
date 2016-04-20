addEventListener("DOMContentLoaded", function() {
	var field  = document.getElementById('private-msg-textarea');
	field.value = "";
	field.focus();							
	field.setSelectionRange(field, 1, 2);
});