import magnificPopup from "magnific-popup"

$(document).ready(function() {
    $('.open_popup').magnificPopup({
        type: 'inline',

        fixedContentPos: true,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        //closeMarkup: '<button title="%title%" type="button" class="mfp-close">&#215;</button>',
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'mfp-zoom-in',
    });


});
