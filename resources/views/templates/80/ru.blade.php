@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">
    <style>
        @page { margin: 0px; }
        body { margin: 0px; }
        * {
            font-family: DejaVu Sans, sans-serif;
            font-size:9px;
            line-height:13px;
            text-align: justify;
        }
        p{
            margin:1px 0;
        }
        
        @if ($protected)
        body{
            background-image: url({{asset('naqsh.png')}});
            background-size:cover;
        }

       @endif
      
    .page-wrap{
        padding:185px 100px 100px 100px;
        position: relative;
    }
     .qr-code {
        position: absolute;
        bottom: 0px;
        
    }
</style>
</head>

<body>
    <div class="page-wrap">
        <div class="ru">
            АБА
            №: {{ $conclusion->id }}
            {{ date('d.m.Y', strtotime($conclusion->created_at)) }} г.
            <p class="blue center bold uppercase">
                АУДИТОРСКОЕ ЗАКЛЮЧЕНИЕ
                С ВЫРАЖЕНИЕМ ПОЛОЖИТЕЛЬНОГО МНЕНИЯ ПО ФИНАНСОВОЙ ОТЧЕТНОСТИ
            </p>
            <p class="bold center">{{ $conclusion->cust_info->cust_comp_name }} ИНН:
                {{ $conclusion->cust_info->cust_comp_inn }}
            </p>
            <p class="bold text-right">Учредителям и руководству {{ $conclusion->cust_info->cust_comp_name }}</p>
            <p class="bold text-left">
                Сведения об аудиторской организации:
            </p>
            <p class="bold text-right">Общество С Ограниченной Ответственностью {{ $conclusion->audit_comp_name_ru }}</p>
            <p>
                Государственная регистрация: Свидетельство Министерства Юстиции РУз. №
                {{ $conclusion->audit_comp_gov_reg_num }} от {{ date('d.m.Y',strtotime($conclusion->audit_comp_gov_reg_date)) }} года. ИНН -
                {{ $conclusion->audit_comp_inn }}, ОКЭД - {{ $conclusion->audit_comp_oked }}. www.e-audit.uz Лицензия МФ
                РУз. серия АФ №{{ $conclusion->audit_comp_lic }} от {{ date('d.m.Y', strtotime($conclusion->audit_comp_lic_date)) }} года на
                осуществление аудиторских проверок всех хозяйствующих субъектов. {{ $conclusion->audit_comp_bank_name }}
                Р/С: {{ implode(' ', str_split($conclusion->audit_comp_bank_acc, 4)) }} МФО:
                {{ $conclusion->audit_comp_bank_mfo }}. Директор аудиторской организации: <strong>{{ $conclusion->audit_comp_director_name }}</strong>, Квалификационный сертификат
                аудитора № {{ $conclusion->audit_comp_director_cert_num }} выдано МФ. РУз. от
                {{ date('d.m.Y', strtotime($conclusion->audit_comp_director_cert_date)) }} года.
            </p>
            <p>
                Мною, аудитор аудиторской организации <strong>{{ $conclusion->audit_comp_name }}</strong>
                {{ $conclusion->auditor_name }} Клификационный сертификат аудитора
                №{{ $conclusion->auditor_cert_number }} выдано МФ.РУз. от {{ date('d.m.Y', strtotime($conclusion->auditor_cert_date)) }}
                года, согласно Национального стандарта <strong> (НСАД №80) "Отчет аудитора
                по результатам проверки специального вопроса"</strong> хозяйствующего субъекта
                {{ $conclusion->cust_info->cust_comp_name }} за период
                с {{getQuarter('quarter_start', $conclusion->cust_info->quarter_start).".".$conclusion->cust_info->year}} по {{getQuarter('quarter_finish', $conclusion->cust_info->quarter_finish).".".$conclusion->cust_info->year}} года, состоящей из –“Бухгалтерский баланс” - Форма № 1; -“Отчет о
                финансовых результатах” - Форма № 2;
                <p class="bold center"> Ответственность руководства хозяйствующего субъекта</p>
                Руководство хозяйствующего субъекта несет ответственность за составление и достоверность указанной
                финансовой отчетности в соответствии с законодательством о бухгалтерском учете и за систему внутреннего
                контроля.
            </p>
            <p class="bold center">Ответственность аудиторской организации</p>
            <p>Ответственность аудиторской организации заключается в выражении мнения по данной финансовой отчетности на
            основании проведенной аудиторской услуги.</p>
            <p>
                Мы провели аудиторская услуги прилагаемой финансовой отчетности {{ $conclusion->cust_info->cust_comp_name }}.
                Аудиторская
                услуги заключается в оценке достоверности и соответствия во всех существенных аспектах финансовой отчетности
                и иной финансовой информации законодательству о бухгалтерском учете.
            </p>
            <p>
                Мы проводили аудиторскую услуги в соответствии с национальными стандартами аудиторской деятельности. Данные
                стандарты требуют планирования и проведения аудиторская услуги таким образом, чтобы получить достаточную
                уверенность в том, что финансовая отчетность не содержит существенных искажений.
            </p>
            <p>
                Аудиторская услуги включала проведение аудиторских процедур, направленных на получение аудиторских
                доказательств. Выбор аудиторских процедур является предметом нашего суждения.
            </p>
            <p>
                Мы полагаем, что полученные в ходе аудиторской услуги аудиторские доказательства дают достаточные основания
                для выражения мнения о достоверности финансовой отчетности.
            </p>
            <p class="bold center">
                Положительное мнение
            </p>
            <p>
                По нашему мнению, финансовая отчетность хозяйствующего субъекта {{ $conclusion->cust_info->cust_comp_name }} по
                состоянию на
                {{getQuarter('quarter_finish', $conclusion->cust_info->quarter_finish).".".$conclusion->cust_info->year}} года, достоверно отражает во всех существенных аспектах финансовое положение, результаты его
                финансово-хозяйственной деятельности, и соответствует требованиям законодательства о бухгалтерском учете.
                Выявленные оценки экономические показателей соответствует по нормы законодательству Республики Узбекистан.
                Учитывая выше указанные оценки по финансовой деятельности хозяйствующего субъекта
                {{ $conclusion->cust_info->cust_comp_name }} считается экономически стабильной:
            </p>
            <p>
                В связи с этим был сделан положительный вывод по финансовой отчетности хозяйствующего субъекта {{
                    $conclusion->cust_info->cust_comp_name }} за период с {{getQuarter('quarter_start', $conclusion->cust_info->quarter_start).".".$conclusion->cust_info->year}} по {{getQuarter('quarter_finish', $conclusion->cust_info->quarter_finish).".".$conclusion->cust_info->year}} года.
                </p>
            </div>
            <div style="clear:both">
                <div style="float:left;text-align: center;width:200px;">
                    <strong>
                        Руководитель <br>
                        Сурхандарьинский Филиал <br>  
                        ООО АО «HIMOYA-AUDIT»:
                    </strong>
                </div>
                <div style="float:right;">
                    <strong>
                        <br><br>
                        {{$conclusion->audit_comp_director_name}}
                    </strong>
                </div>
            </div>
            <br>
            <div style="clear:both">
                <div style="float:left;text-align: center;width:200px;">
                    <strong>
                     Аудитор
                 </strong>
             </div>
             <div style="float:right;">
                <strong>

                    {{$conclusion->auditor_name}}
                </strong>
            </div>
        </div>
        <div style="text-align: center; clear:both; font-size:8px">
           (Квалификационный сертификат аудитора № {{$conclusion->auditor_cert_number}} выдано МФ. РУз. от {{date('d.m.Y', strtotime($conclusion->auditor_cert_date))}} года)
       </div>
       
        <div class="qr-code">
            <img src="data:application/octet-stream;base64, {{ $qrcode }}" alt="">
        </div>
    
    <div class="text-right">
       Дата составления заключения: <br>
       {{date('d.m.Y', strtotime($conclusion->created_at))}}  года
   </div>
</div>
</body>

</html>
