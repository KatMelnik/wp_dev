$(document).ready( () => {
    if($('.tabs').length){
        $('.tabs .tab_target').on('click', function (e){
            e.preventDefault();

            if($(this).hasClass('active'))
                return;

            var parent = $(this).closest('.tabs');
            var target = $(this).attr('href');

            parent.find('.tab_target').removeClass('active');
            parent.find('.tab_content').removeClass('active');

            $(this).addClass('active');
            $(target).addClass('active');
        })
    }


})
