$(document).ready(function () {

    $('.titre').css({
        right: ($('#header-content').width() - $('.titre').outerWidth()) / 2,
        top: ($('#header-content').height() - $('.titre').outerHeight()) / 2
    });

    $(window).resize(function () {
        $('.titre').css({
            right: ($('#header-content').width() - $('.titre').outerWidth()) / 2,
            top: ($('#header-content').height() - $('.titre').outerHeight()) / 2
        });
    });




        
        var homeHeight = $('#header-content').height();
	$('#header-content').css('height',homeHeight);
	

        //Scroll Menu
$(window).on('scroll', function(){
	if( $(window).scrollTop()>homeHeight){
		$('.menu-nav').addClass('navbar-fixed-top');
                $('.menu-nav').addClass('navbar-nav-min');
                $('.connexion').css( { paddingTop : "30px",paddingBottom : "10px", transition :"0.4s" } );
                $('.navbar-brand').css( { paddingTop : "5px", transition :"0.4s" } );
               
	} else {
		$('.menu-nav').removeClass('navbar-fixed-top');
                $('.connexion').css( { paddingTop : "0",paddingBottom : "0px", transition :"0.4s" } );
                $('.navbar-brand').css( { paddingTop : "15px", transition :"0.4s" } );
	}

    });
    $('body').css('display', 'none');
    $('body').fadeIn(1600);


    
});



