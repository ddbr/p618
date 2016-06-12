/**
 * File scroll.js.
 *
 * Handles scrolling events on the Page.
 */

 // scrolling check Variable
 var didScroll = false;

 // scrolling event
 window.onscroll = doThisStuffOnScroll;
 function doThisStuffOnScroll() {
     didScroll = true;
 }

 // Scrolling check interval function 100ms
 setInterval(function() {
     if(didScroll) {
         didScroll = false;
         $('#masthead').trigger('switch-header');
     }
 }, 100);

$('#masthead').bind('switch-header',function() {
  if($( document ).scrollTop() > 45){
    $( this ).addClass('fixed-header');
  } else {
    $( this ).removeClass('fixed-header');
  }
});


var img_height = $( window ).height() - $(".featured-img").offset().top;
$(".featured-img").height(img_height);
