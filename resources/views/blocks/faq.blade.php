<section class="faq">
    <h1 class="section-header">Частые вопросы</h1>
    <br>
    <div class="faq-div hidden">

        @foreach ($questions as $question)

        <div class="question" id="ans_{{$question->id}}">
            <a class="question-header" id="q_{{$question->id}}">
                <p>
                  @php
                  	echo $question->question
                  @endphp
                </p>
                <i class="fas fa-chevron-down"></i>
            </a>
            <p class="answer">
 				@php
                  	echo $question->answer
                  @endphp
            </p>
        </div>

        <span class="line line_{{$question->id}} line_{{$next_id=($question->id)+1}}"></span>
            
        @endforeach


    </div>
</section>

<script defer src="/js/faq.js"></script>