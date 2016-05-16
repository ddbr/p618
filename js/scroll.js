/**
 * File scroll.js.
 *
 * Handles scrolling events on the Page.
 */

 var didScroll = false;

 window.onscroll = doThisStuffOnScroll;

 function doThisStuffOnScroll() {
     didScroll = true;
 }

 setInterval(function() {
     if(didScroll) {
         didScroll = false;
         console.log('You scrolled');
     }
 }, 100);
