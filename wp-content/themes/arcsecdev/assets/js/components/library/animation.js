import flip from 'flip';

const WOW = require('wowjs');
window.wow = new WOW.WOW({
    live: false
});
window.wow.init();

//Flip cards
let flipCard = () => {
    if($('.flip-card').length){
        $('.flip-card').flip();
        $('.flip').on('click', function(){
            $(this).closest('.flip-card').flip()
        });
    }

}

const animatedNumbers = (() => {
    const classItem = 'js-spin';
    const classActive = 'js-spin-active';
    const classCompleted = 'js-spin-complete';
    const dataCount = 'data-count';
    const dataDuration = 'data-duration';
    const dataTofixed = 'data-tofixed';

    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        let offsetTop = parseInt(el.getAttribute('data-offset-top'), 10);
        let offsetBottom = parseInt(el.getAttribute('data-offset-bottom'), 10);

        offsetTop = offsetTop || 0;
        offsetBottom = offsetBottom || 0;

        return (
            rect.bottom - offsetBottom >= 0 &&
            rect.right >= 0 &&
            rect.top + offsetTop <=
            (window.innerHeight || document.documentElement.clientHeight) &&
            rect.left <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function animate() {
        $(`.${classItem}[${dataCount}]:not(.${classActive})`).each(function () {
            if (isInViewport($(this)[0])) {
                const $element = $(this);
                const counter = $element.attr(dataCount);
                const duration = parseInt($element.attr(dataDuration), 10);
                const toFixed = parseInt($element.attr(dataTofixed), 10);

                $element
                    .addClass(classActive)
                    .prop('Counter', 0)
                    .animate(
                        {
                            Counter: counter,
                        },
                        {
                            duration: duration || 1500,
                            easing: 'swing',
                            step(now) {
                                if (counter % 1 === 0) {
                                    $element.text(Math.ceil(now).toLocaleString('en'));
                                } else {
                                    $element.text(now.toFixed(toFixed || 1).toLocaleString('en'));
                                }
                            },
                            complete() {
                                $element.addClass(classCompleted);
                            },
                        }
                    );
            }
        });
    }

    return {
        init: () => {
            if ($(`.${classItem}`).length > 0) {
                $(window).on('scroll', animate);
                animate();
            }
        },
    };
})();



$(document).ready( () => {
    animatedNumbers.init();
    flipCard();
})

