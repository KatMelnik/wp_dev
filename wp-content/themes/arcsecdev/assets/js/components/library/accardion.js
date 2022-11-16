$(document).ready( () => {
    if($('.accordion').length){
        $('.accordion .accordion_item').on('click', function (e){
            console.log('accordion')
            var $item = $(this);
            $item.toggleClass('active');
            $item.find('.accordion_content').stop().slideToggle(500, function (){
                if($item.hasClass('active')){
                    $item.find('i').removeClass('fa-angle-down').addClass('fa-angle-up')
                }
                else{
                    $item.find('i').removeClass('fa-angle-up').addClass('fa-angle-down')
                }
            });
        })
    }


})
