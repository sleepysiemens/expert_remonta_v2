$('#scroll-right').on('click', function() {

    $('#scroll-left').removeClass('arrow-hidden');

    $('.review-wrapper').animate({
        scrollLeft: "+=300px"
    }, "slow");

});

$('#scroll-left').on('click', function() {

    if($('.review-wrapper').scrollLeft()<301)
        $('#scroll-left').addClass('arrow-hidden');

    $('.review-wrapper').animate({
    scrollLeft: "-=300px"
  }, "slow");

});