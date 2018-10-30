function scrollToAnchor(aid){
    $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
}

window.onload = function() {
    $('.productContent').masonry({
        'itemSelector' : '.product',
        'animate' : true,
        'percentPosition' : true
    });

    $(".anchorDiv .anchor").on("click", function() {
        scrollToAnchor($(this).attr("href"));
        return false;
    });
};
