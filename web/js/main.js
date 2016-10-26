$(document).ready(function () {

    $('.titre').css({
        right: ($('#header-home').width() - $('.titre').outerWidth()) / 2,
        top: ($('#header-home').height() - $('.titre').outerHeight()) / 2
    });

    $(window).resize(function () {
        $('.titre').css({
            right: ($('#header-home').width() - $('.titre').outerWidth()) / 2,
            top: ($('#header-home').height() - $('.titre').outerHeight()) / 2
        });
    });


    //-----------nav-min-----------------//
//    $(window).on('scroll', function () {
//        if ($(window).scrollTop() > 200) {
//            $('.navbar-brand').css('display', 'none');
//            $('.navbar-default').addClass('navbar-min');
//            $('.navbar-default').addClass('navbar-nav-min');
//            $('.navbar-default').addClass('navbar-brand-min');
//            $('.navbar-default').removeClass('navbar-nav');
//
//
//        } else {
//            $('.navbar-brand').css('display', '');
//            $('.navbar-default').removeClass('navbar-min');
//            $('.navbar-default').removeClass('navbar-nav-min');
//            $('.navbar-default').removeClass('navbar-brand-min');
//
//        }
//    });

        
        var homeHeight = $(window).height();
	$('#header-home').css('height',homeHeight);
	

        //Scroll Menu
$(window).on('scroll', function(){
	if( $(window).scrollTop()>homeHeight){
		$('.menu-nav').addClass('navbar-fixed-top');
	} else {
		$('.menu-nav').removeClass('navbar-fixed-top');
	}

});


});



