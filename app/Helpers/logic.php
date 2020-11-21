<?php
use App\Models\Template;
use App\Models\User;

if(!function_exists('file_validation_rules')){
	function file_validation_rules($template_id){
		$template=Template::where('id', $template_id)->first();
		
		$file_fields=array_filter(json_decode($template->fields, true),function($v){
			return $v['type']=='file';
		});

		$rules=array_map(function($v){
			return ["custom.".$v['name']=>"required | mimetypes:".$v['mime_types']];
		}, $file_fields);

		return array_merge(...$rules);
	}
}

if(!function_exists('file_fields_for_validation_edit')){
	function file_fields_for_validation_edit($template_id){
		$template=Template::where('id', $template_id)->first();
		
		$file_fields=array_filter(json_decode($template->fields, true),function($v){
			return $v['type']=='file';
		});

		$rules=array_map(function($v){
			return ["custom.".$v['name']=>"mimetypes:".$v['mime_types']];
		}, $file_fields);
		return array_merge(...$rules);
	}
}

function custom_fields($id){
	return json_decode(Template::where('id', $id)->first()->fields);
}
function getUserName($u)
{
	return User::specificFullname($u);
}
/*
*@name sms
*@params phone number, message
*@return bool or array
*/
if(!function_exists('sms')){
	function sms($phone, $message)
	{
		$ch = curl_init();
		$postData = array(
			"mobile_phone" => $phone,
			"from" => "4546",
			"message" => $message,
			"dlr-level" => "2"
		);
		curl_setopt_array(
			$ch,
			array(
				CURLOPT_URL => 'http://notify.eskiz.uz/api/message/sms/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => json_encode($postData),
				CURLOPT_FOLLOWLOCATION => true,

			)
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ub3RpZnkuZXNraXoudXpcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MDU0NzE4OTIsImV4cCI6MTYwODA2Mzg5MiwibmJmIjoxNjA1NDcxODkyLCJqdGkiOiJFeDV5QmRHMzAyVHJmdm1WIiwic3ViIjoyOTIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.xHIXsJfive_SbDG_wdI-N-RDUp2KjjGtOcJV3zsqNvM')
		);
    	// execute
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
}
function getUserLayout($u){
	switch($u){
		case 1:
		return 'admin';
		break;
		case 2:
		return 'auditor';
		break;
		case 3:
		return 'agent';
		break;
		case 4:
		return 'customer';
		break;
	}
}


function lang($word){
	$words=[
		'smth'=>[
			'oz'=>'ozsmth',
			'uz'=>'uzsmth',
			'ru'=>'rusmth'
		],
		'anything'=>[
			'oz'=>'anything',
			'uz'=>'anything',
			'ru'=>'anything'
		],
		'welcome'=>[
			'oz'=>'Xush kelibsiz',
			'uz'=>'Хуш келибсиз',
			'ru'=>'Добро пожаловать'
		],
		'registered'=>[
			'oz'=>'Siz ro\'yxatdan o\'tganmisiz?',
			'uz'=>'Сиз рўйхатдан ўтганмисиз?',
			'ru'=>'Уже зарегистрированы?'
		],
		'login'=>[
			'oz'=>'Kirish',
			'uz'=>'Кириш',
			'ru'=>'Войти'
		],
		'user'=>[
			'oz'=>'Mijoz',
			'uz'=>'Мижоз',
			'ru'=>'Клиент'
		],
		'customer'=>[
			'oz'=>'Mijoz',
			'uz'=>'Мижоз',
			'ru'=>'Клиент'
		],
		'agent'=>[
			'oz'=>'Agent',
			'uz'=>'Агент',
			'ru'=>'Агент'
		],
		'asUser'=>[
			'oz'=>'Mijoz sifatida ro\'yhatdan o\'tish',
			'uz'=>'Мижоз сифатида рўйҳатдан ўтиш',
			'ru'=>'Зарегистрируйтесь как клиент'
		],
		'name'=>[
			'oz'=>'Ism',
			'uz'=>'Исм',
			'ru'=>'Имя'
		],
		'surname'=>[
			'oz'=>'Familiya',
			'uz'=>'Фамилия',
			'ru'=>'Фамилия'
		],
		'patronymic'=>[
			'oz'=>'Otangizni ismi',
			'uz'=>'Отангизни исми',
			'ru'=>'Отчество'
		],
		'userPatronymic'=>[
			'oz'=>'Otansining ismi',
			'uz'=>'Отасининг исми',
			'ru'=>'Отчество'
		],
		'phoneNumber'=>[
			'oz'=>'Telefon raqamingiz',
			'uz'=>'Телефон рақамингиз',
			'ru'=>'Телефонный номер'
		],
		'verificationCode'=>[
			'oz'=>'Tasdiqlash kodi',
			'uz'=>'Тасдиқлаш коди',
			'ru'=>'Ваш проверочный код'
		],
		'sendConfirmation'=>[
			'oz'=>'Tasdiqlash uchun yuborish',
			'uz'=>'Тасдиқлаш учун юбориш',
			'ru'=>'Отправить подтверждение'
		],
		'anotherPhoneNumber'=>[
			'oz'=>'Telefon raqami',
			'uz'=>'Телефон рақами',
			'ru'=>'Номер телефона'
		],
		'phone'=>[
			'oz'=>'Telefon raqami',
			'uz'=>'Телефон рақами',
			'ru'=>'Номер телефона'
		],
		'password'=>[
			'oz'=>'Parol',
			'uz'=>'Парол',
			'ru'=>'Парол'
		],
		'register'=>[
			'oz'=>"Ro'yxatdan o'tish",
			'uz'=>'Рўйхатдан ўтиш',
			'ru'=>'Регистрация'
		],
		'restorePassword'=>[
			'oz'=>"Parolni tiklash",
			'uz'=>'Паролни тиклаш',
			'ru'=>'Восстановить пароль'
		],
		'asAgent'=>[
			'oz'=>"Mijoz sifatida ro'yhatdan o'tish",
			'uz'=>'Мижоз сифатида рўйҳатдан ўтиш',
			'ru'=>'Зарегистрируйтесь как клиент'
		],
		'passportCopy'=>[
			'oz'=>"Pasport nusxasi",
			'uz'=>'Паспорт нусхаси',
			'ru'=>'Паспорт копия'
		],
		'pay'=>[
			'oz'=>"To'lash",
			'uz'=>'Тўлаш',
			'ru'=>'ОПЛАТИТЬ'
		],
		'upload'=>[
			'oz'=>"Yuklash",
			'uz'=>'Юклаш',
			'ru'=>'Загрузить'
		],
		'inn'=>[
			'oz'=>"INN",
			'uz'=>'ИНН',
			'ru'=>'ИНН'
		],
		'cust_comp_name'=>[
			'oz'=>"Korxona Nome",
			'uz'=>'Korxona Nome',
			'ru'=>'Название компании клиента'
		],
		'cust_comp_inn'=>[
			'oz'=>"Korxona INNsi",
			'uz'=>'Korxona INNsi',
			'ru'=>'Предприятие ИНН'
		],
		'auditCompInn'=>[
			'oz'=>"Auditorlik korxonasining INNsi",
			'uz'=>'Аудиторлик корхонасининг ИННси',
			'ru'=>'ИНН аудиторской компании'
		],
		'custCompInn'=>[
			'oz'=>"Mijoz korxonasining INNsi",
			'uz'=>'Мижоз корхонасининг ИННси',
			'ru'=>'ИНН компании клиента'
		],
		'auditCompOked'=>[
			'oz'=>"Auditorlik korxonasining OKEDi",
			'uz'=>'Аудиторлик корхонасининг ОКEДи',
			'ru'=>'ОКЭД аудиторской компании'
		],
		'custCompOked'=>[
			'oz'=>"Mijoz korxonasining OKEDi",
			'uz'=>'Мижоз корхонасининг ОКEДи',
			'ru'=>'ОКЭД компании клиента'
		],
		'auditCompLicense'=>[
			'oz'=>"Audit korxonasining litsenziya raqami",
			'uz'=>'Аудит корхонасининг лицензия рақами',
			'ru'=>'Номер Лицензии Аудиторской Компании'
		],
		'auditCompLicenseDate'=>[
			'oz'=>"Audit korxonasining litsenziyasi ro'yxatdan o'tgan sanasi",
			'uz'=>'Аудит корхонасининг лицензияси рўйхатдан ўтган санаси',
			'ru'=>'Дата регистрации лицензии аудиторской компании'
		],
		'auditCompName'=>[
			'oz'=>"Audit korxonasining nomi",
			'uz'=>'Аудит корхонасининг номи',
			'ru'=>'Наименование аудиторской компании'
		],
		'auditCompBank'=>[
			'oz'=>"Audit korxonasining bank nomi",
			'uz'=>'Аудит корхонасининг банк номи',
			'ru'=>'Наименование банка аудиторской компании'
		],
		'custCompBank'=>[
			'oz'=>"Mijoz korxonasining bank nomi",
			'uz'=>'Мижоз корхонасининг банк номи',
			'ru'=>'Название банка компании клиента'
		],
		'auditCompBankAccount'=>[
			'oz'=>"Audit korxonasining bank hisob raqami",
			'uz'=>'Аудит корхонасининг банк ҳисоб рақами',
			'ru'=>'Банковский счет аудиторской компании'
		],
		'auditCompBankMfo'=>[
			'oz'=>"Audit korxonasining bank MFOsi",
			'uz'=>'Аудит корхонасининг банк МФОси',
			'ru'=>'МФО Банка аудиторской компании'
		],
		'custCompBankMfo'=>[
			'oz'=>"Mijoz korxonasining bank MFOsi",
			'uz'=>'Мижоз корхонасининг банк МФОси',
			'ru'=>'Банковский МФО компании клиента'
		],
		'auditCompDirector'=>[
			'oz'=>"Audit korxonasining direkotori F.I.Osi",
			'uz'=>'Аудит корхонасининг дирекотори Ф.И.Оси',
			'ru'=>'Ф.И.О директора аудиторской компании'
		],
		'auditCompDirectorLicenseNum'=>[
			'oz'=>"Audit korxonasi direkotorining sertifikat raqami",
			'uz'=>'Аудит корхонаси дирекоторининг сертификат рақами',
			'ru'=>'Номер сертификата директора аудиторской компании'
		],
		'auditCompDirectorLicenseDate'=>[
			'oz'=>"Audit korxonasi direkotorining sertifikat berilgan sanasi",
			'uz'=>'Аудит корхонаси дирекоторининг сертификат берилган санаси',
			'ru'=>'Дата сертификата директора аудиторской компании'
		],
		'custCompDirector'=>[
			'oz'=>"Mijoz korxonasining direkotori F.I.Osi",
			'uz'=>'Мижоз корхонасининг дирекотори Ф.И.Оси',
			'ru'=>'Ф.И.О Директора Компании Клиента'
		],
		'custCompActivity'=>[
			'oz'=>"Mijoz kompaniyasining faoliyati",
			'uz'=>'Мижоз компаниясининг фаолияти',
			'ru'=>'Деятельность Компании-Заказчика'
		],
		'requiredDocs'=>[
			'oz'=>"Kerakli hujjatlar",
			'uz'=>'Керакли ҳужжатлар',
			'ru'=>'Необходимые документы'
		],
		'auditCompGovNumber'=>[
			'oz'=>"Auditorlik korxonasining davlat ro'yxatidan o'tgan raqami",
			'uz'=>'Аудиторлик корхонасининг давлат рўйхатидан ўтган рақами',
			'ru'=>'Государственный Регистрационный Номер Аудиторской Компании'
		],
		'sertificateNumber'=>[
			'oz'=>"Sertifikat raqami",
			'uz'=>'Сертификат рақами',
			'ru'=>'Номер сертификата'
		],
		'city'=>[
			'oz'=>"Shaxar",
			'uz'=>'Шахар',
			'ru'=>'Регион'
		],
		'district'=>[
			'oz'=>"Tuman",
			'uz'=>'Туман',
			'ru'=>'Район'
		],
		'address'=>[
			'oz'=>"Manzil",
			'uz'=>'Манзил',
			'ru'=>'Адрес'
		],
		'address_to_deliver'=>[
			'oz'=>"Manzil",
			'uz'=>'Манзил',
			'ru'=>'Адрес'
		],
		'cust_comp_address'=>[
			'oz'=>"Manzil",
			'uz'=>'Манзил',
			'ru'=>'Адрес'
		],
		'deliverAddress'=>[
			'oz'=>"Yetkazib berish manzili",
			'uz'=>'Етказиб бериш манзили',
			'ru'=>'Адрес для доставки'
		],
		'custCompAddress'=>[
			'oz'=>"Mijoz korxonasi manzili",
			'uz'=>'Мижоз корхонаси манзили',
			'ru'=>'Адрес Компании Клиента'
		],
		'agree'=>[
			'oz'=>"Roziman",
			'uz'=>'Розиман',
			'ru'=>'Согласен'
		],
		'htmlLang'=>[
			'oz'=>"uz",
			'uz'=>'uz',
			'ru'=>'ru'
		],
		'lang'=>[
			'oz'=>"Til",
			'uz'=>'Тил',
			'ru'=>'Язык'
		],
		'users'=>[
			'oz'=>"Foydalanuvchilar",
			'uz'=>'Фойдаланувчилар',
			'ru'=>'Пользователи'
		],
		'orders'=>[
			'oz'=>"Buyurtmalar",
			'uz'=>'Буюртмалар',
			'ru'=>'Заказы'
		],
		'order'=>[
			'oz'=>"Buyurtma",
			'uz'=>'Буюртма',
			'ru'=>'Заказ'
		],
		'conclusions'=>[
			'oz'=>"Xulosalar",
			'uz'=>'Хулосалар',
			'ru'=>'Заключении'
		],
		'conclusion'=>[
			'oz'=>"Xulosa",
			'uz'=>'Хулоса',
			'ru'=>'Заключение'
		],
		'adminPanel'=>[
			'oz'=>"Administrator paneli",
			'uz'=>'Администратор панели',
			'ru'=>'Панель администратора'
		],
		'logout'=>[
			'oz'=>"Chiqish",
			'uz'=>'Чиқиш',
			'ru'=>'Выйти'
		],
		'mchj'=>[
			'oz'=>"MCHJ",
			'uz'=>'МЧЖ',
			'ru'=>'OOO'
		],
		'sidebarBg'=>[
			'oz'=>"Yon panel foni",
			'uz'=>'Ён панел фони',
			'ru'=>'Фон боковой панели'
		],
		'light'=>[
			'oz'=>"Oq",
			'uz'=>'Оқ',
			'ru'=>'Белый'
		],
		'dark'=>[
			'oz'=>"Qora",
			'uz'=>'Қора',
			'ru'=>'Темно'
		],
		'fio'=>[
			'oz'=>"F.I.O",
			'uz'=>'Ф.И.О',
			'ru'=>'Ф.И.О'
		],
		'role'=>[
			'oz'=>"Rol",
			'uz'=>'Рол',
			'ru'=>'Роль'
		],
		'admin'=>[
			'oz'=>"Admin",
			'uz'=>'Aдмин',
			'ru'=>'Aдмин'
		],
		'auditor'=>[
			'oz'=>"Auditor",
			'uz'=>'Аудитор',
			'ru'=>'Аудитор'
		],
		'search'=>[
			'oz'=>"Qidiruv",
			'uz'=>'Қидирув',
			'ru'=>'Поиск'
		],
		'create'=>[
			'oz'=>"Yaratish",
			'uz'=>'Яратиш',
			'ru'=>'Создать'
		],
		'id'=>[
			'oz'=>"ID",
			'uz'=>'Ид',
			'ru'=>'Ид'
		],
		'fund'=>[
			'oz'=>"PUL MIQDORI",
			'uz'=>'ПУЛ МИҚДОРИ',
			'ru'=>'СУММА ДЕНЕГ'
		],
		'show'=>[
			'oz'=>"Ko'rish",
			'uz'=>'Кўриш',
			'ru'=>'ПОКАЗАТЬ'
		],
		'showConclusion'=>[
			'oz'=>"Xulosani ko'rish",
			'uz'=>'Хулосани кўриш',
			'ru'=>'ПОСМОТРЕТЬ ЗАКЛЮЧЕНИЕ'
		],
		'standartNumber'=>[
			'oz'=>"SHABLON STANDART RAQAMI",
			'uz'=>'ШАБЛОН СТАНДАРТ РАҚАМИ',
			'ru'=>'СТАНДАРТНЫЙ НОМЕР ШАБЛОНА'
		],
		'message'=>[
			'oz'=>"xabar",
			'uz'=>'xaбaр',
			'ru'=>'сообщение'
		],
		'status'=>[
			'oz'=>"HOLATI",
			'uz'=>'ҲОЛАТИ',
			'ru'=>'СТАТУС'
		],
		'cust_comp_activity'=>[
			'oz'=>"Korxona holati",
			'uz'=>'Корхона ҳолати',
			'ru'=>'Предприятие статус'
		],
		'createdDate'=>[
			'oz'=>"Yaratilgan sanasi",
			'uz'=>'Яратилган санаси',
			'ru'=>'ДАТА СОЗДАНИЯ'
		],
		'created_at'=>[
			'oz'=>"Yaratilgan sanasi",
			'uz'=>'Яратилган санаси',
			'ru'=>'ДАТА СОЗДАНИЯ'
		],
		'bill'=>[
			'oz'=>"Hisob",
			'uz'=>'Ҳисоб',
			'ru'=>'Счет'
		],
		'myConclusions'=>[
			'oz'=>"Mening Xulosalarim",
			'uz'=>'Мени хулосаларим',
			'ru'=>'Мои заключены'
		],
		'auditorPanel'=>[
			'oz'=>"Auditor paneli",
			'uz'=>'Аудитор панели',
			'ru'=>'ПАНЕЛЬ аудиторa'
		],
		'agentPanel'=>[
			'oz'=>"Agent paneli",
			'uz'=>'Агент панели',
			'ru'=>'Агент панель'
		],
		'customerPanel'=>[
			'oz'=>"Mijoz paneli",
			'uz'=>'Мижоз панели',
			'ru'=>'Панель клиента'
		],
		'useCases'=>[
			'oz'=>"Foydalanish turi",
			'uz'=>'Фойдаланиш тури',
			'ru'=>'ВАРИАНТ ИСПОЛЬЗОВАНИЯ'
		],
		'date'=>[
			'oz'=>"Sana",
			'uz'=>'Сана',
			'ru'=>'ДАТА'
		],
		'activity'=>[
			'oz'=>"Operatsiyalar",
			'uz'=>'Операциялар',
			'ru'=>'ДЕЙСТВИЯ'
		],
		'send'=>[
			'oz'=>"Jo'natish",
			'uz'=>'Жўнатиш',
			'ru'=>'Отправить'
		],
		'sent'=>[
			'oz'=>"Jo'natilgan",
			'uz'=>'Жўнатилган',
			'ru'=>'посланный'
		],
		'myOrders'=>[
			'oz'=>"Mening buyurtmalarim",
			'uz'=>'Менинг буюртмаларим',
			'ru'=>'Мои заказы'
		],
		'template'=>[
			'oz'=>"Shablon",
			'uz'=>'ШАБЛОН',
			'ru'=>'ШАБЛОН'
		],
		'templateNum'=>[
			'oz'=>"Shablon raqami",
			'uz'=>'Шаблон рақами',
			'ru'=>'Номер шаблона'
		],
		'forWhat'=>[
			'oz'=>"Nima uchun?",
			'uz'=>'Нима учун?',
			'ru'=>'Для чего?'
		],
		'for'=>[
			'oz'=>"Nima uchun",
			'uz'=>'Нима учун',
			'ru'=>'Для'
		],
		'details'=>[
			'oz'=>"Tafsilotlar",
			'uz'=>'Тафсилотлар',
			'ru'=>'Подробности'
		],
		'orderDetails'=>[
			'oz'=>"Buyurtma haqida ma'lumot",
			'uz'=>'Буюртма ҳақида маълумот',
			'ru'=>'Информация о заказе'
		],
		'clientInfo'=>[
			'oz'=>"Mijoz haqida ma'lumot",
			'uz'=>'Мижоз ҳақида маълумот',
			'ru'=>'Информация о клиенте'
		],
		'passportSeries'=>[
			'oz'=>"Pasport seriya",
			'uz'=>'Паспорт серия',
			'ru'=>'Паспортная серия'
		],
		'cust_comp_gov_reg_date'=>[
			'oz'=>"Ro'yxatdan o'tgan sanasi",
			'uz'=>'Рўйхатдан ўтган санаси',
			'ru'=>'Дата регистрации'
		],
		'cust_comp_bank_name'=>[
			'oz'=>"Bank",
			'uz'=>'Банк',
			'ru'=>'Банк'
		],
		'cust_comp_bank_acc'=>[
			'oz'=>"Mijoz korxonasining bank hisobvarag'i",
			'uz'=>'Мижоз корхонасининг банк ҳисобварағи',
			'ru'=>'Банковский счет компании клиента'
		],
		'cust_comp_bank_mfo'=>[
			'oz'=>"Bank MFO",
			'uz'=>'Банк МФО',
			'ru'=>'Банк МФО'
		],
		'cust_comp_oked'=>[
			'oz'=>"OKED",
			'uz'=>'ОКЕД',
			'ru'=>'ОКЕД'
		],
		'cust_comp_director_name'=>[
			'oz'=>"Korxona direktori",
			'uz'=>'Корхона директори',
			'ru'=>'Директор предприятие'
		],
		'cust_comp_activity'=>[
			'oz'=>"Korxona direktori",
			'uz'=>'Корхона директори',
			'ru'=>'Директор предприятие'
		],
		'write_conc_for_this'=>[
			'oz'=>"Ushbu buyurtma asosida xulosa yozish",
			'uz'=>'Ушбу буюртма асосида хулоса ёзинг',
			'ru'=>'Напишите заключение на основании этого приказа'
		],
		'cust_comp_gov_reg_num'=>[
			'oz'=>"Mijoz korxonasining davlat ro'yxatidan o'tkgan raqami",
			'uz'=>'Мижоз корхонасининг давлат рўйхатидан ўткган рақами',
			'ru'=>'Государственный регистрационный номер компании заказчика'
		],
		'Форма 1'=>[
			'oz'=>"Forma 1",
			'uz'=>'Форма 1',
			'ru'=>'Форма 1'
		],
		'Форма 2'=>[
			'oz'=>"Forma 2",
			'uz'=>'Форма 2',
			'ru'=>'Форма 2'
		],
		'Forma 1'=>[
			'oz'=>"Forma 1",
			'uz'=>'Форма 1',
			'ru'=>'Форма 1'
		],
		'Forma 2'=>[
			'oz'=>"Forma 2",
			'uz'=>'Форма 2',
			'ru'=>'Форма 2'
		],
		'newOrder'=>[
			'oz'=>"Yangi buyurtma",
			'uz'=>'Янги буюртма',
			'ru'=>'Новый заказ'
		],
		'newPassword'=>[
			'oz'=>"Yangi parol",
			'uz'=>'Янги парол',
			'ru'=>'Новый пароль'
		],
		'typeNewPassword'=>[
			'oz'=>"Yangi parolni kiriting",
			'uz'=>'Янги паролни киритинг',
			'ru'=>'Введите новый пароль'
		],
		'basicInfo'=>[
			'oz'=>"Asosiy malumotlar",
			'uz'=>'Асосий малумотлар',
			'ru'=>'Базовая информация'
		],
		'structuredPhone'=>[
			'oz'=>"998971112233 shaklidagi telefon raqami, + belgisiz",
			'uz'=>'998971112233 шаклидаги телефон рақами, + белгисиз',
			'ru'=>'Номер телефона, в виде 998971112233, без знака +'
		],
		'sentOrder'=>[
			'oz'=>"Jo'natilgan buyurtma",
			'uz'=>'Жўнатилган буюртма',
			'ru'=>'Отправленные заказы'
		],
		'draftOrder'=>[
			'oz'=>"Qoralamalar",
			'uz'=>'Қораламалар',
			'ru'=>'Черновики'
		],
		'recievedOrder'=>[
			'oz'=>"Qabul qlingan buyurtmalar",
			'uz'=>'Қабул қлинган буюртмалар',
			'ru'=>'Полученные заключения'
		],
		'assign'=>[
			'oz'=>"Biriktirmoq",
			'uz'=>'Бириктирмоқ',
			'ru'=>'Назначать'
		],
		'fillData'=>[
			'oz'=>"Iltimos, foydalanuvchi ma'lumotlarini to'ldiring",
			'uz'=>'Илтимос, фойдаланувчи маълумотларини тўлдиринг',
			'ru'=>'Пожалуйста, заполните данные пользователя'
		],
		'certificateDate'=>[
			'oz'=>"Sertifikat berilgan sanasi",
			'uz'=>'Сертификат берилган санаси',
			'ru'=>'Дата сертификата'
		],
		'addressLine'=>[
			'oz'=>"Ko'cha / uy (kvartira)",
			'uz'=>'Кўча / уй (квартира)',
			'ru'=>'Улица / дом (квартира)'
		],
		'save'=>[
			'oz'=>"Saqlash",
			'uz'=>'Сақлаш',
			'ru'=>'Сохранить'
		],
		'save'=>[
			'oz'=>"Saqlash",
			'uz'=>'Сақлаш',
			'ru'=>'Сохранить'
		],
		'draft'=>[
			'oz'=>"Saqlash",
			'uz'=>'Сақлаш',
			'ru'=>'Сохранить'
		],
		'selectTemplate'=>[
			'oz'=>"Iltimos, Shablonni tanlang",
			'uz'=>'Илтимос, Шаблонни танланг',
			'ru'=>'Пожалуйста, выберите шаблон'
		],
		'templateUseCase'=>[
			'oz'=>"Iltimos, foydalanish turini tanlang:",
			'uz'=>'Илтимос, фойдаланиш турини танланг:',
			'ru'=>'Пожалуйста, выберите вариант использования:'
		],
		'Tender'=>[
			'oz'=>"Tender",
			'uz'=>'Тендер',
			'ru'=>'Тендер'
		],
		'Тендер'=>[
			'oz'=>"Tender",
			'uz'=>'Тендер',
			'ru'=>'Тендер'
		],
		'Kredit'=>[
			'oz'=>"Kredit",
			'uz'=>'Кредит',
			'ru'=>'Кредит'
		],
		"moliyaviy hisobot bo'yicha fikr"=>[
			'oz'=>"Moliyaviy hisobot bo'yicha fikr",
			'uz'=>'Молиявий ҳисобот бўйича фикр',
			'ru'=>'Заключение по финансовой отчетности'
		],
		'continue'=>[
			'oz'=>"Davom etish",
			'uz'=>'Давом этиш',
			'ru'=>'Продолжать'
		],
		'uz'=>[
			'oz'=>"O'zbek",
			'uz'=>'Ўзбек',
			'ru'=>'Узбекский'
		],
		'ru'=>[
			'oz'=>"Ruscha",
			'uz'=>'Русча',
			'ru'=>'Русский'
		],
		'companyName'=>[
			'oz'=>"Korxona Nomi",
			'uz'=>'Корхона Номи',
			'ru'=>'Наименование Компания'
		],
		'govRegDate'=>[
			'oz'=>"Auditorlik korxonasining davlat ro'yxatidan o'tkazilgan sanasi",
			'uz'=>'Аудиторлик корхонасининг давлат рўйхатидан ўтказилган санаси',
			'ru'=>'Дата государственной регистрации аудиторской компании'
		],
		'userCompGovRegDate'=>[
			'oz'=>"Mijoz korxonasining davlat ro'yxatidan o'tkazilgan sanasi",
			'uz'=>'Мижоз корхонасининг давлат рўйхатидан ўтказилган санаси',
			'ru'=>'Дата государственной регистрации компании заказчика'
		],
		'basicConclusions'=>[
			'oz'=>"Asosiy xulosa",
			'uz'=>'Асосий хулоса',
			'ru'=>'Базовая заключения'
		],
		'next'=>[
			'oz'=>"Keyingi",
			'uz'=>'Кейинги',
			'ru'=>'Следующий'
		],
		'previous'=>[
			'oz'=>"Orqaga",
			'uz'=>'Орқага',
			'ru'=>'Предыдущий'
		],
		'saveDraft'=>[
			'oz'=>"Qoralama sifatida saqlash",
			'uz'=>'Қоралама сифатида сақлаш',
			'ru'=>'Сохранить как черновик'
		],
		'saveAndSubmit'=>[
			'oz'=>"Saqlang va yuboring",
			'uz'=>'Сақланг ва юборинг',
			'ru'=>'Сохранить и отправить'
		],
		'submit'=>[
			'oz'=>"Jo'natish",
			'uz'=>'Жўнатиш',
			'ru'=>'Отправить'
		],
		'custInfo'=>[
			'oz'=>"Mijoz malumotlari",
			'uz'=>'Мижоз малумотлари',
			'ru'=>'Информация о клиенте'
		],
		'custCompInfo'=>[
			'oz'=>"Mijoz korxonasi haqida malumot",
			'uz'=>'Мижоз корхонаси ҳақида малумот',
			'ru'=>'Информация о компании клиента'
		],
		'profile'=>[
			'oz'=>"Profil",
			'uz'=>'Профил',
			'ru'=>'Профиль'
		],
		'cust_comp_name'=>[
			'oz'=>"Kompaniya nomi",
			'uz'=>'Компания номи',
			'ru'=>'Имя компания'
		],
		'cust_comp_registered_by'=>[
			'oz'=>"Kompaniya (kim, nima) tomonidan ro'yhatga olingan ",
			'uz'=>'Компания (ким, нима) томонидан рўйхатга олинган',
			'ru'=>'Зарегистрировано компанией (кто, что)'
		],
		'select'=>[
			'oz'=>"Tanlash ",
			'uz'=>'Танлаш',
			'ru'=>'Выбрать'
		],		
	];
	return $words[$word][config('global.lang')]??$word;
}
