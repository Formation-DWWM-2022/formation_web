window.onscroll = function() {
    myFunction();
};

function myFunction() {
    if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
        $(".footer-custom").removeClass('positionnormal');
    }else if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        $(".footer-custom").addClass('positionnormal');
        $(".footer-custom").removeClass('positionfixed');
    } else {
        $(".footer-custom").removeClass('positionnormal');
        $(".footer-custom").addClass('positionfixed');
    }
}
