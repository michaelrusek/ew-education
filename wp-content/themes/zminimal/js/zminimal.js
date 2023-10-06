jQuery(document).ready(function($) {

	"use strict";
	
	// Fitvids
	
	$(document).ready(function(){
		$(".container").fitVids();
	});
	
	// Menu mobile

	$('#navigation-wrapper .menu').slicknav({
		prependTo:'.menu-mobile',
		label:'',
		allowParentLinks: true
	});
	
	// Featured slider

	$("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  	});
	// Bxslider
	
	$('.bxslider').bxSlider({
	  adaptiveHeight: true,
	  mode: 'fade',
	  pager: false,
	  captions: true
	});

	// go to top

	$('.to-top').on('click', function ( e ) {
		$('html, body').animate({scrollTop : 0},650);
		return false;
	});
	
	// Search
	
	$('#top-search a').on('click', function ( e ) {
		e.preventDefault();
    	$('.show-search').slideToggle('fast');
    });

});