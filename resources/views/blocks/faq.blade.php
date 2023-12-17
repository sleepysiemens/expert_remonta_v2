<section class="faq">
    <h1 class="section-header">{{app()->translate('Частые вопросы')}}</h1>
    <br>
    <div class="faq-div hidden">

        @foreach ($questions as $question)

        <div class="question" id="ans_{{$question->id}}">
            <a class="question-header" id="q_{{$question->id}}">
                <p>
                    {{app()->db_translate($question->question_ru, $question->question_kz)}}
                </p>
                <i class="fas fa-chevron-down"></i>
            </a>
            <p class="answer">
                {{app()->db_translate($question->answer_ru, $question->answer_kz)}}
            </p>
        </div>

        <span class="line line_{{$question->id}} line_{{$next_id=($question->id)+1}}"></span>

        @endforeach


    </div>
</section>

<script defer src="/js/faq.js"></script>
