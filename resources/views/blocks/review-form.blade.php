
<div class="page-wrapper " id="review-form">
    <div class="sale-form-div">
        <button class="form-sale-close" id="review-form-close"><i class="fas fa-times"></i></button>
        <img src="/img/_d40b8276-e5e6-423c-bc70-36e0d3892ecc.jpg">

        <h3>Оставьте ваши контакты</h3>
        <p>
            мы с вами свяжемся
        </p>
        <form class="form-sale" method="post" action="{{route('review.store')}}">
            @csrf
            <input class="hidden" type="text" name="username" placeholder="Имя" required>
            <input id="rating" class="hidden" value type="hidden" min="1" max="5" name="rating" placeholder="Оценка" required>
            <div class="star-rating">
                <span class="star" data-rating="1"></span>
                <span class="star" data-rating="2"></span>
                <span class="star" data-rating="3"></span>
                <span class="star" data-rating="4"></span>
                <span class="star" data-rating="5"></span>
            </div>
            <textarea class="hidden" name="text" placeholder="текст..." rows="5" required></textarea>
            <button class="hidden gradient_button"><span class="flare"></span><p>{{app()->translate('Отправить')}}</p></button>
        </form>
    </div>
</div>

<script>
    

    document.addEventListener('DOMContentLoaded', function(){
        //document.getElementById('rating').value=getGoogleClientID();
        /*document.querySelectorAll(".star-rating .star").addEventListener('mousemove', function(e) {
            console.log('star hover')
        })*/
        document.addEventListener('mousemove', function(event) {
            if(!event.target.classList.contains('star')) return;
            let rating = event.target.dataset.rating;
            document.getElementById('rating').value=rating;
            //console.log(rating)
            document.querySelectorAll(".star-rating .star").forEach((star, idx) => {
                if(idx < rating) star.style.content = "url(/svg/star-filled.svg)"
                else star.style.content = "url(/svg/star.svg)"
            })
        })

        /*document.addEventListener('click', function(event) {
            if(!event.target.classList.contains('star')) return;
            let rating = event.target.dataset.rating;
            document.getElementById('rating').value=rating;
        })*/
});

</script>
