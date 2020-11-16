<?php
use App\Models\Template;
use App\Models\User;

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
		'phoneNumber'=>[
			'oz'=>'Telefon raqamingiz',
			'uz'=>'Телефон рақамингиз',
			'ru'=>'Телефонный номер'
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
		'cust_comp_inn'=>[
			'oz'=>"Korxona INNsi",
			'uz'=>'Korxona INNsi',
			'ru'=>'Предприятие ИНН'
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
			'oz'=>"til",
			'uz'=>'тил',
			'ru'=>'язык'
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
			'oz'=>"ko'rish",
			'uz'=>'кўриш',
			'ru'=>'ПОКАЗАТЬ'
		],
		'standartNumber'=>[
			'oz'=>"SHABLON STANDART RAQAMI",
			'uz'=>'ШАБЛОН СТАНДАРТ РАҚАМИ',
			'ru'=>'СТАНДАРТНЫЙ НОМЕР ШАБЛОНА'
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
			'uz'=>'Hisob',
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
		'cust_comp_gov_reg_num'=>[
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
			'oz'=>"Bank ACC",
			'uz'=>'Банк АCC',
			'ru'=>'Банк АCC'
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
	];
	return $words[$word][config('global.lang')];
}
?>