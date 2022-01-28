/* HeAdeR ============================= */
$(window).scroll(function () {
    $('.header').toggleClass('fix', $(this).scrollTop() > 0);
});
/*YakoR====================================*/
$('.yakor').on('click', function () {
    var el = $(this);
    var dest = el.attr('href');
    if (dest !== undefined && dest !== '') {
        $('html,body').animate({
                scrollTop: $(dest).offset().top - 100
            }, 700
        );
    }
    return false;
});
