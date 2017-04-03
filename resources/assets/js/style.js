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
});
