import Gamma from '../../gamma';

let Newsroom = {

    taxId: 0,
    pageType: '',
    page: 2,
    $section: $('.blog-section'),
    init () {
        if(!this.$section.length)
            return;

        this.taxId = taxId;
        this.pageType = pageType;

        this.events()

        $('#tax_data').remove();
    },

    events () {
        let self = this;

        $('.load__more_posts').on('click', function (event){
            event.preventDefault();
            self.loadPosts();
        });

        //Mobile menu=============================================================
        /*$('.js-blog-menu-toggle').on('click', function () {
            $(this).next().slideToggle(500);
        });
        $('.blog-mobile-menu__item').on('click', function (){
            $('#active__cat').text($(this).text())
            $(this).closest('.js-blog-menu-list').slideToggle(500);
        });*/
    },

    loadPosts () {

        var data = {
            action: 'newsroom_load_more_posts',
            nonce: $('#nonce').val(),
            taxId: this.taxId,
            pageType: this.pageType,
            page: this.page,
        }
        Gamma.addLoaderBlock(this.$section);
        Gamma.send(data, this.successLoadPosts, this);
    },

    successLoadPosts: function (response){

        $('.posts-list').append(response.html);

        if(response.count ==  $('.posts-list .post-card').length){
            $('#more_all').hide();
        }
        else{
            this.page++;
        }
        Gamma.removeLoaderBlock(this.$section);
    }

};

$(document).ready( () => {
    Newsroom.init();
    $('.share--btn').on('click', function(event) {
        event.preventDefault();

        window.open($(this).attr('href'), 'SocialShare', "width=550,height=600,left=400,menubar=no,toolbar=no");
    });
})
