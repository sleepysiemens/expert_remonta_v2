<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js" type="text/javascript"></script>
          
<!-- nanogallery2 -->
<link  href="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
<script  type="text/javascript" src="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/jquery.nanogallery2.min.js"></script>

<section class="services-page" style="min-height: 80vh">
  <h1 class="section-header">Галерея</h1>
  {{--<br>--}}
  {{--<div class="services-div" style="min-height: 120vh">--}}

    <div id="nanogallery2">
      {{--gallery_made_with_nanogallery2--}}
    </div>
            
    <script>
       jQuery(document).ready(function () {
        let srcs = []
        let imgs = document.querySelectorAll('#nanogallery3 img').forEach(img => srcs.push({
          src: img.getAttribute('src'), srct: img.getAttribute('src'), title: img.getAttribute('alt')
        }))

          jQuery("#nanogallery2").nanogallery2( {
              // ### gallery settings ### 
              thumbnailHeight:  300,
              thumbnailWidth:   300,
              //itemsBaseURL:     '/img/gallery',
              
              // ### gallery content ### 
              items: srcs
            });
        });
    </script>

    <div id="nanogallery3">
      @foreach($galleries as $gallery)

      <img alt="{{db_translate($gallery->title_ru, $gallery->title_kz)}}" 
      src="{{getCommonResource('/img/gallery/'.$gallery->src)}}" width="300">

      @endforeach
    </div>

  {{--</div>--}}
</section>


