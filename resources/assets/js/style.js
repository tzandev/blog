$(function () {
    $("#flash-message").fadeTo(4000, 0.2, function () {
        $(this).slideUp(500);
    });

    $("#slider").responsiveSlides({
        auto: true,
        speed: 1000,
        timeout: 4000,
        nav: true,
        pauseControls: true,
        namespace: "callbacks",
        // pause: true
    });

    $(".navbar-nav>li>a").hover(function () {
        $(this).css({
            "background-color": "#666",
            "opacity": "0.5",
            "color": "#fff"
        });
        $(this).stop().animate({
            "opacity": "1"
        }, 200);
    }, function () {
        $(this).stop().animate({
            "opacity": "0.5"
        }, 200, function () {
            $(this).css({
                "background-color": "transparent",
                "opacity": "1",
                "color": "#777"
            });
        });
    });
});
