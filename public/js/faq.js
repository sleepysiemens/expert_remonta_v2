    for(let i=1; i<=50; i++)
    {
        $('#q_'+i).on('click', function() {
        if($('#ans_'+i).hasClass("question-active")){
            $('#ans_'+i).removeClass('question-active');
            $('.line_'+i).removeClass('line-hidden');
        }
        else{
            $('#ans_'+i).addClass('question-active');
            $('.line_'+i).addClass('line-hidden');

        }
        let j=i;
        });
    }
