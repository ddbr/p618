/**
 * File scroll.js.
 *
 * Handles scrolling events on the Page.
 */

 // scrolling check Variable
 var didScroll = false;
 var didResize = false;

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
  if( !$( this ).hasClass('toggled') ){
    container.className = container.className.replace( ' toggled', '' );
    button_open.className = button_open.className.replace( ' toggled', '' );
    button.setAttribute( 'aria-expanded', 'false' );
    menu.setAttribute( 'aria-expanded', 'false' );
  }
});
