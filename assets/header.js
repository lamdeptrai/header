$(document).ready(function() {
    $('.menu-toannang > a').hover(function() {
        $(".menu-toannang-group").fadeIn(150);
    }, function() {
        $(".menu-toannang-group").fadeOut(150);
    });

});
//mmenu mobile
$(document).ready(function() {
  if(typeof $.fn.mmenu !== 'undefined')
    $('nav#menu').mmenu();
});
//SCROLL FIXED NAVIGATOR
$(document).ready(function() {
    $(window).scroll(function (e) {
        var cao= $(this).scrollTop();
        if(cao > 200) {
            $('.header_toannang-menu').addClass('menu-cuon');
        }
        else {
            $('.header_toannang-menu').removeClass('menu-cuon');
        }
    });
});
//call back top
$(document).ready(function() {
    $(window).scroll(function() {
        if($(window).scrollTop() > 400) {
            $('#myBtn').fadeIn();
        } else {
            $('#myBtn').fadeOut();
        }
    });
    $('#myBtn').click(function() {
        $('html, body').animate({scrollTop:0},1500);
    });
});