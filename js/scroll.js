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

 // Scrolling check interval function 1000ms
 setInterval(function() {
     if(didScroll) {
         didScroll = false;
         $('#masthead').trigger('switch-header');
     }
 }, 1000);

$('#masthead').bind('switch-header',function() {
  //$('.site-header').addClass('fixed-header')
  console.log('scrolling');
});
