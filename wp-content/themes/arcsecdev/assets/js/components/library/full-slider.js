import slick from "slick-carousel"
$(document).ready( () => {
    if ($('.full__slider').length){
        $('.full__slider').slick({
            dots: true,
            arrows: true,
            draggable: true,
            /*fade: true,
            cssEase: 'linear',*/
            prevArrow: '<button type="button" class="prev slick-arrow" aria-label="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
            nextArrow: '<button type="button" class="next slick-arrow" aria-label="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
        });
    }
})
