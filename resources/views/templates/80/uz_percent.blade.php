@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
$author=$conclusion->auditor ??$conclusion->agent; 
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
            font-size: 11px;
            line-height: 12px;
            text-align: justify;
        }
        @page { margin: 0px; }
        body { margin: 0px; }

        @if ($protected)body {
            background-image: url({{asset('naqsh.png')}});
            background-size:cover;
        }

        @endif
         .page-wrap{
            padding:190px 100px 100px 100px;
            position: relative;
        }
         .qr-code {
            position: absolute;
            bottom: 0px;
            
        }
        p{
            margin:5px 0;
        }
    </style>
</head>

<body>
    <div class="page-wrap">
        <div class="uz">
            Рег.№{{ $conclusion->id }} {{ date('d-m-Y', strtotime($conclusion->created_at)) }} йил
            <p class="blue center bold uppercase">
                 {{$conclusion->cust_info->year}} ЙИЛ {{quarter_statement($conclusion->cust_info->quarter_start, $conclusion->cust_info->quarter_finish)}} ХОЛАТИ ТУЗИЛГАН МОЛИЯВИЙ ХИСОБОТЛАР БУЙИЧА ИҚТИСОДИЙ КУРСАТКИЧЛАРИНИ ТАХЛИЛ ҚИЛИШ
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
                Аудитор {{ $conclusion->auditor_name }}
                Ўзбекистон Республикаси Молия Вазирлиги томонидан 
                {{ date('Y-m-d',strtotime($conclusion->auditor_cert_date)) }} да берилган
                №{{ $conclusion->auditor_cert_number }}-сонли аудитор малака сертификатига эга.
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
                    Мазкур {{ $conclusion->cust_info->cust_comp_name }} </span>корхонасининг {{$conclusion->cust_info->year}}  йил  {{quarter_statement($conclusion->cust_info->quarter_start, $conclusion->cust_info->quarter_finish)}} холати бўйича амалдаги
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
                    <strong>
                    <span>  {{$conclusion->cust_info->year}}  йил  {{quarter_statement($conclusion->cust_info->quarter_start, $conclusion->cust_info->quarter_finish)}} холатига корхонанинг тўлов қобилияти юқорилиги, уз айланма маблаглари билан таъминланиши етарли даражада булганлиги аникланди ва рентабеллик коэффициенти юқори даражани ташкил этади.
                    Юкоридагиларни хисобга олган холда умумий хисобда корхона иктисодий барқарор хисобланади. 
                    </strong>
                </p>
                Шунингдек {{ $conclusion->cust_info->cust_comp_name }} корхонасининг {{$conclusion->cust_info->year}}  йил  {{quarter_statement($conclusion->cust_info->quarter_start, $conclusion->cust_info->quarter_finish)}} холати буйича тузилган
                молиявий хисоботи,
                унинг молиявий ахволини хакконий акс эттиради ва мазкур хўжалик юритувчи субъект томонидан амалга оширилган
                молиявий ва хўжалик операциялари Ўзбекистон Республикаси қонун хужжатларининг талабларига жавоб беради.
                <strong>
                Шуни инобатга олиб корхонанинг молиявий хисоботларига ижобий хулоса берилди.</strong>
                <p class="bold">
                    {{ $conclusion->audit_comp_name }} директори:&nbsp;&nbsp;&nbsp;&nbsp;
                    {{ $conclusion->audit_comp_director_name }}
                </p>
                <p class="bold">
                    Аудитор: <span
                    class="space-needed">{{ $conclusion->auditor_name }}</span>
                </p>
                <p class="text-left">
                    <div class="qr-code">
                        <img src="data:application/octet-stream;base64, {{ $qrcode }}" alt="">
                    </div>
                </p>
                <small>Сертификат
                №{{ $conclusion->auditor_cert_number }}.
                {{ date('d-m-Y', strtotime($conclusion->auditor_cert_date)) }} да УзР Молия Вазирлиги томонидан берилган.
                </small>
                <p style="float:right;">
                    Такдим этилган сана : <br>
                    {{date('d.m.Y', strtotime($conclusion->created_at))}} й
                </p>
            </div>
        </div>
    </body>

    </html>
