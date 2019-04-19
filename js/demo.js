function scrollToAnchor(aid) {
    $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
}

function masonry() {
    $('.productContent').masonry({
        'itemSelector' : '.product',
        'animate' : true,
        'percentPosition' : true
    });
}

window.onload = function() {
    masonry();

    /*
    $(".anchorDiv .anchor").on("click", function() {
        scrollToAnchor($(this).attr("href"));
        return false;
    });
    */
    $(".product [name=showImg]").fancybox();

    $(".anchorDiv .anchor").on("click", function() {
        var cls = $(this).attr("href");
        $(".product").hide(function() {
            $(cls).slideDown(function() {
                masonry();
            });
        });
        return false;
    });
};
