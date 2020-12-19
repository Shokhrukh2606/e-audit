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

        @if ($protected)body {
            /* background-image: url("{{ asset('shutterstock.png') }}"); */
            background-size: 100px 100px;
        }

        @endif.qr-code {
            position: absolute;
            bottom: 0px;
            left: 0;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="uz">
            Рег.№{{ $conclusion->id }} {{ date('d-m-Y', strtotime($conclusion->created_at)) }} йил
            <p class="blue center bold uppercase">
                01.05.2020 ЙИЛ ХОЛАТИ ТУЗИЛГАН МОЛИЯВИЙ ХИСОБОТЛАР БУЙИЧА ИҚТИСОДИЙ КУРСАТКИЧЛАРИНИ ТАХЛИЛ ҚИЛИШ
                НАТИЖАЛАРИ
                БЎЙИЧА ИЖОБИЙ АУДИТОРЛИК ХУЛОСАСИ.
            </p>
            <p class="bold center">{{ $conclusion->cust_info->cust_comp_name }} STIR:
                {{ $conclusion->cust_info->cust_comp_inn }}
            </p>
            <p class="bold center">
                {{ $conclusion->audit_comp_name }}.
            </p>
            <p>
                Ўзбекистон Республикаси Адлия Вазирлигидан {{ $conclusion->audit_comp_gov_reg_date }} йилда
                №{{ $conclusion->audit_comp_gov_reg_num }}-сонли гувохномаси билан рўйхатдан
                ўтказилган. ИНН - {{ $conclusion->audit_comp_inn }}, ОКЭД - {{ $conclusion->audit_comp_oked }}.
                Узбекистон Республикаси Молия Вазирлиги томонидан {{ $conclusion->audit_comp_lic_date }} йилда берилган
                барча хўжалик юритувчи
                субъектларда аудиторлик текширувини ўтказишга рухсат берувчи АФ №{{ $conclusion->audit_comp_lic }}
                -сонли Лицензия.
                Аудитор {{ $conclusion->auditor ? $conclusion->auditor->full_name : $conclusion->agent->full_name }}
                Ўзбекистон Республикаси Молия Вазирлиги томонидан {{ $conclusion->cert_date }} да берилган
                №{{ $conclusion->cert_number }}-сонли аудитор малака сертификатига эга.
                Банк: {{ $conclusion->audit_comp_bank_name }} Р/С:
                {{ implode(' ', str_split($conclusion->audit_comp_bank_acc, 4)) }} МФО:
                {{ $conclusion->audit_comp_bank_mfo }}.
                Ушбу махсус саволни текшириш юзасидан утказилган аудиторлик текшируви Узбекистон Республикасининг
                «Аудиторлик фаолияти тугрисида» ги конуни хамда 80-сонли «Махсус саволни текшириш натижалари бўйича
                аудитор
                ҳисоботи» АФМСга асосан утказилди.
            </p>
            <p>
                <span class="underline bold">
                    Мазкур «ASIA PACKS TRADING» MCHJ </span>корхонасининг 01.05.2020 йил холати бўйича амалдаги
                конунчиликга асосан
                тузилган ва аудитга такдим этилган молиявий хисоботларига асосан, 16.03.2005 йилдаги ГС-05/0271/1 сонли
                Қарори билан тасдиқланган, хамда Ўзбекистон Республикаси Адлия Вазирлиги томонидан 14.04.2005 йилда
                №1469
                сон тартиб рақами билан рўйхатга олинган «Корхоналарнинг молиявий-иқтисодий ахволи мониторинги ва
                тахлилини
                ўтказиш мезонларини аниқлаш тартиби тўгрисида» ги Низомда кўрсатилган корхонанинг молиявий-иктисодий
                ахволини белгиловчи асосий кўрсаткичлари қўйидагиларни ташкил этади:
            </p>
            <p class="bold">
                1. Коплаш коэффициенти= {{ $conclusion->kps()['value'] }}<br>
                2.Ўз айланма маблағлари билан таъминланиш коэффициенти= {{ $conclusion->koses()['value'] }}<br>
                3. Харажатларнинг рентабеллик коэффициенти= {{ $conclusion->kpp()['value'] }}<br>
            </p>
            <p>
                Натижада
                <span> 01.05.2020 йил {{ $conclusion->conclusion_base }}
                </span>
            </p>
            Шунингдек {{ $conclusion->cust_info->cust_comp_name }} корхонасининг 01.05.2020 йил холати буйича тузилган
            молиявий хисоботи,
            унинг молиявий ахволини хакконий акс эттиради ва мазкур хўжалик юритувчи субъект томонидан амалга оширилган
            молиявий ва хўжалик операциялари Ўзбекистон Республикаси қонун хужжатларининг талабларига жавоб беради.
            Шуни инобатга олиб корхонанинг молиявий хисоботларига ижобий хулоса берилди.
            <p class="bold">
                {{ $conclusion->audit_comp_name }} директори:&nbsp;&nbsp;&nbsp;&nbsp;
                {{ $conclusion->audit_comp_director_name }}
            </p>
            <p class="bold">
                Аудитор: <span
                    class="space-needed">{{ $conclusion->auditor ? $conclusion->auditor->full_name : $conclusion->agent->full_name }}</span>
            </p>
            <p class="text-left">
            <div class="qr-code">
                <img src="data:application/octet-stream;base64, {{ $qrcode }}" alt="">
            </div>
            </p>Сертификат
            №{{ $conclusion->auditor ? $conclusion->auditor->cert_number : $conclusion->agent->cert_number }}.
            {{ date('d-m-Y', strtotime($conclusion->cert_date)) }} да УзР Молия Вазирлиги томонидан берилган.)
        </div>
    </div>
</body>

</html>
