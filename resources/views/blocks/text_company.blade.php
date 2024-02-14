<section class="about">
        <div>
            @foreach($texts as $text)
                {{db_translate($text->text_ru,$text->text_kz)}}
            @endforeach
        </div>
</section>
