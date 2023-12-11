@php
    $last_category=0;
    $i=1;
@endphp
    <section>
        <h1 class="section-header">Расценки</h1>
    </section>

        @foreach ($prices as $price)
            @if (($price->category)!=$last_category)
                @php
                    $last_category=$price->category;
                @endphp

                </section>
                <section class="table">
                    <div class="table-header">
                        <p class="c1">{{$price->category}}</p>
                        <p class="c2">Ед. изм.</p>
                        <p class="c3">Цена ₸</p>
                    </div>
                    @if ($i%2==1)
                        <div class="table-g">
                    @else
                        <div class="table-tr">
                    @endif
                        <p class="c1">
                            {{$price->title}}
                        </p>
                        <p class="c2">
                            {{$price->unit}}
                        </p>
                        <p class="c3">
                            {{$price->price}}
                        </p>
                    </div>
            @else
                @if ($i%2==1)
                    <div class="table-g">
                @else
                    <div class="table-tr">
                @endif
                    <p class="c1">
                        {{$price->title}}
                    </p>
                    <p class="c2">
                        {{$price->unit}}
                    </p>
                    <p class="c3">
                        {{$price->price}}
                    </p>
                </div>                
            @endif
            @php
                $i++;
            @endphp
        @endforeach

                </section>