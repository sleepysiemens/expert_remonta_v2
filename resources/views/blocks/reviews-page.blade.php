<section class="faq">
    <h1 class="section-header">{{app()->translate('Отзывы')}}</h1>
    <br>
    <div class="hidden" style="width: 95%; margin: auto">
        @foreach($reviews as $review)
                <a class="review" style="width: 100%; height: auto; padding: 15px 0; margin: auto 0">
                    <div style="width: 90%; margin: auto">
                        <div class="review-user-info">
                        <span class="user-pic">
                            <i class="far fa-user" aria-hidden="true"></i>
                        </span>
                            <div class="review-user-info-subdiv">
                                <h3>{{app()->db_translate($review->username_ru,$review->username_kz)}}</h3>
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
                        <p>{{app()->db_translate($review->text_ru,$review->text_kz)}}</p>
                    </div>
                </a>
            <br>
        @endforeach
    </div>
</section>

<script defer src="/js/faq.js"></script>
