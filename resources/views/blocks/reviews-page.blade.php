<section class="faq">
    <h1 class="section-header">{{__('Отзывы')}}</h1>
    <br>
    <a class="gradient_button" id="add_review" style="height: 35px">
        <span class="flare"></span><p>{{__('Оставить отзыв')}}</p>
    </a>
    <br>
    @if(config('app.city') === 'Астана')
    {!!$block->code!!}
    @else
    {!!$block->code_almaty!!}
    @endif
    <div class="hidden" style="width: 95%; margin: auto">
        @foreach($reviews as $review)
                <a class="review" style="width: 100%; height: auto; padding: 15px 0; margin: auto 0">
                    <div style="width: 90%; margin: auto">
                        <div class="review-user-info">
                            <div class="review-user-info-subdiv">
                                <div style="display: flex">
                                    <h3>{{db_translate($review->username_ru,$review->username_kz)}}</h3>
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
                        <p>{{db_translate($review->text_ru,$review->text_kz)}}</p>
                    </div>
                </a>
            <br>
        @endforeach
    </div>
</section>

<script defer src="/js/faq.js"></script>

@section('review-form')
    @include('blocks.review-form')
@endsection

<script>
    $('#add_review').on('click', function (){
        $('#review-form').addClass('page-wrapper-active');
    })
    $('#review-form-close').on('click', function (){
        $('#review-form').removeClass('page-wrapper-active');
    })
</script>
