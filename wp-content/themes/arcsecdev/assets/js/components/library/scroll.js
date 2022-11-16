const GScroll = {
    previousScroll: 0,
    scrollDown: true,
    init() {
        let self = this;
        $(window).scroll(function (){
            var scrollTop = $(this).scrollTop();
            //Down
            self.setScrollDirection(scrollTop)
            self.fixHeader(scrollTop);
        });
    },

    setScrollDirection(scrollTop) {
        //Down
        this.scrollDown = scrollTop > this.previousScroll ? true : false;

        this.previousScroll = scrollTop;

    },

    fixHeader(windowScrollTop){
        let header = $('.fix-header');
        let headerHeight = header.height();
        if(windowScrollTop > 1){
            header.addClass('fix');
            $('body').css({
                'paddingTop': headerHeight+'px'
            });
        }
        else{
            header.removeClass('fix');
            $('body').css({
                'paddingTop': 0
            })
        }
    },

}

const GScrollHash = {
    init(){
        this.doHash();
        this.doClickAnchor();
        this.doClickNextBlock();
    },
    doHash(){
        var hash = window.location.hash;

        if(hash == '')
            return;

        location.hash = '';

        if(hash[1] != undefined){
            this.doAnimate(hash);
        }
    },
    doClickAnchor(){
        var self = this;
        $('a.maybe_hash, a.wp-block-button__link, a.link-btn').on('click', function(event){

            if(this.hash != '' && $(this.hash).length){

                event.preventDefault();
                self.doAnimate(this.hash);
            }
        })
    },
    doClickNextBlock(){
        var self = this;
        var aNextBlock = $('a.next_block');
        var nextSection = aNextBlock.closest('section').nextAll('section');
        if(nextSection.length){
            aNextBlock.addClass('visible');
        }

        aNextBlock.on('click', function(event){
            event.preventDefault();
            var next = $(this).closest('section').nextAll('section');

            if(next.length){
                $('html, body').animate({
                    scrollTop: next.offset().top - 95
                }, 1000);
            }
        })
    },
    doAnimate(hash, correct){
        correct = correct || 0;
        $('html, body').animate({
            scrollTop: $(hash).offset().top - correct
        }, 1000);

        location.hash = hash;
    }

}

$(document).ready( () => {
    GScroll.init();
    GScrollHash.init();
})
