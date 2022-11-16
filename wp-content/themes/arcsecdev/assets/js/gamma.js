
let Gamma = {

    send(data, successCallback, context){
        context = context||this;
        $.ajax({
            type: "POST",
            url: gammaajax.url,
            data: data,
            context: context,
            success: successCallback,
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error 503: Server can not process your request. Contact to admin!');
            }
        });
    },

    addLoaderBlock($block){
        $block.append('<div class="loader_block"><i class="fa fa-cog fa-spin"></i></div>');
    },

    removeLoaderBlock($block){
        $block.find('.loader_block').remove();
    },

    commonFunc(){
        /*$(".next-section").click(function (event) {
            event.preventDefault();
            var parentSection = $(this).closest('section');
            var nextSection = parentSection.next('section');
            var addedScroll = 0;

            if($('.dynamic-nav').length){
                addedScroll = $('.dynamic-nav').hasClass('fix') ? 48:96;
            }

            if(parentSection.length && nextSection.length){
                $("body,html").animate({scrollTop: $(nextSection).offset().top - addedScroll }, 800);
            }
        });
        $('.test').click((event) => {
            alert('Hello World');
        });*/
        /*$('.description .read_more').on('click', function (event) {
            $(this).closest('.text').addClass('close').fadeOut(800);
            $(this).closest('.content').find('.more-text').removeClass('close').fadeIn(800);

        });
        $('.description .read_less').on('click', function (event) {
            $(this).closest('.text').addClass('close').fadeOut(800);
            $(this).closest('.content').find('.less-text').removeClass('close').fadeIn(800);
        });*/


        /*if ($(window).width() > 768){
            $('.front-page .hero-bg').delay(1500).animate({backgroundColor: 'rgba(0,0,0,0.8)' }, 1000);
            $('.front-page h1 img').delay(1500).animate({width: '80%' }, 1000);

            $('.front-page .hero .show-second').delay(1500).animate({
                lineHeight: '30px',
                opacity: '1',
            }, 1000);
            //$('.front-page .hero .show-second').animateTransform("translateY(-50%)", 1000);
        }

        $('.burger-menu').click(function (event) {
            event.preventDefault();
            $(this).toggleClass('open');
            $('.header_menu').fadeToggle(500);
        });*/

    },



    /*popupInit: function(){
        $('.read_bio').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'mfp-zoom-in'
        });
    },*/

    /*slidersInit: function(){
        $('.history-slider-wrap').slick({
            centerMode: true,
            centerPadding: '90px',
            slidesToShow: 3,
            arrows: false,
            draggable: true,
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

        $('.history-slider-wrap').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $('.hs .slider-dot').removeClass('active');
            $('.hs .nav-sl-'+nextSlide).addClass('active');
        });
        $('.prev-sl').on('click', function (event) {
            $('.history-slider-wrap').slick('slickPrev');
        });
        $('.next-sl').on('click', function (event) {
            $('.history-slider-wrap').slick('slickNext');
        });
        $('.slider-dot').on('click', function (event) {
            $('.history-slider-wrap').slick('slickGoTo', $(this).data('sl'));
        });
        $('.history-slider-wrap').on('setPosition', function () {
            $(this).find('.slick-slide').height('auto');
            var slickTrack = $(this).find('.slick-track');
            var slickTrackHeight = $(slickTrack).height();
            $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
        });

        $('.team-slider-wrap').slick({
            centerMode: true,
            centerPadding: '90px',
            slidesToShow: 3,
            arrows: false,
            draggable: true,
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

        if($(window).width() < 768){
            $('.team-slider-wrap').slick('slickPrev');
            $('.history-slider-wrap').slick('slickPrev');
        }


        $('.team-slider-wrap .slider-item').each(function (index, element) {

            $(element).height($(element).width() * 1.15);
        });

        $('.team-slider-wrap').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $('.ts .slider-dot').removeClass('active');
            $('.ts .nav-sl-'+nextSlide).addClass('active');

            /!*$('.silder-phrase-'+currentSlide).css('position', 'absolute').fadeOut(500, function () {
                $(this).css('position', 'relative');
            });
            $('.silder-phrase-'+nextSlide).fadeIn(500);*!/
        });
        $('.prev-sl').on('click', function (event) {
            $('.team-slider-wrap').slick('slickPrev');
        });
        $('.next-sl').on('click', function (event) {
            $('.team-slider-wrap').slick('slickNext');
        });
        $('.slider-dot').on('click', function (event) {
            $('.team-slider-wrap').slick('slickGoTo', $(this).data('sl'));
        });


        function SideChange(front){

            if (front) {
                $(this).closest('.slider-item').removeClass('flip').find('div.front').show();
                $(this).closest('.slider-item').find('div.back').hide();

            } else {
                $(this).closest('.slider-item').addClass('flip').find('div.front').hide();
                $(this).closest('.slider-item').find('div.back').show();
            }
        }
        $('img.show_more').on('click', function(){
            $(this).closest('.slider-item').stop().rotate3Di('flip', 500, {direction: 'clockwise', sideChange: SideChange});
        });
        $('img.show_less').on('click', function(){
            $(this).closest('.slider-item').stop().rotate3Di('unflip', 500, {direction: 'clockwise', sideChange: SideChange});
        });
    },*/

    /*stickyNavigation: {
        navigation : $('#dynamic-nav'),
        navItems: [],
        sections: [],
        scrollTop: 0,
        init: function () {

            if (!this.navigation.length)
                return;

            var self = this;

            $('#page-tpl section').each(function (index, section) {
                var sectionName = $(section).data('name');

                if(sectionName == undefined)
                    return true;

                var sectionId = 'section-'+self.sections.length;
                $(section).attr('id', sectionId);
                $(section).addClass('paragraph');
                if(index == 0){
                    self.navigation.append('<li class="item-nav active"><a href="#'+sectionId+'" id="menu-'+sectionId+'">'+sectionName+'</a></li>');
                }
                else{
                    self.navigation.append('<li class="item-nav"><a href="#'+sectionId+'" id="menu-'+sectionId+'">'+sectionName+'</a></li>');
                }


                self.sections.push($(section));


            });

            if($(window).width() < 1040){
                self.navigation.find('.item-nav').first().addClass('active');

                $(".item-nav a").click(function (event) {

                    event.preventDefault();

                    var elementClick = $(this).attr("href");
                    var parentLi = $(this).closest('li.item-nav');
                    var correction = 103;
                    var destination = $(elementClick).offset().top - correction;
                    $("body,html").animate({scrollTop: destination }, 800);

                });

                var beginMove = 0;

                $(".dynamic-nav").on('touchmove', function (event) {

                    event.preventDefault();
                    var eventOriginal = event.originalEvent;
                    var destination = 0;
                    var countNavItem = $(this).find('.item-nav').length;

                    if(eventOriginal.touches.length == 1){
                        var touch = eventOriginal.touches[0];


                        if(beginMove == 0){
                            beginMove = touch.pageX;
                        }
                        var left = $(this).find('.item-nav').first().css('left').slice(0, -2);
                        var positionInPercent = parseInt(-left / $(window).width() * 100);
                        var maxPositionInPercent = 50 * (countNavItem - 1);
                        var minPositionInPercent = 0;
                        var positionInPercentNext = 0;

                        if(beginMove > touch.pageX){
                            //to left
                            console.log((positionInPercent + 50));
                            console.log(maxPositionInPercent);
                            positionInPercentNext = Math.min((positionInPercent + 50), maxPositionInPercent);
                        }
                        else if(beginMove < touch.pageX){
                            //to right
                            positionInPercentNext = Math.max((positionInPercent - 50), minPositionInPercent);
                        }



                        $(".item-nav").stop().animate({left: -positionInPercentNext+'%'}, 500);
                    }

                    /!* if(eventOriginal.touches.length == 1){
                         var touch = eventOriginal.touches[0];


                         destination = Math.abs( (touch.pageX - beginMove) );


                         console.log(destination);
                         $(".item-nav").stop().animate({left: destination+'px'}, 500);
                     }*!/


                });
                $(".dynamic-nav").on('touchend', function (event) {
                    beginMove = 0;

                });

                this.mobileOnScroll();

                $(document).on("scroll", this.mobileOnScroll);

                $(document).trigger('scroll');
            }
            else{
                function calculateCorection(parentLi){
                    var isPrevElClick = false;
                    parentLi.nextAll('li.item-nav').each(function(index, element){
                        if($(element).hasClass("active"))
                            isPrevElClick =  true;
                    });

                    var correction = $('.main-header').hasClass('fix') ? -35:48;

                    if(isPrevElClick){
                        correction =124;
                    }
                    else{
                        correction = 48;

                    }

                    console.log(correction);
                    return correction;
                }

                $(".item-nav a").click(function (event) {

                    event.preventDefault();
                    var elementClick = $(this).attr("href");
                    var parentLi = $(this).closest('li.item-nav');
                    var correction = calculateCorection(parentLi);
                    var destination = $(elementClick).offset().top - correction;
                    $("body,html").animate({scrollTop: destination }, 800);

                });

                this.onScroll();

                $(document).on("scroll", this.onScroll);

                //$(document).trigger('scroll');
            }

        },

        onScroll: function(){
            var $window = $(window);
            var self = this;



            $window.scroll(function (event) {

                if($window.scrollTop() > 150){

                    if(self.scrollTop > $window.scrollTop())
                        Gamma.stickyNavigation.toggleMainMenu(true);
                    else if(self.scrollTop < $window.scrollTop())
                        Gamma.stickyNavigation.toggleMainMenu(false);
                }



                self.scrollTop = $window.scrollTop();

                Gamma.stickyNavigation.fixedSidebar();

                $('#page-tpl .paragraph').each(function(){
                    var hash = '#menu-'+$(this).attr("id");
                    var aMenu = $(hash);
                    var parentLi = aMenu.closest('li');

                    var correction = $('.main-header').hasClass('fix') ? 125:49;
                    var paragraphOffsetTop = $(this).offset().top - correction;
                    var paragraphOffsetBottom = paragraphOffsetTop + $(this).outerHeight();

                    if (self.scrollTop > paragraphOffsetTop && self.scrollTop < paragraphOffsetBottom) {
                        if(!parentLi.hasClass("active")){
                            $(".item-nav").removeClass("active");
                            parentLi.addClass("active");
                        }

                    } else {
                        if(parentLi.hasClass("active"))
                            parentLi.removeClass("active");
                    }
                });

            })
        },

        mobileOnScroll: function(){
            var $window = $(window);
            var self = this;



            $window.scroll( function (event) {
                var scrollTop = $window.scrollTop();

                $('#page-tpl .paragraph').each(function(index, paragraph){
                    var hash = '#menu-'+$(paragraph).attr("id");
                    var aMenu = $(hash);
                    var parentLi = aMenu.closest('li');

                    var correction = 105;
                    var paragraphOffsetTop = $(paragraph).offset().top - correction;
                    var paragraphOffsetBottom = paragraphOffsetTop + $(paragraph).outerHeight();

                    if (scrollTop > paragraphOffsetTop && scrollTop < paragraphOffsetBottom) {
                        if(!parentLi.hasClass("active")){
                            $(".item-nav").removeClass("active");
                            parentLi.addClass("active");
                            var translateX = index * -50;
                            $(".item-nav").stop().animate({left: translateX+'%'}, 500);
                        }

                    }
                    else{
                        if(parentLi.hasClass("active"))
                            parentLi.removeClass("active");
                    }
                });
            });
        },

        fixedSidebar: function () {
            if(this.scrollTop > 78){
                this.navigation.addClass('fix');
                $('.main-header').addClass('hidden');
            }
            else{
                $('.main-header').removeClass('fix');
                $('.main-header').removeClass('hidden');
                this.navigation.removeClass('fix');
                this.navigation.removeClass('show_main_menu');
            }

        },

        toggleMainMenu: function (show) {

            if(show){
                $('.main-header').addClass('fix');
                $('.dynamic-nav').addClass('show_main_menu');
            }
            else{
                $('.main-header').removeClass('fix');
                $('.dynamic-nav').removeClass('show_main_menu');
            }
        }
    },

    product: {
        init: function(){
            if ($(window).width() > 768){
                //this.animationWhatItFor.init();
            }
            else{
                //this.slideWhatItFor();
            }


            if($('.product_features_tabs').length)
                this.tabs();
        },

        slideWhatItFor: function(){
            var self = this;
            $('.who_it_for_card').mousedown(function (event) {
                if(!$(this).hasClass('active')){

                    $(this).addClass('noactive');
                }

            });
            $('.who_it_for_card').mouseup(function (event) {
                if(!$(this).hasClass('active')){
                    $('.who_it_for_card').removeClass('active');
                    $(this).removeClass('noactive');
                    $(this).addClass('active');

                    //$(this).closest('.who_it_for_card_container').find('.card_list').slideDown(500);
                }
                else{
                    //$(this).closest('.who_it_for_card_container').find('.card_list').slideUp(500);
                }
            });
            $('.who_it_for_card').on('click',function (event) {
                $(this).closest('.who_it_for_card_container').find('.card_list').slideToggle(500);
            });
        },

        animationWhatItFor: {
            containerListHeight: $('#who_it_for_list').height(),
            stopListAnimation: false,
            sumHeightList: 0,
            reqId: 0,
            activeCard: {},
            init: function () {
                if(!$('#who_it_for_list').length)
                    return;

                this.beginPositionListItem();
                this.animateList();
                this.whatItForCard();
            },

            beginPositionListItem: function(){
                var self = this;
                $('#who_it_for_list .who_it_for_list_item').each(function (index, item) {

                    if(index == 0){
                        self.sumHeightList += $(item).outerHeight(true);
                        return true;
                    }

                    $(item).css('top', self.sumHeightList+'px');
                    self.sumHeightList += $(item).outerHeight(true);
                });
                $('#who_it_for_list .who_it_for_list_item').addClass('abs');
            },

            animateList: function () {
                if(!Gamma.product.animationWhatItFor.stopListAnimation){
                    //cancelAnimationFrame(Gamma.product.animationWhatItFor.reqId);

                    Gamma.product.animationWhatItFor.scrollList(1);

                    Gamma.product.animationWhatItFor.reqId = requestAnimationFrame(Gamma.product.animationWhatItFor.animateList);

                    if(Gamma.product.animationWhatItFor.stopListAnimation)
                        cancelAnimationFrame(Gamma.product.animationWhatItFor.reqId);
                }


            },

            scrollList: function(speed){
                var self = this;
                $('#who_it_for_list .who_it_for_list_item').each(function (index, item) {

                    var positionItemTop = $(item).position().top;


                    $(item).css('top', positionItemTop-speed+'px');

                    var positionItemBottom = $(item).position().top + $(item).outerHeight(true);

                    if(positionItemBottom < 0){
                        //console.log();
                        var topPosition = Math.max( ( self.sumHeightList - $(item).outerHeight(true) ), self.containerListHeight);

                        $(item).css('top', topPosition+'px');
                    }
                });
            },

            scrollToCurrentItem: function(){
                var stop = false;
                var self = this;
                var reqId = 0;

                function animate(){
                    $('#who_it_for_list .who_it_for_list_item').each(function (index, item) {
                        var positionItemTop = $(item).position().top;

                        if($(item).hasClass('active') && positionItemTop < 10 && positionItemTop > 0){
                            self.reorderList($(item));
                            stop = true;

                        }
                    });
                    if(!stop){
                        $('#who_it_for_list .who_it_for_list_item').each(function (index, item) {
                            var positionItemTop = $(item).position().top;

                            $(item).css('top', positionItemTop-4+'px');

                            var positionItemBottom = $(item).position().top + $(item).outerHeight(true);

                            if(positionItemBottom < 15){
                                //console.log();
                                var topPosition = Math.max( ( self.sumHeightList - $(item).outerHeight(true) + 12 ), self.containerListHeight);

                                $(item).css('top', topPosition+'px');
                            }

                        });
                    }

                    reqId = requestAnimationFrame(animate);

                    if(stop)
                        cancelAnimationFrame(reqId);
                }

                animate();
            },

            reorderList: function($firstItem){
                var sumHeightActiveItems = $firstItem.outerHeight(true) + $firstItem.position().top;
                var $sortedItems = [];//Sorted by top position
                var $items = $('#who_it_for_list .who_it_for_list_item');


                function repositionItem(item) {

                    //var top = Math.max( ($item.position().top - 3), sumHeightActiveItems);



                    //$item.css('top', top+'px');
                    item.$element.animate({top: item.distance}, 1500);
                    /!*var reqId = requestAnimationFrame(function () {
                        repositionItem($item);
                    });

                    if(top >= sumHeightActiveItems){
                        sumHeightActiveItems += $item.outerHeight(true);
                        cancelAnimationFrame(reqId);
                    }*!/

                }


                /!*function repositionInactveItem($item, distance, beginTop) {


                    var top = Math.min( ($item.position().top + 3), (beginTop + distance));
                    $item.css('top', top+'px');
                    var reqId = requestAnimationFrame(function () {

                        repositionInactveItem($item, distance, beginTop);
                    });

                    if( (top - beginTop) >= distance ){
                        cancelAnimationFrame(reqId);
                    }

                }
                function repositionList($item, index) {
                    console.log($item.outerHeight(true));
                    heightActiveelements += $item.outerHeight(true);
                    for (var i = index; i >= 0; i--) {

                        if(!$sortedItems[i].hasClass('active') ){


                            console.log(heightActiveelements);
                            repositionInactveItem($sortedItems[i], heightActiveelements, $sortedItems[i].position().top);
                        }
                    }
                }*!/


                //$sortedItems[parseInt($firstItem.position().top)] = $firstItem;

                $items.each(function (index, item) {
                    $sortedItems[parseInt($(item).position().top)] = $(item);
                });

                $sortedItems = $sortedItems.filter(function (item) { return item != undefined });
                //deleted firstItem
                $sortedItems.shift();

                //resort by active and inactive items
                $sortedActiveItems = [];
                $sortedInactiveItems = [];
                for (let i = 0; i < $sortedItems.length; i++) {
                    if( $sortedItems[i].hasClass('active') ){
                        $sortedActiveItems.push($sortedItems[i]);
                    }
                    else{
                        $sortedInactiveItems.push($sortedItems[i]);
                    }

                }


                $sortedItems = $sortedActiveItems.concat($sortedInactiveItems);

                //calculate distance reposition
                $sortedItemsReposition = [];
                for (let i = 0; i < $sortedItems.length; i++) {
                    $sortedItemsReposition.push({
                        $element: $sortedItems[i],
                        distance: sumHeightActiveItems,
                    });

                    sumHeightActiveItems += $sortedItems[i].outerHeight(true);
                }

                _.each($sortedItemsReposition, function (item, index) {

                    repositionItem(item);

                }, this);
                /!*for (let i = 1; i < $sortedItems.length; i++) {
                    if($sortedItems[i].hasClass('active') && $sortedItems[i-1].hasClass('active')){

                        $sortedItems.shift();
                        $sortedItems.shift();
                        continue;
                    }
                    else{
                        break;
                    }

                }
                console.log($sortedItems);
                _.each($sortedItems, function ($item, index) {

                    if($item.hasClass('active') ){
                        repositionItem($item);
                        var startIndex = index - 1;

                        repositionList($item, startIndex);
                    }

                }, this);*!/

                /!*$firstItem.nextAll().each(function (index, item) {
                    if ($(item).hasClass('active') && !$(item).prev().hasClass('active')){
                        reposition($(item));
                        //sumHeightActiveItems += $(item).outerHeight(true);
                    }
                    else if($(item).hasClass('active') && $(item).prev().hasClass('active')){

                        sumHeightActiveItems += $(item).outerHeight(true);
                    }
                });*!/
            },

            activateItems: function(){
                this.activeCard.next('.card_list').find('.card_list_item').each(function (index, itemCard) {
                    var textItemCard = $(itemCard).data('text');
                    $('#who_it_for_list .who_it_for_list_item').each(function (index, item) {
                        var textItem = $(item).data('text');

                        if(textItem.indexOf(textItemCard, textItem.length - textItemCard.length) !== -1)
                            $(item).addClass('active');
                    });
                });
            },

            deactivateItems: function(){
                $('#who_it_for_list .who_it_for_list_item').removeClass('active');
            },

            whatItForCard: function () {
                var self = this;
                $('.who_it_for_card').mousedown(function (event) {
                    if(!$(this).hasClass('active')){

                        $(this).addClass('noactive');
                    }

                });
                $('.who_it_for_card').mouseup(function (event) {
                    if(!$(this).hasClass('active')){
                        $('.who_it_for_card').removeClass('active');
                        $(this).removeClass('noactive');
                        $(this).addClass('active');
                        self.stopListAnimation = true;
                        self.activeCard = $(this);
                        self.deactivateItems();
                        self.activateItems();
                        self.scrollToCurrentItem();
                    }
                    else{
                        /!*$(this).removeClass('active');
                        self.stopListAnimation = false;
                        self.deactivateItems();
                        self.animateList();*!/
                    }
                });

            },
        },

        tabs: function () {
            $('.product_features_list_item').on('click', function (event) {
                event.preventDefault();
                if($(this).hasClass('active'))
                    return;

                $('.product_features_list_item').removeClass('active');
                $('.tab_content').removeClass('active');
                $(this).addClass('active');
                $($(this).attr('href')).addClass('active');
            });
        },


    },*/



}


export default Gamma
