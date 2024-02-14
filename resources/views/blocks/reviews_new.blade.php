<section class="reviews">
  <div class="section-header">{{__('Отзывы')}}</div>

  <div class="review-wrapper">
      <div class="reviews-div">

          @foreach ($reviews as $review)

          
          <a class="review {{getBlockClass($loop->iteration)}}" href="{{asset(route('reviews.index'))}}">
              <div class="review-div">
                  <div class="review-user-info">

                      <div class="review-user-info-subdiv">
                        <div class="review-stars">
                          @for ($i = 1; $i <= 5; $i++)
                              @if ($i<=$review->rating)
                                  <i class="fas fa-star"></i>
                              @else
                                  <i class="far fa-star"></i>
                              @endif
                          @endfor
                      </div>

                              <p class="review_user_name">{{db_translate($review->username_ru,$review->username_kz)}}</p>
                              {{--<p class="review_user_city">Алматы</p>--}}
                          
                      </div>
                  </div>
                  {{--<p>{{mb_substr($review->text_ru, 0, 30)}}</p>--}}
                  <p>{{db_translate(mb_substr($review->text_ru, 0, 100),mb_substr($review->text_kz, 0, 100))}} ...</p>
                  {{--<p>{{mb_substr(db_translate($review->text_ru,$review->text_kz), 0, 30)}}</p>--}}
                  {{--<p style="margin-top: 20px;"> {{$review->local_date;}}</p>--}}
              </div>
          </a>

          @if($loop->iteration === 3)
            <a href="/reviews" class="review send_review_card">
                <div class="review-div">
                    <button class="ui_kit_button">@lang('Оставьте свой отзыв')</button>
                </div>
            </a>
          @endif

          @endforeach
        
          
      </div>
      
      <div class="arrow_buttons_wrap">
    <button class="left-arrow" id="scroll-left">
        {{--<i class="fas fa-arrow-left"></i>--}}
    </button>
    <button class="right-arrow" id="scroll-right">
        {{--<i class="fas fa-arrow-right"></i>--}}
    </button>
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
