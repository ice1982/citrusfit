$( document ).ready( function() {


    $('.fancybox-modal').fancybox({
        
        minWidth: 500,
        minHeight: 360
    });

    $('.fancybox-image-link').fancybox();
    $('.pol').click(function(){
        $.fancybox({
            href: '#politica',
            maxWidth: 450
        })
    })
});
