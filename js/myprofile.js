window.onload = function() {
    $(".anchorDiv .anchor").on("click", function() {
        var cls = $(this).attr("href");
        $(".product").hide(function() {
            $(cls).show();
        });
        return false;
    });
};
