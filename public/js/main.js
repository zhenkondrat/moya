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

	$( ".fancybox" )
	  .mouseover(function() {
		 $( this ).find(".slide-text-r").css("display","none");
		 $( this ).find(".slide-date-r").css("display","none");  
	  })
	  .mouseout(function() {		   
		   $( this ).find(".slide-text-r").css("display","block");
		   $( this ).find(".slide-date-r").css("display","block");
	  })

	$(window).on('load', function () {
	    var $preloader = $('#page-preloader'),
	        $spinner   = $preloader.find('.spinner');
	    $spinner.fadeOut();
	    $preloader.delay(350).fadeOut('slow');
	});

	setTimeout(function() {
    	$('.alert').fadeOut(500);
	}, 5000); 

	$(".condition").click(function() {
		swal({   
			title: "Условия!",   
			text: "информация пока отсутствует",   
			html: true 
		});
	});

	$(".rules").click(function() {
		swal({   
			title: "Условия!",   
			text: "информация пока отсутствует",   
			html: true 
		});
	});

});




