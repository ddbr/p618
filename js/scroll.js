/**
 * File scroll.js.
 *
 * Handles scrolling events on the Page.
 */

 // scrolling check Variable
 var didScroll = false;
 var didResize = false;
 var scrollCnt = 0;
 var prdScroll = 0;

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
 window.onload = winOnLoad;
 function winOnLoad() {
    $('.featured-img').trigger('resize');
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
  $(".featured-img.archive-product").height(img_height / 2);
});

$("#masthead").bind('scrolled', function() {
  if( scrollCnt < 5) {
    scrollCnt++;
  }
  if( !$( this ).hasClass('toggled') && scrollCnt > 4 ){
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
  }
});

$(".product_preview-button").bind('resize', function() {
  var x = $(window).width() / 6;
  if ( $("this").hasClass( "left" ) ) { x = X * -1}
  $("this").parent().scrollLeft( $("this").scrollLeft() + x )
});

$(".product_preview-button.right").on("click" ,function(){
    prdScroll = prdScroll + $(window).height() / 2;
    $(".product_preview-container").animate({
      scrollLeft:  prdScroll
    });
});
$(".product_preview-button.left").on("click" ,function(){
    prdScroll = prdScroll - $(window).height() / 2;
    $(".product_preview-container").animate({
      scrollLeft:  prdScroll
    });
});

var p619_img_Interval;
var p619_product_id;
$(".woocommerce-LoopProduct-link").on("click" ,function(){
    p619_product_id = $(this).attr('product_id');
    $(".woocommerce .product").removeClass( "show" );
    $(p619_product_id).addClass("show");
    $('html, body').animate({
        scrollTop: $(p619_product_id).offset().top
    }, 500);
    $(".zoom.top").removeClass("top")
    $($(p619_product_id + " .zoom").get(0)).addClass("top");
    clearInterval(p619_img_Interval);
    p619_img_Interval = setInterval(function(){ next(); }, 5000);

    function next() {
      if ( $(p619_product_id + " .zoom.top").next().is('a') ) {
        $(p619_product_id + " .zoom.top").removeClass("top").next().addClass("top");
      } else {
        $(p619_product_id + " .zoom.top").removeClass("top");
        $($(p619_product_id + " .zoom").get(0)).addClass("top");
      }
    }
});
