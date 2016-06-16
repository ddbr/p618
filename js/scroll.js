/**
 * File scroll.js.
 *
 * Handles scrolling events on the Page.
 */

 // scrolling check Variable
 var didScroll = false;
 var didResize = false;
 var scrollCnt = 0;

 // scrolling event
 window.onscroll = flagOnScroll;
 function flagOnScroll() {
     didScroll = true;
 }
 // resize event
 window.onresize = flagOnResize;
 function flagOnResize() {
     didResize = true;
 }

 // Scrolling check interval function 100ms
 setInterval(function() {
     if(didScroll) {
         didScroll = false;
         $('#masthead').trigger('scrolled');
     }
     if(didResize) {
         didResize = false;
         $('.featured-img').trigger('resize');
     }
 }, 100);

$(".featured-img").bind('resize', function() {
  var img_height = $( window ).height() - $(".featured-img").offset().top;
  $(".featured-img").height(img_height);
});

$("#masthead").bind('scrolled', function() {
  if( !$( this ).hasClass('toggled') && scrollCnt > 8 ){
    container = document.getElementById( 'masthead' ); /* main-navigation */
  	if ( ! container ) {
  		return;
  	}
  	button = container.getElementsByTagName( 'button' )[0];
  	if ( 'undefined' === typeof button ) {
  		return;
  	}
  	button_open = document.getElementById( 'open-menu' );
  	if ( 'undefined' === typeof button ) {
  		return;
  	}
    menu = container.getElementsByTagName( 'ul' )[0];

    container.className += ' toggled';
    button_open.className += ' toggled';
    button.setAttribute( 'aria-expanded', 'true' );
    menu.setAttribute( 'aria-expanded', 'true' );
    scrollCnt = 0;
  } else {
    scrollCnt++;
  }
});
