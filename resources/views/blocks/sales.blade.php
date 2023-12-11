<section class="sales">
    <h1 class="section-header hidden">Специальные предложения</h1>
    <div class="sales-div">

        @php
            $i=0;
        @endphp

        @foreach ($sales as $sale)

        @php
            $i++;
        @endphp

        <a class="sale-banner scroll-hidden" id="sale-link-{{$i}}">
            <span class="sale-dot dot-{{$i}}"></span>
            <div class="sale-bg">
                <img src=" /img/sales/{{$sale->src}}">
            </div>
            <div class="sale-text-div">
                <div>
                    <p>{{$sale->title}}</p>
                </div>
            </div>
        </a>
            
        @endforeach
        @php
            $sale_i=$i;
        @endphp
    </div>
</section>

<script>
    for(let i=1; i<={{$i}};i++)
    {
        $('#sale-link-'+i).on('click', function() 
        {
            $('#sale-form-'+i).addClass('page-wrapper-active');
        });

        $('#sale-form-close-'+i).on('click', function() 
        {
            $('#sale-form-'+i).removeClass('page-wrapper-active');
        });
    }
</script>