import slick from "slick-carousel"
$(document).ready( () => {
    if($('.simple_slider').length){
        $('.simple_slider .slider-container').slick({
            dots: true,
            arrows: true,
            draggable: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            /*fade: true,
            cssEase: 'linear',*/
            prevArrow: '<button type="button" class="prev slick-arrow" aria-label="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
            nextArrow: '<button type="button" class="next slick-arrow" aria-label="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
        });
    }

    if($('.abroad_slider').length){
        $('.abroad_slider .slider-container').slick({
            centerMode: true,
            centerPadding: '90px',
            slidesToShow: 3,
            arrows: true,
            draggable: true,
            prevArrow: '<button type="button" class="prev slick-arrow" aria-label="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
            nextArrow: '<button type="button" class="next slick-arrow" aria-label="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        draggable: true,
                        centerPadding: '70px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        draggable: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
            ]
        });
    }

})
