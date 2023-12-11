<section class="about-service">
    <div class="about-with-button">
        <h1>{{$category->title}}</h1>
        <a class="gradient_button" href="#form"><span class="flare"></span><p>Заказать услугу</p></a>
    </div>
    <p>
        @php
          echo $category->description;
        @endphp
  </p>

</section>

<script>
nestedElement.scrollTo(0, nestedElement.scrollHeight);
</script>