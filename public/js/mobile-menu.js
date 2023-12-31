$('.mobile-menu-btn').on('click', function() {
    $('.mobile-menu').addClass('show');
    $('#city-select').addClass('header-contact-info-open');
});

$('.mobile-close-btn').on('click', function() {
    $('.mobile-menu').removeClass('show');
    $('#city-select').removeClass('header-contact-info-open');
});
