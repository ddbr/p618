var jump = setTimeout($(".down-arrow").trigger('jump');, 2000);
$(".down-arrow").bind("jump", function() {
  $(this).toggleClass("jump");
})
