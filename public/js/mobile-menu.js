$('.mobile-menu-btn').on('click', function() {
    $('.mobile-menu').css({"display":"block"});
    setTimeout(() => {
        $('.mobile-menu').addClass('show');
        $('#city-select').addClass('header-contact-info-open');
    }, 300)
    
});

$('.mobile-close-btn').on('click', function() {
    $('.mobile-menu').removeClass('show');
    $('#city-select').removeClass('header-contact-info-open');
    setTimeout(() => {
        $('.mobile-menu').css({"display":"none"});
    }, 300)
});
