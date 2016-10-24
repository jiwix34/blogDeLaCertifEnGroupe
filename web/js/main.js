$(document).ready(function(){
   var homeHeight = $(window).height();
   var homeWidth = $(window).width();
	$('#header-home').css('height','width',homeHeight,homeWidth);
        
        	$(window).resize(function(){'use strict',
		$('#header-home').css('height','width',homeHeight,homeWidth);
	});
        
        $('.titre').css({
            right:($('#header-home').width() - $('.titre').outerWidth()) /2,
            top:($('#header-home').height() - $('.titre').outerHeight()) /2
        });
    });
   


