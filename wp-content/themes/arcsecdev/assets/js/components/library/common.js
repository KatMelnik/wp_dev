function setBlockWindowHeight(){
    var wH = $(window).height();
    $('.vh100').each(function (index, el){
        var addHeight = $(el).data('add-height') || 0;

        $(el).height(wH + addHeight);
    });
}

$(document).ready( () => {
    setBlockWindowHeight();
})
