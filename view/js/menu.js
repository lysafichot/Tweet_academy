var menu = function(){
	this.menuAccount = function(){	
		$('.account-menu ul li a').click(function(){
			// e.preventDefault();
			$('li').removeClass('account-menu-selected');
			$(this).parent().addClass('account-menu-selected');
		});
	}

	this.menuHeader = function(){
		$('.header-timeline-menu ul li a').click(function(e){
			// e.preventDefault();
			$('li').removeClass('menu-selected');
			$(this).parent().addClass('menu-selected');
		});	
	}
}

$(document).ready(function(){
	var user = new menu();
	user.menuAccount();
	user.menuHeader();
});