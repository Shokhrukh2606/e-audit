<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
            text-align: justify;
        }

        @if ($protected)body {
             background-image: url("{{ asset('shutterstock.png') }}"); 
            background-size: 100px 100px;
        }

        @endif.qr-code {
            position: absolute;
            bottom: 0;
            left: 0;
        }

    </style>
</head>

<body>
    <div class="ru">
        АБА
        №: {{ $conclusion->id }}
        {{ $conclusion->created_at }} г.
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
        <p class="bold text-right">Общество С Ограниченной Ответственностью {{ $conclusion->audit_comp_name }}</p>
        <p>
            Государственная регистрация: Свидетельство Министерства Юстиции РУз. №
            {{ $conclusion->audit_comp_gov_reg_num }} от {{ $conclusion->audit_comp_gov_reg_date }} года. ИНН -
            {{ $conclusion->audit_comp_inn }}, ОКЭД - {{ $conclusion->audit_comp_oked }}. www.e-audit.com Лицензия МФ
            РУз. серия АФ №{{ $conclusion->audit_comp_lic }} от {{ $conclusion->audit_comp_lic_date }} года на
            осуществление аудиторских проверок всех хозяйствующих субъектов. {{ $conclusion->audit_comp_bank_name }}
            Р/С: {{ implode(' ', str_split($conclusion->audit_comp_bank_acc, 4)) }} МФО:
            {{ $conclusion->audit_comp_bank_mfo }}. Директор аудиторской организации: <span
                class="bold">{{ $conclusion->audit_comp_director_name }}</span>, Квалификационный сертификат
            аудитора № {{ $conclusion->audit_comp_director_cert_num }} выдано МФ. РУз. от
            {{ $conclusion->audit_comp_director_cert_date }} года.
        </p>
        <p>
            Мною, аудитор аудиторской организации {{ $conclusion->audit_comp_name }}
            {{ $conclusion->audit_comp_director_name }} Клификационный сертификат аудитора
            №{{ $conclusion->audit_comp_gov_reg_num }} выдано МФ.РУз. от {{ $conclusion->audit_comp_gov_reg_date }}
            года, согласно Национального стандарта (НСАД №80) "Отчет аудитора
            по результатам проверки специального вопроса" хозяйствующего субъекта
            {{ $conclusion->cust_info->cust_comp_name }} за период
            с 01 января 2019 года по 31 декабря 2019 года, состоящей из –“Бухгалтерский баланс” - Форма № 1; -“Отчет о
            финансовых результатах” - Форма № 2;
        <p class="bold center"> Ответственность руководства хозяйствующего субъекта</p>
        Руководство хозяйствующего субъекта несет ответственность за составление и достоверность указанной
        финансовой отчетности в соответствии с законодательством о бухгалтерском учете и за систему внутреннего
        контроля.
        </p>
        <p class="bold center">Ответственность аудиторской организации</p>
        Ответственность аудиторской организации заключается в выражении мнения по данной финансовой отчетности на
        основании проведенной аудиторской услуги.
        Мы провели аудиторская услуги прилагаемой финансовой отчетности {{ $conclusion->cust_info->cust_comp_name }}.
        Аудиторская
        услуги заключается в оценке достоверности и соответствия во всех существенных аспектах финансовой отчетности
        и иной финансовой информации законодательству о бухгалтерском учете.
        Мы проводили аудиторскую услуги в соответствии с национальными стандартами аудиторской деятельности. Данные
        стандарты требуют планирования и проведения аудиторская услуги таким образом, чтобы получить достаточную
        уверенность в том, что финансовая отчетность не содержит существенных искажений.
        Аудиторская услуги включала проведение аудиторских процедур, направленных на получение аудиторских
        доказательств. Выбор аудиторских процедур является предметом нашего суждения.
        Мы полагаем, что полученные в ходе аудиторской услуги аудиторские доказательства дают достаточные основания
        для выражения мнения о достоверности финансовой отчетности.
        Положительное мнение
        По нашему мнению, финансовая отчетность хозяйствующего субъекта {{ $conclusion->cust_info->cust_comp_name }} по
        состоянию на
        31-декабрь 2019 года, достоверно отражает во всех существенных аспектах финансовое положение, результаты его
        финансово-хозяйственной деятельности, и соответствует требованиям законодательства о бухгалтерском учете.
        Выявленные оценки экономические показателей соответствует по нормы законодательству Республики Узбекистан.
        Учитывая выше указанные оценки по финансовой деятельности хозяйствующего субъекта
        {{ $conclusion->cust_info->cust_comp_name }} считается экономически стабильной:
        В связи с этим был сделан положительный вывод по финансовой отчетности хозяйствующего субъекта {
        $conclusion->cust_info->cust_comp_name }} за период 2019 года.

        <p class="bold">{{ $conclusion->audit_comp_name }}
            директори: &nbsp;&nbsp;&nbsp;&nbsp;
            {{ $conclusion->audit_comp_director_name }}
        </p>
        <p class="bold">
            Аудитор:
            <span
                class="space-needed">{{ $conclusion->auditor ? $conclusion->auditor->full_name : $conclusion->agent->full_name }}</span>
        </p>
        <p class="text-right">Такдим этилган сана : {{ date('d-m-Y', strtotime($conclusion->created_at)) }} й</p>
        <p class="text-left">
        <div class="qr-code">
            <img src="data:application/octet-stream;base64, {{ $qrcode }}" alt="">
        </div>
        </p>    
        Дата составления заключения:
        {{ date('d-m-Y', strtotime($conclusion->created_at)) }} года
        </p>
    </div>
</body>

</html>
