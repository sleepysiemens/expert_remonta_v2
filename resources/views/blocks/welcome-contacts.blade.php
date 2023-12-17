<section class="welcome welcome-contact">
  @foreach ($Headers as $Header)
            <img class="welcome-bg" src="{{$Header->src}}">
  @endforeach
            <div class="welcome-content">
                <div class="welcome-header">
                    @foreach ($Headers as $Header)
                        <h1>{{app()->db_translate($Header->title_ru,$Header->title_kz)}}</h1>
                        <h3>{{app()->db_translate($Header->subtitle_ru,$Header->subtitle_kz)}}</h3>
                    @endforeach
                </div>
               <div class="contact-div">

                    <a href="@foreach ($whatsapp as $wp){{$wp->link}}@endforeach" target="_blank" class="contact-banner whatsapp">
                        <div>
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            <h3>WhatsApp</h3>
                        </div>
                    </a>

                    <a href="@foreach ($telegram as $tg){{$tg->link}}@endforeach" target="_blank" class="contact-banner telegram">
                        <div>
                            <i class="fab fa-telegram-plane" aria-hidden="true"></i>
                            <h3>Telegram</h3>
                        </div>
                    </a>

                    <a href="@foreach ($instagram as $insta){{$insta->link}}@endforeach" target="_blank" class="contact-banner instagram">
                        <div>
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <h3>Instagram</h3>
                        </div>
                    </a>

                    <a href="@foreach ($phone as $ph){{$ph->link}}@endforeach" target="_blank" class="contact-banner phone">
                        <div>
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <h3>Телефон</h3>
                        </div>
                    </a>
               </div>
            </div>
        </section>
