 var ww = $(document).width();



$(document).ready(function() {
	// $(".toggleMenu").click(function(e) {
	// 	e.preventDefault();
	// 	$(".main-menu").toggle();
	// });
	$(".main-menu li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");			 
		};
	})

	$(window).resize(function(){
	  ww = $(window).width();
	  if(ww > 320 && menu.is(':hidden')) {
	    menu.removeAttr('style');
	    
	  }
	}); 

	adjustMenu();
});

function adjustMenu() {
	if (ww < 800) {
		$(".toggleMenu").css("display", "inline-block");
		// $(".main-menu").hide();
		// $(".main-menu li a.parent").click(function(e) {
		// 	e.preventDefault();
		//  	$(this).parent("li").toggleClass('hover');		
		// });
	} else {
		$(".toggleMenu").css("display", "none");
		$(".main-menu li").hover(function() {
		 		$(this).addClass('hover');
			}, function() {
				$(this).removeClass('hover');
		});
	}
}

