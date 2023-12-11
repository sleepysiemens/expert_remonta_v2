$('#contact-open').on('click', function() {
    $('.contact-links').addClass('contact-links-active');
    $('#contact-open').addClass('disabled');
    $('#contact-close').removeClass('disabled');
});

$('#contact-close').on('click', function() {
    $('.contact-links').removeClass('contact-links-active');
    $('#contact-open').removeClass('disabled');
    $('#contact-close').addClass('disabled');

});