
(function ($) {
    "use strict";

    $(".src-btn li").on("click", function () {
        $(".header-overlay").toggleClass("header-click");
        $(".sub-btn").toggleClass("sub-add");
        $(".src-icon").toggleClass("show");
         
    });
    
        // meanmenu
    $('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "1250"
    });
    


})(jQuery);