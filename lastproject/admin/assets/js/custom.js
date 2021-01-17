// $('.scroll').click(function() {
//     $('body').animate({
//         scrollTop: eval($('#' + $(this).attr('target')).offset().top - 70)
//     }, 1000);
// });
// $("[href^='#!']").click(function() {
//     id=$(this).attr("href")
//     $('html, body').animate({
//         scrollTop: $(id).offset().top
//     }, 2000);
// });
// $(function() {
//     $('a[href*=#]:not([href=#])').click(function() {
//         var target = $(this.hash);
//         target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
//         if (target.length) {
//             $('html,body').animate({
//               scrollTop: target.offset().top
//             }, 1000);
//             return false;
//         }
//     });
// });
$(document).ready(function() {
    $(".btns").click(function() {
      $("body,html").animate(
        {
          scrollTop: $("#menudiv").offset().top
        },
        800 //speed
      );
    });
  });