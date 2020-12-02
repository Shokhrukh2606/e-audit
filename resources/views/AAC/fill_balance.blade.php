<div class="row">
    <div class="col-md-4">
        <div class="info-box  bg-inactive  text-white">
            <div class="info-icon bg-inactive-dark">
                <span aria-hidden="true" class="icon icon-arrow-down"></span>
            </div>
            <div class="info-details">
                <h4>{{ lang('min_sum') }}</h4>
                <h3>500.00 {{ lang('sum') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box  bg-inactive  text-white">
            <div class="info-icon bg-inactive-dark">
                <span aria-hidden="true" class="icon icon-arrow-up"></span>
            </div>
            <div class="info-details">
                <h4>{{ lang('max_sum') }}</h4>
                <h3>2000000.00 {{ lang('sum') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box  bg-inactive  text-white">
            <div class="info-icon bg-inactive-dark">
                <span aria-hidden="true" class="icon icon-bar-chart"></span>
            </div>
            <div class="info-details">
                <h4>{{ lang('max_balance') }}</h4>
                <h3>10000000.00 {{ lang('sum') }}</h3>
            </div>
        </div>
    </div>
</div>
<p>Ваш ID:
<h1><strong>U{{ auth()->user()->id }}</strong></h1>
</p>
<hr>
<p><strong>{{ lang('available_systems') }}<sup>1</sup>:</strong></p><br>
@switch(config('global.lang'))
    @case('ru')
    <ol>
        <li>
            <p><strong>Платежная система <a href="https://payme.uz" target="_blank">PAYME</a>.</strong></p>
            <p>Вы можете оплатить через сайт <a href="https://payme.uz/home/payment" target="_blank">payme.uz</a> или с
                помощью мобильного приложения, которое доступно для скачивания с официального сайта <a
                    href="https://payme.uz" target="_blank">payme.uz</a></p>
            <p>Для пополнения балансового счета указывайте свой ID: <strong>U{{auth()->user()->id}}</strong> и сумму.</p>
            <p style="font-size:11px;">Для возможности оплаты, у вас должна быть активирована услуга смс-информирования.
                Информация о том как включить данную услугу вы можете прочитать <a href="https://www.ahost.uz/smsinform"
                    target="_blank">здесь</a>.</p>
            <p style="font-size:11px;">Также у вас должна быть платежная карточка UZCARD или HUMO с положительным балансом.
            </p>
            <p>&nbsp;</p>
        </li>
        <li>
            <p><strong>Платежная система <a href="http://click.uz" target="_blank">CLICK</a>.</strong></p>
            <p>Вы можете оплатить через сайт <a href="https://click.uz/payment/" target="_blank">click.uz</a> или с помощью
                мобильного приложения, которое доступно для скачивания с официального сайта <a href="https://click.uz/"
                    target="_blank">click.uz</a></p>
            <p>Для пополнения балансового счета указывайте свой ID: <strong>U{{auth()->user()->id}}</strong> и сумму.</p>
            <p style="font-size:11px;">Для возможности оплаты, у вас должна быть активирована услуга смс-информирования.
                Информация о том как включить данную услугу вы можете прочитать <a href="https://www.ahost.uz/smsinform"
                    target="_blank">здесь</a>.</p>
            <p style="font-size:11px;">Также у вас должна быть платежная карточка UZCARD с положительным балансом.</p>
            <p>&nbsp;</p>
        </li>
    </ol>
    <p style="color:green">1. Выше перечисленные платежные системы являются доверительными партнерами нашей компанией,
        имеющие прямой договор с нами на прием оплаты.</p>
    <hr>
    @break
    @case('uz')
    <ol>
        <li>
            <p><strong><a href="https://payme.uz" target="_blank">PAYME</a> тўлов тизими.</strong></p>
            <p>Тўловни<a href="https://payme.uz/home/payment" target="_blank">payme.uz</a> сайти орқали ёки Payme
                тизимининг сайтида кўрсатилган mobil илова орқали амалга оширишингиз мумкин<a href="https://payme.uz"
                    target="_blank">payme.uz</a></p>
            <p>Хисобингизни тўлдириш учун ушбу ИД кодни киритасиз:<strong>U{{auth()->user()->id}}</strong> ва суммасини.</p>
            <p style="font-size:11px;">Ушбу тизимдан фойдаланиш учун сизда СМС-хизмати фаоллаштирилган бўлиши керак.
            <p style="font-size:11px;">Бундан ташқари сизда UZCARD ёки HUMO пластик картаси ва етарли миқдорда пул
                бўлиши керак.
            </p>
            <p>&nbsp;</p>
        </li>
        <li>
            <p><strong><a href="http://click.uz" target="_blank">CLICK</a> тўлов тизими.</strong> </p>
            <p>Тўловни ушбу <a href="https://click.uz/payment/" target="_blank">click.uz</a> сайт орқали ёки сайтда
                кўрсатилган mobil-илова орқали амалга оширишингиз мумкин. <a href="https://click.uz/"
                    target="_blank">click.uz</a></p>
            <p>Хисобингизни тўлдириш учун ушбу ИД кодни киритасиз:<strong>U{{auth()->user()->id}}</strong> ва суммасини.</p>
            <p style="font-size:11px;">Ушбу тизимдан фойдаланиш учун сизда СМС-хизмати фаоллаштирилган бўлиши керак.
            <p style="font-size:11px;">Бундан ташқари сизда UZCARD ёки HUMO пластик картаси ва етарли миқдорда пул
                бўлиши керак.
            </p>
            <p>&nbsp;</p>
        </li>
    </ol>
    <hr>
    @break
    @case('oz')
    <ol>
        <li>
            <p><strong><a href="https://payme.uz" target="_blank">PAYME</a> to'lov tizimi.</strong></p>
            <p>To'lovni <a href="https://payme.uz/home/payment" target="_blank">payme.uz</a> sayti orqali yoki Payme
                tizimining saytida ko'rsatilgan mobil ilova orqali amalga oshirishingiz mumkin <a href="https://payme.uz"
                    target="_blank">payme.uz</a></p>
            <p>Xisobingizni to'ldirish uchun ushbu ID kodni kiritasiz: <strong>U{{auth()->user()->id}}</strong> va summasini.</p>
            <p style="font-size:11px;">Ushbu tizimdan foydalanish uchun sizda SMS-xizmati faollashtirilgan bo'lishi kerak.
            <p style="font-size:11px;">Bundan tashqari sizda UZCARD yoki HUMO plastik kartasi va yetarli miqdorda pul
                bo'lishi kerak.
            </p>
            <p>&nbsp;</p>
        </li>
        <li>
            <p><strong><a href="http://click.uz" target="_blank">CLICK</a>to'lov tizimi.</strong> </p>
            <p>To'lovni ushbu <a href="https://click.uz/payment/" target="_blank">click.uz</a> sayt orqali yoki saytda
                ko'rsatilgan mobil-ilova orqali amalga oshirishingiz mumkin. <a href="https://click.uz/"
                    target="_blank">click.uz</a></p>
            <p>Xisobingizni to'ldirish uchun ushbu ID kodni kiritasiz: <strong>U{{auth()->user()->id}}</strong> va summasini.</p>
            <p style="font-size:11px;">Ushbu tizimdan foydalanish uchun sizda SMS-xizmati faollashtirilgan bo'lishi kerak.
            <p style="font-size:11px;">Bundan tashqari sizda UZCARD yoki HUMO plastik kartasi va yetarli miqdorda pul
                bo'lishi kerak.
            </p>
            <p>&nbsp;</p>
        </li>
    </ol>
    <hr>
    @break
    @default

@endswitch
