$(document).ready(function() {

	$(".cat").click(function() {
		 $(".cat-detail").css("display","none");
		 $(".categories").css("height","auto");
	});

	$(".sale").click(function() {
		 $(".sale-detail").css("display","none");
		 $(".sales").css("height","auto");
	});


	$(window).scroll(function() 
	{
	     if  ($(window).scrollTop() > 500) 
	     {
	          //Пользователь долистал до низа страницы
	          $("#top").css("display","block");
	     }
	     else
	     	$("#top").css("display","none");
	});


	$(window).on('load', function () {
	    var $preloader = $('#page-preloader'),
	        $spinner   = $preloader.find('.spinner');
	    $spinner.fadeOut();
	    $preloader.delay(350).fadeOut('slow');
	});

});

