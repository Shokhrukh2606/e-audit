@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Auditor Conclusion</title>
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 13px;
	          text-align: justify;
        }

        body {
            background-image: url("{{ asset('shutterstock.png') }}");
        }

        .qr-code {
            position: absolute;
            bottom: 0;
            left: 0;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="uz">
            <p class="right blue bold mb">Рег.№{{$conclusion->id}} {{$conclusion->created_at}} йил</p>
            <p class="blue center bold uppercase">01.05.2020 ЙИЛ ХОЛАТИ ТУЗИЛГАН МОЛИЯВИЙ ХИСОБОТЛАР БУЙИЧА ИҚТИСОДИЙ
                КУРСАТКИЧЛАРИНИ ТАХЛИЛ ҚИЛИШ НАТИЖАЛАРИ БЎЙИЧА ИЖОБИЙ АУДИТОРЛИК ХУЛОСАСИ.
            </p>
            <p class="bold">
              {{ $conclusion->audit_comp_name }}.
            </p>
            <p>
                Ўзбекистон Республикаси Адлия Вазирлигидан {{ $conclusion->audit_comp_gov_reg_date }} йилда
                №{{ $conclusion->audit_comp_gov_reg_num }}-сонли гувохномаси билан рўйхатдан ўтказилган. ИНН -
                {{ $conclusion->audit_comp_inn }}, ОКЭД - {{ $conclusion->audit_comp_oked }}.
            </p>
            <p>Узбекистон Республикаси Молия Вазирлиги томонидан {{ $conclusion->audit_comp_lic_date }} да берилган
                барча хўжалик юритувчи
                субъектларда аудиторлик текширувини ўтказишга рухсат берувчи АФ №{{ $conclusion->audit_comp_lic }}
                -сонли Лицензия. </p>
            <p>Аудитор {{ $conclusion->auditor ? $conclusion->auditor->full_name : $conclusion->agent->full_name }} Ўзбекистон Республикаси Молия Вазирлиги томонидан
                {{ $conclusion->cert_date }} да берилган
                №{{ $conclusion->cert_number }}-сонли аудитор малака сертификатига эга.</p>
            <p>Банк: {{ $conclusion->audit_comp_bank_name }} Р/С:
                {{ implode(' ', str_split($conclusion->audit_comp_bank_acc, 4)) }} МФО:
                {{ $conclusion->audit_comp_bank_mfo }}.</p>
            <p><span class="bold">Мазкур {{ $conclusion->cust_info->cust_comp_name }}</span> корхонасига
                {{ $conclusion->cust_info->cust_comp_registered_by }} томонидан
                {{ $conclusion->cust_info->cust_comp_gov_reg_date }} да
                {{ $conclusion->cust_info->cust_comp_gov_reg_number }}-сонли реестр раками билан руйхатга олинган
                ва унинг фаолиятига гувохнома берилган.</p>
            <p>STIR: {{ $conclusion->cust_info->cust_comp_inn }} Фаолият тури:
                {{ $conclusion->cust_info->cust_comp_activity }} фаолияти ХХТУТ:
                {{ $conclusion->cust_info->cust_comp_oked }}.</p>
            <p>Ушбу махсус саволни текшириш юзасидан утказилган аудиторлик текшируви Узбекистон Республикасининг
                «Аудиторлик фаолияти тугрисида» ги конуни хамда
                {{ $conclusion->cust_info->template->standart_num }}-сонли
                {{ json_decode($conclusion->cust_info->template->name, true)[config('global.lang')] }}га асосан
                утказилди. </p>
            <p><span class="bold">Мазкур {{ $conclusion->cust_info->cust_comp_name }}</span> корхонасининг 01.05.2020
                йил холати бўйича
                амалдаги конунчиликга асосан тузилган ва аудитга такдим этилган молиявий хисоботларига асосан,
                16.03.2005 йилдаги ГС-05/0271/1 сонли Қарори билан тасдиқланган, хамда Ўзбекистон Республикаси Адлия
                Вазирлиги томонидан 14.04.2005 йилда №1469 сон тартиб рақами билан рўйхатга олинган «Корхоналарнинг
                молиявий-иқтисодий ахволи мониторинги ва тахлилини ўтказиш мезонларини аниқлаш тартиби тўгрисида» ги
                Низомда кўрсатилган корхонанинг молиявий-иктисодий ахволини белгиловчи асосий кўрсаткичлари
                қўйидагиларни ташкил этади:</p>
            <p>1. Коплаш коэффициенти= {{$conclusion->fcoefficient}}% </p>
            <p>2.Ўз айланма маблағлари билан таъминланиш коэффициенти={{$conclusion->scoefficient}}</p>
            <p>3. Харажатларнинг рентабеллик коэффициенти= 0,06 </p>
            <p>Натижада <span class="bold">01.05.2020 йил холатига корхонанинг тўлов қобилияти юқорилиги, уз айланма
                    маблаглари билан таъминланиши етарли даражада булганлиги аникланди ва рентабеллик коэффициенти юқори
                    даражани ташкил этади.</span></p>
            <p class="bold">Юкоридагиларни хисобга олган холда умумий хисобда корхона иктисодий барқарор хисобланади.
            </p>
            <p><span class="bold">Шунингдек {{ $conclusion->cust_info->cust_comp_name }} корхонасининг 01.05.2020 йил
                    холати буйича</span>
                тузилган молиявий хисоботи, унинг молиявий ахволини хакконий акс эттиради ва мазкур хўжалик юритувчи
                субъект томонидан амалга оширилган молиявий ва хўжалик операциялари Ўзбекистон Республикаси қонун
                хужжатларининг талабларига жавоб беради.</p>
            <p class="bold">Шуни инобатга олиб корхонанинг молиявий хисоботларига ижобий хулоса берилди.</p>
            <div class="authority bold">
                <p>{{ $conclusion->audit_comp_name }}
                    аудиторлик корхонаси ф/л директори: </p>
                <p class="right">{{ $conclusion->audit_comp_director_name }}</p>
                <p>Аудитор: </p>
                <p class="right">{{ $conclusion->auditor ? $conclusion->auditor->full_name : $conclusion->agent->full_name }}</p>
            </div>
            <p class="italic underline">(Сертификат № {{$conclusion->audit_comp_director_cert_num }}. {{$conclusion->audit_comp_director_cert_date}} да УзР Молия Вазирлиги томонидан
                берилган.)</p>
            <p class="italic underline right bold">Такдим этилган сана : {{$conclusion->created_at}} й</p>
        </div>
    </div>
    <div class="qr-code">
        <img src="data:application/octet-stream;base64, {{ $qrcode }}" alt="">
    </div>
</body>

</html>
