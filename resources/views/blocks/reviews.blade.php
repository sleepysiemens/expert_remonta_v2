<section class="reviews">
    <div class="section-header">{{app()->translate('Отзывы')}}</div>
    <button class="right-arrow" id="scroll-right">
        <i class="fas fa-arrow-right"></i>
    </button>
    <button class="left-arrow" id="scroll-left">
        <i class="fas fa-arrow-left"></i>
    </button>

    <div class="review-wrapper">
        <div class="reviews-div">

            @foreach ($reviews as $review)

            
            <a class="review {{getBlockClass($loop->iteration)}}" href="{{asset(route('reviews.index'))}}">
                <div class="review-div">
                    <div class="review-user-info">

                        <div class="review-user-info-subdiv">
                            <div style="display: flex">
                                <h3>{{app()->db_translate($review->username_ru,$review->username_kz)}}</h3>
                                <p style="margin: 0; margin-left: 10px"> @if($review->review_date!=null) {{date("d.m.Y",strtotime($review->review_date))}} @endif</p>
                            </div>
                            <div class="review-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i<=$review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p>
                        {{app()->db_translate($review->text_ru,$review->text_kz)}}
                    </p>
                </div>
            </a>

            @endforeach

        </div>
    </div>
</section>

<script>
    let scroll = 345 * 3
    $('#scroll-right').on('click', function() {
        let reviewBlockWidth = document.querySelector(".reviews-div .review").offsetWidth + 20
        //$('.review-wrapper').animate({
        $('.reviews-div').animate({
            scrollLeft: `+=${reviewBlockWidth}px`
            //scrollLeft: "+=345px"
        }, "slow");
        //console.log('scroll-left');
    });

    $('#scroll-left').on('click', function() {
        let reviewBlockWidth = document.querySelector(".reviews-div .review").offsetWidth + 20
        //$('.review-wrapper').animate({
        $('.reviews-div').animate({
            scrollLeft: `-=${reviewBlockWidth}px`
            //scrollLeft: "-=345px"
        }, "slow");
        //console.log('scroll-right');

    });
</script>
