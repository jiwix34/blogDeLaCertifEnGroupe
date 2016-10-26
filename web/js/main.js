$(document).ready(function(){
	   
        $('.titre').css({
            right:($('#header-home').width() - $('.titre').outerWidth()) /2,
            top:($('#header-home').height() - $('.titre').outerHeight()) /2   
        });
      
    
    
    //-----------nav-min-----------------//
    $(window).on('scroll', function () {
    if ($(window).scrollTop() > 300) {
        $('.navbar-brand').css('visibility','hidden');
        $('.navbar-default').addClass('navbar-min');
        $('.navbar-default').addClass('navbar-nav-min');
        $('.navbar-default').removeClass('navbar-nav');
        

    } else {
        $('.navbar-brand').css('visibility','visible');
        $('.navbar-default').removeClass('navbar-min');
        $('.navbar-default').removeClass('navbar-nav-min');
        
    }
});
    
    
    
    
    });
   


