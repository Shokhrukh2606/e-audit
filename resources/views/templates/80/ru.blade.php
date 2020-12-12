<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="{{asset('template/style.css')}}">
<style>
  * { 
    font-family: DejaVu Sans, sans-serif;
	text-align: justify;
  }
  @if($protected)
  body{
    background-image: url("{{asset('shutterstock.png')}}");
     background-size: 100px 100px;
  }
  @endif
  .qr-code{
    position: absolute;
    bottom: 0;
    left: 0;
  }
</style>
</head>
<body>
<div>
	АБА
	№: {{$conclusion->id}}   
	{{$conclusion->created_at}} г.
</div>
<div>
	АУДИТОРСКОЕ ЗАКЛЮЧЕНИЕ
	С ВЫРАЖЕНИЕМ ПОЛОЖИТЕЛЬНОГО МНЕНИЯ ПО ФИНАНСОВОЙ ОТЧЕТНОСТИ
	{{$conclusion->cust_info->cust_comp_name }} (ИНН: {{$conclusion->cust_info->cust_comp_inn }}) НА 3 КВАРТАЛ 2020 ГОД
</div>
<div>
	Учредителям и руководству  {{$conclusion->cust_info->cust_comp_name }}	          
	Сведения об аудиторской организации:
	Общество С Ограниченной Ответственностью {{ $conclusion->audit_comp_name }}
	Государственная регистрация: Свидетельство Министерства Юстиции РУз. № {{ $conclusion->audit_comp_gov_reg_num }} от {{ $conclusion->audit_comp_gov_reg_date }} года. ИНН - {{ $conclusion->audit_comp_inn }}, ОКЭД - {{ $conclusion->audit_comp_oked }}. Лицензия МФ РУз. серия АФ №{{ $conclusion->audit_comp_lic }} от {{$conclusion->audit_comp_lic_date}} года на осуществление аудиторских проверок всех хозяйствующих субъектов. {{ $conclusion->audit_comp_bank_name }} Р/С: {{ implode(' ', str_split($conclusion->audit_comp_bank_acc, 4)) }}  МФО: {{ $conclusion->audit_comp_bank_mfo }}.  Директор аудиторской организации: {{ $conclusion->audit_comp_director_name }}, Квалификационный сертификат аудитора № {{$conclusion->audit_comp_director_cert_num }} выдано МФ. РУз. от {{$conclusion->audit_comp_director_cert_date }} года.       
	Мною, аудитор аудиторской организации {{$conclusion->audit_comp_name }}  {{$conclusion->audit_comp_director_name }} Клификационный сертификат аудитора № 05592 выдано МФ.РУз. от 07 февраля 2019 года, согласно Национального стандарта (НСАД №{{ $conclusion->cust_info->template->standart_num }}) {{ json_decode($conclusion->cust_info->template->name, true)[config('global.lang')] }} хозяйствующего субъекта {{ $conclusion->audit_comp_name }} за период с 01 января 2020 года по 3 квартал 2020 года, состоящей из –“Бухгалтерский баланс” - Форма № 1;  -“Отчет о финансовых результатах” - Форма № 2; 
	Руководство хозяйствующего субъекта несет ответственность за составление и достоверность указанной финансовой отчетности в соответствии с законодательством о бухгалтерском учете и за систему внутреннего контроля. Ответственность аудиторской организации заключается в выражении мнения по данной финансовой отчетности на основании проведенной аудиторской услуги.
	Мы провели аудиторская услуги прилагаемой финансовой отчетности {{$conclusion->cust_info->cust_comp_name }}. Аудиторская услуги заключается в оценке достоверности и соответствия во всех существенных аспектах финансовой отчетности и иной финансовой информации законодательству о бухгалтерском учете.
	Мы проводили аудиторскую услуги в соответствии с национальными стандартами аудиторской деятельности. Данные стандарты требуют планирования и проведения аудиторская услуги таким образом, чтобы получить достаточную уверенность в том, что финансовая отчетность не содержит существенных искажений.
	Аудиторская услуги  включала проведение аудиторских процедур, направленных на получение аудиторских доказательств. Выбор аудиторских процедур является предметом нашего суждения.
	Мы полагаем, что полученные в ходе аудиторской услуги аудиторские доказательства дают достаточные основания для выражения мнения о достоверности финансовой отчетности.
	Аудит финансовой отчетности  {{$conclusion->cust_info->cust_comp_name }} за период 3 квартал 2020 года выявлено ниже следующие:
	1.	Коэффициент платежеспособности составляет   {{$conclusion->fcoefficient}}%
	2.	Коэффициент обеспеченности собственными оборотными средствами составляет {{$conclusion->scoefficient}}%
	3.	Коэффициент рентабельности расходов   0,91 % 
	По нашему мнению, финансовая отчетность хозяйствующего субъекта  OOO «PALLADIUM TECHNOLOGY»	 по состоянию на 3 квартал 2020 год, достоверно отражает во всех существенных аспектах финансовое положение, результаты его финансово-хозяйственной деятельности, и соответствует требованиям законодательства о бухгалтерском учете. Выявленные оценки экономические показателей соответствует по нормы  законодательству  Республики Узбекистан. Учитывая  выше  указанные  оценки по финансовой деятельности   хозяйствующего субъекта OOO «PALLADIUM TECHNOLOGY»  считается экономически стабильной:
	В связи с этим был сделан положительный вывод по финансовой  отчетности хозяйствующего субъекта   OOO «PALLADIUM TECHNOLOGY» за период 3 квартал 2020 года.
</div>
<div>
Руководитель 
{{ $conclusion->audit_comp_name }}:	                                                             {{ $conclusion->audit_comp_director_name }}
</div>
<div>
Аудитор	                                                                                        {{ $conclusion->auditor ? $conclusion->auditor->full_name : $conclusion->agent->full_name }}
(Квалификационный сертификат аудитора № {{ $conclusion->auditor ? $conclusion->auditor->cert_number : $conclusion->agent->cert_number }} выдано МФ. РУз. от {{ $conclusion->auditor ? $conclusion->auditor->cert_date : $conclusion->agent->cert_date }} года)
Дата составления заключения: 
{{$conclusion->created_at}}

</div>
<div class="qr-code">
    <img src="data:application/octet-stream;base64, {{$qrcode }}" alt="">
</div>
</body>
</html>
