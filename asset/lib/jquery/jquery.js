$(document).ready(function() {

    $('.btn-dropdown').click(function() {
        $('.dropdown-mobile').slideToggle('slow');
    })

    $('#text').effect('bounce', {
        duration: 1000
    });

    $('#text2').effect('bounce', {
        duration: 1000
    });


    // SMOOTH SCROLL
    $('.ph a').click(function(event) {
        if( this.hash !== "" ) {
            event.preventDefault();
            var hash = this.hash;

            console.log(hash);

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000);
        }
    });
    
    // SHOW BUTTON TO TOP
    $(window).scroll(function() {
        if( $(this).scrollTop() > 300 ) {
            $('#scrollTop').fadeIn();
        }else {
            $('#scrollTop').fadeOut();
        }
    });

    $('#scrollTop').click(function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
    
});