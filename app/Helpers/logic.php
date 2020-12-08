<?php

use App\Models\Setting;
use App\Models\Template;
use App\Models\User;

if (!function_exists('getDistricts')) {
	function getDistricts()
	{
		$districts=array (
			0 => 
			array (
			  'id' => '60',
			  'city_id' => '1',
			  'title' => '{"ru":"г. Нукус","oz":"Nukus shahri","uz":"Нукус шаҳри","en":""}',
			),
			1 => 
			array (
			  'id' => '61',
			  'city_id' => '1',
			  'title' => '{"ru":"Элликкалинский","oz":"Ellikqal\'a tumani","uz":"Елликқалъа тумани","en":""}',
			),
			2 => 
			array (
			  'id' => '62',
			  'city_id' => '1',
			  'title' => '{"ru":"Шуманайский","oz":"Shumanay tumani:","uz":"Шуманай тумани","en":""}',
			),
			3 => 
			array (
			  'id' => '63',
			  'city_id' => '1',
			  'title' => '{"ru":"Чимбайский","oz":"Chimboy tumani","uz":"Чимбой тумани","en":""}',
			),
			4 => 
			array (
			  'id' => '64',
			  'city_id' => '1',
			  'title' => '{"ru":"Ходжейлийский","oz":"Xo\'jayli tumani","uz":"Хўжайли тумани","en":""}',
			),
			5 => 
			array (
			  'id' => '65',
			  'city_id' => '1',
			  'title' => '{"ru":"Турткульский","oz":"To\'rtko\'l tumani","uz":"Тўрткўл тумани","en":""}',
			),
			6 => 
			array (
			  'id' => '66',
			  'city_id' => '1',
			  'title' => '{"ru":"Тахтакупырский","oz":"Taxtako\'pir tumani","uz":"Тахтакўпир тумани","en":""}',
			),
			7 => 
			array (
			  'id' => '67',
			  'city_id' => '1',
			  'title' => '{"ru":"Нукусский","oz":"Nukus tumani","uz":"Нукус тумани","en":""}',
			),
			8 => 
			array (
			  'id' => '68',
			  'city_id' => '1',
			  'title' => '{"ru":"Муйнакский","oz":"Mo\'ynoq tumani","uz":"Мўйноқ тумани","en":""}',
			),
			9 => 
			array (
			  'id' => '69',
			  'city_id' => '1',
			  'title' => '{"ru":"Канлыкульский","oz":"Qonliko\'l tumani","uz":"Қонликўл тумани","en":""}',
			),
			10 => 
			array (
			  'id' => '70',
			  'city_id' => '1',
			  'title' => '{"ru":"Кунградский","oz":"Qo\'ng\'irot tumani","uz":"Қўнғирот тумани","en":""}',
			),
			11 => 
			array (
			  'id' => '71',
			  'city_id' => '1',
			  'title' => '{"ru":"Кегейлийский","oz":"Kegeyli tumani","uz":"Кегейли тумани","en":""}',
			),
			12 => 
			array (
			  'id' => '72',
			  'city_id' => '1',
			  'title' => '{"ru":"Караузякский","oz":"Qorao\'zak tumani","uz":"Қораўзак тумани","en":""}',
			),
			13 => 
			array (
			  'id' => '73',
			  'city_id' => '1',
			  'title' => '{"ru":"Амударьинский","oz":"Amudaryo tumani","uz":"Амударё тумани","en":""}',
			),
			14 => 
			array (
			  'id' => '74',
			  'city_id' => '1',
			  'title' => '{"ru":"Тахиаташский район","oz":"Taxiatosh tumani","uz":"Тахиатош тумани","en":""}',
			),
			15 => 
			array (
			  'id' => '75',
			  'city_id' => '1',
			  'title' => '{"ru":"Берунийский","oz":"Beruniy tumani","uz":"Беруний тумани","en":""}',
			),
			16 => 
			array (
			  'id' => '76',
			  'city_id' => '2',
			  'title' => '{"ru":"Шахриханский","oz":"Shahrixon tumani","uz":"Шаҳрихон тумани","en":""}',
			),
			17 => 
			array (
			  'id' => '77',
			  'city_id' => '2',
			  'title' => '{"ru":"Ходжаабадский","oz":"Xo\'jaobod tumani","uz":"Хўжаобод тумани","en":""}',
			),
			18 => 
			array (
			  'id' => '78',
			  'city_id' => '2',
			  'title' => '{"ru":"Улугнорский","oz":"Ulug\'nor tumani","uz":"Улуғнор тумани","en":""}',
			),
			19 => 
			array (
			  'id' => '79',
			  'city_id' => '2',
			  'title' => '{"ru":"Пахтаабадский","oz":"Paxtaobod tumani","uz":"Пахтаобод тумани","en":""}',
			),
			20 => 
			array (
			  'id' => '80',
			  'city_id' => '2',
			  'title' => '{"ru":"Мархаматский","oz":"Marhamat tumani","uz":"Марҳамат тумани","en":""}',
			),
			21 => 
			array (
			  'id' => '81',
			  'city_id' => '2',
			  'title' => '{"ru":"Кургантепинский","oz":"Qo\'rg\'ontepa tumani","uz":"Қўрғонтепа тумани","en":""}',
			),
			22 => 
			array (
			  'id' => '82',
			  'city_id' => '2',
			  'title' => '{"ru":"Избасканский","oz":"Izboskan tumani","uz":"Избоскан тумани","en":""}',
			),
			23 => 
			array (
			  'id' => '83',
			  'city_id' => '2',
			  'title' => '{"ru":"Джалакудукский","oz":"Jalaquduq tumani","uz":"Жалақудуқ тумани","en":""}',
			),
			24 => 
			array (
			  'id' => '84',
			  'city_id' => '2',
			  'title' => '{"ru":"Алтынкульский","oz":"Oltinko\'l tumani","uz":"Олтинкўл тумани","en":""}',
			),
			25 => 
			array (
			  'id' => '85',
			  'city_id' => '2',
			  'title' => '{"ru":"Булакбашинский","oz":"Buloqboshi tumani","uz":"Булоқбоши тумани","en":""}',
			),
			26 => 
			array (
			  'id' => '86',
			  'city_id' => '2',
			  'title' => '{"ru":"Бозский","oz":"Bo\'z tumani","uz":"Бўз тумани","en":""}',
			),
			27 => 
			array (
			  'id' => '87',
			  'city_id' => '2',
			  'title' => '{"ru":"Балыкчинский","oz":"Baliqchi tumani","uz":"Балиқчи тумани","en":""}',
			),
			28 => 
			array (
			  'id' => '88',
			  'city_id' => '2',
			  'title' => '{"ru":"Асакинский","oz":"Asaka tumani","uz":"Асака тумани","en":""}',
			),
			29 => 
			array (
			  'id' => '89',
			  'city_id' => '2',
			  'title' => '{"ru":"Андижанский","oz":"Andijon tumani","uz":"Андижон тумани","en":""}',
			),
			30 => 
			array (
			  'id' => '90',
			  'city_id' => '3',
			  'title' => '{"ru":"Шафирканский","oz":"Shofirkon tumani","uz":"Шофиркон тумани","en":""}',
			),
			31 => 
			array (
			  'id' => '91',
			  'city_id' => '3',
			  'title' => '{"ru":"Ромитанский","oz":"Romitan tumani","uz":"Ромитан тумани","en":""}',
			),
			32 => 
			array (
			  'id' => '92',
			  'city_id' => '3',
			  'title' => '{"ru":"Пешкунский","oz":"Peshku tumani","uz":"Пешку тумани","en":""}',
			),
			33 => 
			array (
			  'id' => '93',
			  'city_id' => '3',
			  'title' => '{"ru":"Караулбазарский","oz":"Qorovulbozor tumani","uz":"Қоровулбозор тумани","en":""}',
			),
			34 => 
			array (
			  'id' => '94',
			  'city_id' => '3',
			  'title' => '{"ru":"Каракульский","oz":"Qorako\'l tumani","uz":"Қоракўл тумани","en":""}',
			),
			35 => 
			array (
			  'id' => '95',
			  'city_id' => '3',
			  'title' => '{"ru":"Каганский","oz":"Kogon tumani","uz":"Когон тумани","en":""}',
			),
			36 => 
			array (
			  'id' => '96',
			  'city_id' => '3',
			  'title' => '{"ru":"Жондорский","oz":"Jondor tumani","uz":"Жондор тумани","en":""}',
			),
			37 => 
			array (
			  'id' => '97',
			  'city_id' => '3',
			  'title' => '{"ru":"Гиждуванский","oz":"G\'ijduvon tumani","uz":"Ғиждувон тумани","en":""}',
			),
			38 => 
			array (
			  'id' => '98',
			  'city_id' => '3',
			  'title' => '{"ru":"Вабкентский","oz":"Vobkent tumani","uz":"Вобкент тумани","en":""}',
			),
			39 => 
			array (
			  'id' => '99',
			  'city_id' => '3',
			  'title' => '{"ru":"Бухарский","oz":"Buxoro tumani","uz":"Бухоро тумани","en":""}',
			),
			40 => 
			array (
			  'id' => '100',
			  'city_id' => '3',
			  'title' => '{"ru":"Алатский","oz":"Olot tumani","uz":"Олот тумани","en":""}',
			),
			41 => 
			array (
			  'id' => '101',
			  'city_id' => '4',
			  'title' => '{"ru":"Янгиабадский","oz":"Yangiobod tumani","uz":"Янгиобод тумани","en":""}',
			),
			42 => 
			array (
			  'id' => '102',
			  'city_id' => '4',
			  'title' => '{"ru":"Фаришский","oz":"Forish tumani","uz":"Фориш тумани","en":""}',
			),
			43 => 
			array (
			  'id' => '103',
			  'city_id' => '4',
			  'title' => '{"ru":"Пахтакорский","oz":"Paxtakor tumani","uz":"Пахтакор тумани","en":""}',
			),
			44 => 
			array (
			  'id' => '104',
			  'city_id' => '4',
			  'title' => '{"ru":"Мирзачульский","oz":"Mirzacho\'l tumani","uz":"Мирзачўл тумани","en":""}',
			),
			45 => 
			array (
			  'id' => '105',
			  'city_id' => '4',
			  'title' => '{"ru":"Зафарабадский","oz":"Zafarobod tumani","uz":"Зафаробод тумани","en":""}',
			),
			46 => 
			array (
			  'id' => '106',
			  'city_id' => '4',
			  'title' => '{"ru":"Зарбдарский","oz":"Zarbdor tumani","uz":"Зарбдор тумани","en":""}',
			),
			47 => 
			array (
			  'id' => '107',
			  'city_id' => '4',
			  'title' => '{"ru":"Зааминский","oz":"Zomin tumani","uz":"Зомин тумани","en":""}',
			),
			48 => 
			array (
			  'id' => '108',
			  'city_id' => '4',
			  'title' => '{"ru":"Дустликский","oz":"Do\'stlik tumani","uz":"Дўстлик тумани","en":""}',
			),
			49 => 
			array (
			  'id' => '109',
			  'city_id' => '4',
			  'title' => '{"ru":"Джизакский","oz":"Jizzax tumani","uz":"Жиззах тумани","en":""}',
			),
			50 => 
			array (
			  'id' => '110',
			  'city_id' => '4',
			  'title' => '{"ru":"Галляаральский","oz":"G\'allaorol tumani","uz":"Ғаллаорол тумани","en":""}',
			),
			51 => 
			array (
			  'id' => '111',
			  'city_id' => '4',
			  'title' => '{"ru":"Бахмальский","oz":"Baxmal tumani","uz":"Бахмал тумани","en":""}',
			),
			52 => 
			array (
			  'id' => '112',
			  'city_id' => '4',
			  'title' => '{"ru":"Арнасайский","oz":"Arnasoy tumani","uz":"Арнасой тумани","en":""}',
			),
			53 => 
			array (
			  'id' => '113',
			  'city_id' => '4',
			  'title' => '{"ru":"Шароф Рашидов","oz":"Sharof Rashidov tumani","uz":"Шароф Рашидов тумани","en":""}',
			),
			54 => 
			array (
			  'id' => '114',
			  'city_id' => '5',
			  'title' => '{"ru":"Китабский район","oz":"Kitob tumani","uz":"Китоб тумани","en":""}',
			),
			55 => 
			array (
			  'id' => '115',
			  'city_id' => '5',
			  'title' => '{"ru":"Касбийский район","oz":"Kasbi tumani","uz":"Касби тумани","en":""}',
			),
			56 => 
			array (
			  'id' => '116',
			  'city_id' => '5',
			  'title' => '{"ru":"Касанский район","oz":"Koson tumani","uz":"Косон тумани","en":""}',
			),
			57 => 
			array (
			  'id' => '117',
			  'city_id' => '5',
			  'title' => '{"ru":"Каршинский район","oz":"Qarshi tumani","uz":"Қарши тумани","en":""}',
			),
			58 => 
			array (
			  'id' => '118',
			  'city_id' => '5',
			  'title' => '{"ru":"Камашинский район","oz":"Qamashi tumani","uz":"Қамаши тумани","en":""}',
			),
			59 => 
			array (
			  'id' => '119',
			  'city_id' => '5',
			  'title' => '{"ru":"Дехканабадский район","oz":"Dehqonobod tumani","uz":"Деҳқонобод тумани","en":""}',
			),
			60 => 
			array (
			  'id' => '120',
			  'city_id' => '5',
			  'title' => '{"ru":"Гузарский район","oz":"G\'uzor tumani","uz":"Ғузор тумани","en":""}',
			),
			61 => 
			array (
			  'id' => '121',
			  'city_id' => '5',
			  'title' => '{"ru":"Яккабагский район","oz":"Yakkabog\' tumani","uz":"Яккабоғ тумани","en":""}',
			),
			62 => 
			array (
			  'id' => '122',
			  'city_id' => '5',
			  'title' => '{"ru":"Шахрисабзский район","oz":"Shahrisabz tumani","uz":"Шаҳрисабз тумани","en":""}',
			),
			63 => 
			array (
			  'id' => '123',
			  'city_id' => '5',
			  'title' => '{"ru":"Чиракчинский район","oz":"Chiroqchi tumani","uz":"Чироқчи тумани","en":""}',
			),
			64 => 
			array (
			  'id' => '124',
			  'city_id' => '5',
			  'title' => '{"ru":"Нишанский район","oz":"Nishon tumani","uz":"Нишон тумани","en":""}',
			),
			65 => 
			array (
			  'id' => '125',
			  'city_id' => '5',
			  'title' => '{"ru":"Мубарекский район","oz":"Muborak tumani","uz":"Муборак тумани","en":""}',
			),
			66 => 
			array (
			  'id' => '126',
			  'city_id' => '5',
			  'title' => '{"ru":"Миришкорский район","oz":"Mirishkor tumani","uz":"Миришкор тумани","en":""}',
			),
			67 => 
			array (
			  'id' => '127',
			  'city_id' => '6',
			  'title' => '{"ru":"г.Зарафшон","oz":"Zarafshon shahri","uz":"Зарафшон шаҳри","en":""}',
			),
			68 => 
			array (
			  'id' => '128',
			  'city_id' => '6',
			  'title' => '{"ru":"Учкудукский","oz":"Uchquduq tumani","uz":"Учқудуқ тумани","en":""}',
			),
			69 => 
			array (
			  'id' => '129',
			  'city_id' => '6',
			  'title' => '{"ru":"Хатырчинский","oz":"Xatirchi tumani","uz":"Хатирчи тумани","en":""}',
			),
			70 => 
			array (
			  'id' => '130',
			  'city_id' => '6',
			  'title' => '{"ru":"Тамдынский","oz":"Tomdi tumani","uz":"Томди тумани","en":""}',
			),
			71 => 
			array (
			  'id' => '131',
			  'city_id' => '6',
			  'title' => '{"ru":"Нуратинский","oz":"Nurota tumani","uz":"Нурота тумани","en":""}',
			),
			72 => 
			array (
			  'id' => '132',
			  'city_id' => '6',
			  'title' => '{"ru":"Карманинский","oz":"Karmana tumani","uz":"Кармана тумани","en":""}',
			),
			73 => 
			array (
			  'id' => '133',
			  'city_id' => '6',
			  'title' => '{"ru":"Навбахорский","oz":"Navbahor tumani","uz":"Навбаҳор тумани","en":""}',
			),
			74 => 
			array (
			  'id' => '134',
			  'city_id' => '6',
			  'title' => '{"ru":"Кызылтепинский","oz":"Qiziltepa tumani","uz":"Қизилтепа тумани","en":""}',
			),
			75 => 
			array (
			  'id' => '135',
			  'city_id' => '6',
			  'title' => '{"ru":"Канимехский","oz":"Konimex tumani","uz":"Конимех тумани","en":""}',
			),
			76 => 
			array (
			  'id' => '136',
			  'city_id' => '6',
			  'title' => '{"ru":"г.Навои","oz":"Navoiy shahri","uz":"Навоий шаҳри","en":""}',
			),
			77 => 
			array (
			  'id' => '137',
			  'city_id' => '7',
			  'title' => '{"ru":"Янгикурганский","oz":"Yangiqo\'rg\'on tumani","uz":"Янгиқўрғон тумани","en":""}',
			),
			78 => 
			array (
			  'id' => '138',
			  'city_id' => '7',
			  'title' => '{"ru":"Чустский","oz":"Chust tumani","uz":"Чуст тумани","en":""}',
			),
			79 => 
			array (
			  'id' => '139',
			  'city_id' => '7',
			  'title' => '{"ru":"Чартакский","oz":"Chortoq tumani","uz":"Чортоқ тумани","en":""}',
			),
			80 => 
			array (
			  'id' => '140',
			  'city_id' => '7',
			  'title' => '{"ru":"Учкурганский","oz":"Uchqo\'rg\'on tumani","uz":"Учқўрғон тумани","en":""}',
			),
			81 => 
			array (
			  'id' => '141',
			  'city_id' => '7',
			  'title' => '{"ru":"Уйчинский","oz":"Uychi tumani","uz":"Уйчи тумани","en":""}',
			),
			82 => 
			array (
			  'id' => '142',
			  'city_id' => '7',
			  'title' => '{"ru":"Туракурганский","oz":"To\'raqo\'rg\'on tumani","uz":"Тўрақўрғон тумани","en":""}',
			),
			83 => 
			array (
			  'id' => '143',
			  'city_id' => '7',
			  'title' => '{"ru":"Папский","oz":"Pop tumani","uz":"Поп тумани","en":""}',
			),
			84 => 
			array (
			  'id' => '144',
			  'city_id' => '7',
			  'title' => '{"ru":"Нарынский","oz":"Norin tumani","uz":"Норин тумани","en":""}',
			),
			85 => 
			array (
			  'id' => '145',
			  'city_id' => '7',
			  'title' => '{"ru":"Наманганский","oz":"Namangan tumani","uz":"Наманган тумани","en":""}',
			),
			86 => 
			array (
			  'id' => '146',
			  'city_id' => '7',
			  'title' => '{"ru":"Мингбулакский","oz":"Mingbuloq tumani","uz":"Мингбулоқ тумани","en":""}',
			),
			87 => 
			array (
			  'id' => '147',
			  'city_id' => '7',
			  'title' => '{"ru":"Касансайский","oz":"Kosonsoy tumani","uz":"Косонсой тумани","en":""}',
			),
			88 => 
			array (
			  'id' => '148',
			  'city_id' => '8',
			  'title' => '{"ru":"Ургутский","oz":"Urgut tumani","uz":"Ургут тумани","en":""}',
			),
			89 => 
			array (
			  'id' => '149',
			  'city_id' => '8',
			  'title' => '{"ru":"Тайлакский","oz":"Toyloq tumani","uz":"Тойлоқ тумани","en":""}',
			),
			90 => 
			array (
			  'id' => '150',
			  'city_id' => '8',
			  'title' => '{"ru":"Самаркандский","oz":"Samarqand tumani","uz":"Самарқанд тумани","en":""}',
			),
			91 => 
			array (
			  'id' => '151',
			  'city_id' => '8',
			  'title' => '{"ru":"Пахтачийский","oz":"Paxtachi tumani","uz":"Пахтачи тумани","en":""}',
			),
			92 => 
			array (
			  'id' => '152',
			  'city_id' => '8',
			  'title' => '{"ru":"Пастдаргомский","oz":"Pastdarg\'om tumani","uz":"Пастдарғом тумани","en":""}',
			),
			93 => 
			array (
			  'id' => '153',
			  'city_id' => '8',
			  'title' => '{"ru":"Пайарыкский","oz":"Payariq tumani","uz":"Паяриқ тумани","en":""}',
			),
			94 => 
			array (
			  'id' => '154',
			  'city_id' => '8',
			  'title' => '{"ru":"Нурабадский","oz":"Nurobod tumani","uz":"Нуробод тумани","en":""}',
			),
			95 => 
			array (
			  'id' => '155',
			  'city_id' => '8',
			  'title' => '{"ru":"Нарпайский","oz":"Narpay tumani","uz":"Нарпай тумани","en":""}',
			),
			96 => 
			array (
			  'id' => '156',
			  'city_id' => '8',
			  'title' => '{"ru":"Кошрабадский","oz":"Qo\'shrabot tumani","uz":"Қўшработ тумани","en":""}',
			),
			97 => 
			array (
			  'id' => '157',
			  'city_id' => '8',
			  'title' => '{"ru":"Каттакурганский","oz":"Kattaqo\'rg\'on tumani","uz":"Каттақўрғон тумани","en":""}',
			),
			98 => 
			array (
			  'id' => '158',
			  'city_id' => '8',
			  'title' => '{"ru":"Иштыханский","oz":"Ishtixon tumani","uz":"Иштихон тумани","en":""}',
			),
			99 => 
			array (
			  'id' => '159',
			  'city_id' => '8',
			  'title' => '{"ru":"Джамбайский","oz":"Jomboy tumani","uz":"Жомбой тумани","en":""}',
			),
			100 => 
			array (
			  'id' => '160',
			  'city_id' => '8',
			  'title' => '{"ru":"Булунгурский","oz":"Bulung\'ur tumani","uz":"Булунғур тумани","en":""}',
			),
			101 => 
			array (
			  'id' => '161',
			  'city_id' => '8',
			  'title' => '{"ru":"Акдарьинский","oz":"Oqdaryo tumani","uz":"Оқдарё тумани","en":""}',
			),
			102 => 
			array (
			  'id' => '162',
			  'city_id' => '9',
			  'title' => '{"ru":"Кумкурганский","oz":"Qumqo\'rg\'on tumani","uz":"Қумқўрғон тумани","en":""}',
			),
			103 => 
			array (
			  'id' => '163',
			  'city_id' => '9',
			  'title' => '{"ru":"Шурчинский","oz":"Sho\'rchi tumani","uz":"Шўрчи тумани","en":""}',
			),
			104 => 
			array (
			  'id' => '164',
			  'city_id' => '9',
			  'title' => '{"ru":"Шерабадский","oz":"Sherobod tumani","uz":"Шеробод тумани","en":""}',
			),
			105 => 
			array (
			  'id' => '165',
			  'city_id' => '9',
			  'title' => '{"ru":"Узунский","oz":"Uzun tumani","uz":"Узун тумани","en":""}',
			),
			106 => 
			array (
			  'id' => '166',
			  'city_id' => '9',
			  'title' => '{"ru":"Термезский","oz":"Termiz tumani","uz":"Термиз тумани","en":""}',
			),
			107 => 
			array (
			  'id' => '167',
			  'city_id' => '9',
			  'title' => '{"ru":"Сариасийский","oz":"Sariosiyo tumani","uz":"Сариосиё тумани","en":""}',
			),
			108 => 
			array (
			  'id' => '168',
			  'city_id' => '9',
			  'title' => '{"ru":"Музрабадский","oz":"Muzrabot tumani","uz":"Музработ тумани","en":""}',
			),
			109 => 
			array (
			  'id' => '169',
			  'city_id' => '9',
			  'title' => '{"ru":"Кизирикский","oz":"Qiziriq tumani","uz":"Қизириқ тумани","en":""}',
			),
			110 => 
			array (
			  'id' => '170',
			  'city_id' => '9',
			  'title' => '{"ru":"Джаркурганский","oz":"Jarqo\'rg\'on tumani","uz":"Жарқўрғон тумани","en":""}',
			),
			111 => 
			array (
			  'id' => '171',
			  'city_id' => '9',
			  'title' => '{"ru":"Денауский","oz":"Denov tumani","uz":"Денов тумани","en":""}',
			),
			112 => 
			array (
			  'id' => '172',
			  'city_id' => '9',
			  'title' => '{"ru":"Байсунский","oz":"Boysun tumani","uz":"Бойсун тумани","en":""}',
			),
			113 => 
			array (
			  'id' => '173',
			  'city_id' => '9',
			  'title' => '{"ru":"Ангорский","oz":"Angor tumani","uz":"Ангор тумани","en":""}',
			),
			114 => 
			array (
			  'id' => '174',
			  'city_id' => '9',
			  'title' => '{"ru":"Алтынсайский","oz":"Oltinsoy tumani","uz":"Олтинсой тумани","en":""}',
			),
			115 => 
			array (
			  'id' => '175',
			  'city_id' => '10',
			  'title' => '{"ru":"Хавастский","oz":"Xovos tumani","uz":"Ховос тумани","en":""}',
			),
			116 => 
			array (
			  'id' => '176',
			  'city_id' => '10',
			  'title' => '{"ru":"Сырдарьинский","oz":"Sirdaryo tumani","uz":"Сирдарё тумани","en":""}',
			),
			117 => 
			array (
			  'id' => '177',
			  'city_id' => '10',
			  'title' => '{"ru":"Сардобский","oz":"Sardoba tumani","uz":"Сардоба тумани","en":""}',
			),
			118 => 
			array (
			  'id' => '178',
			  'city_id' => '10',
			  'title' => '{"ru":"Сайхунабадский","oz":"Sayxunobod tumani","uz":"Сайхунобод тумани","en":""}',
			),
			119 => 
			array (
			  'id' => '179',
			  'city_id' => '10',
			  'title' => '{"ru":"Мирзаабадский","oz":"Mirzaobod tumani","uz":"Мирзаобод тумани","en":""}',
			),
			120 => 
			array (
			  'id' => '180',
			  'city_id' => '10',
			  'title' => '{"ru":"Гулистанский","oz":"Guliston tumani","uz":"Гулистон тумани","en":""}',
			),
			121 => 
			array (
			  'id' => '181',
			  'city_id' => '10',
			  'title' => '{"ru":"Баяутский","oz":"Boyovut tumani","uz":"Боёвут тумани","en":""}',
			),
			122 => 
			array (
			  'id' => '182',
			  'city_id' => '10',
			  'title' => '{"ru":"Акалтынский","oz":"Oqoltin tumani","uz":"Оқолтин тумани","en":""}',
			),
			123 => 
			array (
			  'id' => '183',
			  'city_id' => '11',
			  'title' => '{"ru":"Янгиюльский","oz":"Yangiyo\'l tumani","uz":"Янгийўл тумани","en":""}',
			),
			124 => 
			array (
			  'id' => '184',
			  'city_id' => '11',
			  'title' => '{"ru":"Юкоричирчикский","oz":"Yuqori Chirchiq tumani","uz":"Юқори Чирчиқ тумани","en":""}',
			),
			125 => 
			array (
			  'id' => '185',
			  'city_id' => '11',
			  'title' => '{"ru":"Чиназский","oz":"Chinoz tumani","uz":"Чиноз тумани","en":""}',
			),
			126 => 
			array (
			  'id' => '186',
			  'city_id' => '11',
			  'title' => '{"ru":"Уртачирчикский","oz":"O\'rta Chirchiq tumani","uz":"Ўрта Чирчиқ тумани","en":""}',
			),
			127 => 
			array (
			  'id' => '187',
			  'city_id' => '11',
			  'title' => '{"ru":"Зангиатинский","oz":"Zangiota tumani","uz":"Зангиота тумани","en":""}',
			),
			128 => 
			array (
			  'id' => '188',
			  'city_id' => '11',
			  'title' => '{"ru":"Пскентский","oz":"Piskent tumani","uz":"Пискент тумани","en":""}',
			),
			129 => 
			array (
			  'id' => '189',
			  'city_id' => '11',
			  'title' => '{"ru":"Паркентский","oz":"Parkent tumani","uz":"Паркент тумани","en":""}',
			),
			130 => 
			array (
			  'id' => '190',
			  'city_id' => '11',
			  'title' => '{"ru":"Куйичирчикский","oz":"Quyi Chirchiq tumani","uz":"Қуйи Чирчиқ тумани","en":""}',
			),
			131 => 
			array (
			  'id' => '191',
			  'city_id' => '11',
			  'title' => '{"ru":"Кибрайский","oz":"Qibray tumani","uz":"Қибрай тумани","en":""}',
			),
			132 => 
			array (
			  'id' => '192',
			  'city_id' => '11',
			  'title' => '{"ru":"Букинский","oz":"Bo\'ka tumani","uz":"Бўка тумани","en":""}',
			),
			133 => 
			array (
			  'id' => '193',
			  'city_id' => '11',
			  'title' => '{"ru":"Бостанлыкский","oz":"Bo\'stonliq tumani","uz":"Бўстонлиқ тумани","en":""}',
			),
			134 => 
			array (
			  'id' => '194',
			  'city_id' => '11',
			  'title' => '{"ru":"Бекабадский","oz":"Bekobod tumani","uz":"Бекобод тумани","en":""}',
			),
			135 => 
			array (
			  'id' => '195',
			  'city_id' => '11',
			  'title' => '{"ru":"Ахангаранский","oz":"Ohangaron tumani","uz":"Оҳангарон тумани","en":""}',
			),
			136 => 
			array (
			  'id' => '196',
			  'city_id' => '11',
			  'title' => '{"ru":"Аккурганский","oz":"Oqqo\'rg\'on tumani","uz":"Оққўрғон тумани","en":""}',
			),
			137 => 
			array (
			  'id' => '197',
			  'city_id' => '11',
			  'title' => '{"ru":"Ташкент","oz":"Toshkent tumani","uz":"Тошкент тумани","en":""}',
			),
			138 => 
			array (
			  'id' => '198',
			  'city_id' => '11',
			  'title' => '{"ru":"Ангрен","oz":"Angren tumani","uz":"Ангрен тумани","en":""}',
			),
			139 => 
			array (
			  'id' => '199',
			  'city_id' => '12',
			  'title' => '{"ru":"Язъяванский","oz":"Yozyovon tumani","uz":"Ёзёвон тумани","en":""}',
			),
			140 => 
			array (
			  'id' => '200',
			  'city_id' => '12',
			  'title' => '{"ru":"Фуркатский","oz":"Furqat tumani","uz":"Фурқат тумани","en":""}',
			),
			141 => 
			array (
			  'id' => '201',
			  'city_id' => '12',
			  'title' => '{"ru":"Ферганский","oz":"Farg\'ona tumani","uz":"Фарғона тумани","en":""}',
			),
			142 => 
			array (
			  'id' => '202',
			  'city_id' => '12',
			  'title' => '{"ru":"Учкуприкский","oz":"Uchko\'prik tumani","uz":"Учкўприк тумани","en":""}',
			),
			143 => 
			array (
			  'id' => '203',
			  'city_id' => '12',
			  'title' => '{"ru":"Узбекистанский","oz":"O\'zbekiston tumani","uz":"Ўзбекистон тумани","en":""}',
			),
			144 => 
			array (
			  'id' => '204',
			  'city_id' => '12',
			  'title' => '{"ru":"Ташлакский","oz":"Toshloq tumani","uz":"Тошлоқ тумани","en":""}',
			),
			145 => 
			array (
			  'id' => '205',
			  'city_id' => '12',
			  'title' => '{"ru":"Сохский","oz":"So\'x tumani","uz":"Сўх тумани","en":""}',
			),
			146 => 
			array (
			  'id' => '206',
			  'city_id' => '12',
			  'title' => '{"ru":"Риштанский","oz":"Rishton tumani","uz":"Риштон тумани","en":""}',
			),
			147 => 
			array (
			  'id' => '207',
			  'city_id' => '12',
			  'title' => '{"ru":"Куштепинский","oz":"Qo\'shtepa tumani","uz":"Қўштепа тумани","en":""}',
			),
			148 => 
			array (
			  'id' => '208',
			  'city_id' => '12',
			  'title' => '{"ru":"Кувинский","oz":"Quva tumani","uz":"Қува тумани","en":""}',
			),
			149 => 
			array (
			  'id' => '209',
			  'city_id' => '12',
			  'title' => '{"ru":"Дангаринский","oz":"Dang\'ara tumani","uz":"Данғара тумани","en":""}',
			),
			150 => 
			array (
			  'id' => '210',
			  'city_id' => '12',
			  'title' => '{"ru":"Бувайдинский","oz":"Buvayda tumani","uz":"Бувайда тумани","en":""}',
			),
			151 => 
			array (
			  'id' => '211',
			  'city_id' => '12',
			  'title' => '{"ru":"Бешарыкский","oz":"Beshariq tumani","uz":"Бешариқ тумани","en":""}',
			),
			152 => 
			array (
			  'id' => '212',
			  'city_id' => '12',
			  'title' => '{"ru":"Багдадский","oz":"Bag\'dod tumani","uz":"Бағдод тумани","en":""}',
			),
			153 => 
			array (
			  'id' => '213',
			  'city_id' => '12',
			  'title' => '{"ru":"Алтыарыкский","oz":"Oltiariq tumani","uz":"Олтиариқ тумани","en":""}',
			),
			154 => 
			array (
			  'id' => '214',
			  'city_id' => '13',
			  'title' => '{"ru":"Янгиарыкский","oz":"Yangiariq tumani","uz":"Янгиариқ тумани","en":""}',
			),
			155 => 
			array (
			  'id' => '215',
			  'city_id' => '13',
			  'title' => '{"ru":"Янгибазарский","oz":"Yangibozor tumani","uz":"Янгибозор тумани","en":""}',
			),
			156 => 
			array (
			  'id' => '216',
			  'city_id' => '13',
			  'title' => '{"ru":"Шаватский","oz":"Shovot tumani","uz":"Шовот тумани","en":""}',
			),
			157 => 
			array (
			  'id' => '217',
			  'city_id' => '13',
			  'title' => '{"ru":"Хивинский","oz":"Xiva tumani","uz":"Хива тумани","en":""}',
			),
			158 => 
			array (
			  'id' => '218',
			  'city_id' => '13',
			  'title' => '{"ru":"Ханкинский","oz":"Xonqa tumani","uz":"Хонқа тумани","en":""}',
			),
			159 => 
			array (
			  'id' => '219',
			  'city_id' => '13',
			  'title' => '{"ru":"Хазараспский","oz":"Hazorasp tumani","uz":"Ҳазорасп тумани","en":""}',
			),
			160 => 
			array (
			  'id' => '220',
			  'city_id' => '13',
			  'title' => '{"ru":"Ургенчский","oz":"Urganch tumani","uz":"Урганч тумани","en":""}',
			),
			161 => 
			array (
			  'id' => '221',
			  'city_id' => '13',
			  'title' => '{"ru":"Кошкупырский","oz":"Qo\'shko\'pir tumani","uz":"Қўшкўпир тумани","en":""}',
			),
			162 => 
			array (
			  'id' => '222',
			  'city_id' => '13',
			  'title' => '{"ru":"Гурленский","oz":"Gurlan tumani","uz":"Гурлан тумани","en":""}',
			),
			163 => 
			array (
			  'id' => '223',
			  'city_id' => '13',
			  'title' => '{"ru":"Багатский","oz":"Bog\'ot tumani","uz":"Боғот тумани","en":""}',
			),
			164 => 
			array (
			  'id' => '224',
			  'city_id' => '13',
			  'title' => '{"ru":"г.Ургенч","oz":"Urganch shahri","uz":"Урганч шаҳри","en":""}',
			),
			165 => 
			array (
			  'id' => '225',
			  'city_id' => '14',
			  'title' => '{"ru":"Яшнабадский район","oz":"Yashnobod tumani","uz":"Яшнобод тумани","en":""}',
			),
			166 => 
			array (
			  'id' => '226',
			  'city_id' => '14',
			  'title' => '{"ru":"Яккасарайский район","oz":"Yakkasaroy tumani","uz":"Яккасарой тумани","en":""}',
			),
			167 => 
			array (
			  'id' => '227',
			  'city_id' => '14',
			  'title' => '{"ru":"Юнусабадский район","oz":"Yunusobod tumani","uz":"Юнусобод тумани","en":""}',
			),
			168 => 
			array (
			  'id' => '228',
			  'city_id' => '14',
			  'title' => '{"ru":"Шайхантахурский район","oz":"Shayxontohur tumani","uz":"Шайхонтоҳур тумани","en":""}',
			),
			169 => 
			array (
			  'id' => '229',
			  'city_id' => '14',
			  'title' => '{"ru":"Чиланзарский район","oz":"Chilonzor tumani","uz":"Чилонзор тумани","en":""}',
			),
			170 => 
			array (
			  'id' => '230',
			  'city_id' => '14',
			  'title' => '{"ru":"Учтепинский район","oz":"Uchtepa tumani","uz":"Учтепа тумани","en":""}',
			),
			171 => 
			array (
			  'id' => '231',
			  'city_id' => '14',
			  'title' => '{"ru":"Сергелийский район","oz":"Sergeli tumani","uz":"Сергели тумани","en":""}',
			),
			172 => 
			array (
			  'id' => '232',
			  'city_id' => '14',
			  'title' => '{"ru":"Мирзо-Улугбекский район","oz":"Mirzo Ulug\'bek tumani","uz":"Мирзо Улуғбек тумани","en":""}',
			),
			173 => 
			array (
			  'id' => '233',
			  'city_id' => '14',
			  'title' => '{"ru":"Мирабадский район","oz":"Mirobod tumani","uz":"Миробод тумани","en":""}',
			),
			174 => 
			array (
			  'id' => '234',
			  'city_id' => '14',
			  'title' => '{"ru":"Бектемирский район","oz":"Bektemir tumani","uz":"Бектемир тумани","en":""}',
			),
			175 => 
			array (
			  'id' => '235',
			  'city_id' => '14',
			  'title' => '{"ru":"Алмазарский район","oz":"Olmazor tumani","uz":"Олмазор тумани","en":""}',
			),
			176 => 
			array (
			  'id' => '236',
			  'city_id' => '1',
			  'title' => '{"ru":"Бузатов район","oz":"Bo\'zatov tumani","uz":"Бўзатов тумани","en":""}',
			),
			177 => 
			array (
			  'id' => '237',
			  'city_id' => '2',
			  'title' => '{"ru":"г.Андижан","oz":"Andijon shahri","uz":"Андижон шаҳри","en":""}',
			),
			178 => 
			array (
			  'id' => '238',
			  'city_id' => '2',
			  'title' => '{"ru":"Ханабадский","oz":"Xonobod tumani","uz":"Хонобод тумани","en":""}',
			),
			179 => 
			array (
			  'id' => '239',
			  'city_id' => '3',
			  'title' => '{"ru":"г.Бухара","oz":"Buxoro shahri","uz":"Бухоро шаҳри","en":""}',
			),
			180 => 
			array (
			  'id' => '240',
			  'city_id' => '3',
			  'title' => '{"ru":"г.Каган","oz":"Kogon shahri","uz":"Когон шаҳри","en":""}',
			),
			181 => 
			array (
			  'id' => '241',
			  'city_id' => '4',
			  'title' => '{"ru":"г.Джизак","oz":"Jizzax shahri","uz":"Жиззах шаҳри","en":""}',
			),
			182 => 
			array (
			  'id' => '242',
			  'city_id' => '5',
			  'title' => '{"ru":"г.Карши","oz":"Qarshi shahri","uz":"Қарши шаҳри","en":""}',
			),
			183 => 
			array (
			  'id' => '243',
			  'city_id' => '5',
			  'title' => '{"ru":"г.Шахриса́бз","oz":"Shahrisabz shahri","uz":"Шаҳрисабз шаҳри","en":""}',
			),
			184 => 
			array (
			  'id' => '244',
			  'city_id' => '7',
			  'title' => '{"ru":"г.Наманган","oz":"Namangan shahri","uz":"Наманган шаҳри","en":""}',
			),
			185 => 
			array (
			  'id' => '245',
			  'city_id' => '8',
			  'title' => '{"ru":"г.Самарканд","oz":"Samarqand shahri","uz":"Самарқанд шаҳри","en":""}',
			),
			186 => 
			array (
			  'id' => '246',
			  'city_id' => '9',
			  'title' => '{"ru":"г.Термез","oz":"Termiz shahri","uz":"Термиз шаҳри","en":""}',
			),
			187 => 
			array (
			  'id' => '247',
			  'city_id' => '9',
			  'title' => '{"ru":"Бандиханский район","oz":"Bandixon tumani","uz":"Бандихон тумани","en":""}',
			),
			188 => 
			array (
			  'id' => '248',
			  'city_id' => '10',
			  'title' => '{"ru":"г.Ширин","oz":"Shirin shahri","uz":"Ширин шаҳри","en":""}',
			),
			189 => 
			array (
			  'id' => '249',
			  'city_id' => '10',
			  'title' => '{"ru":"г.Гулистан","oz":"Guliston shahri","uz":"Гулистон шаҳри","en":""}',
			),
			190 => 
			array (
			  'id' => '250',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Чирчик","oz":"Chirchiq shahri","uz":"Чирчиқ шаҳри","en":""}',
			),
			191 => 
			array (
			  'id' => '251',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Бекабад","oz":"Bekobod shahri","uz":"Бекобод шаҳри","en":""}',
			),
			192 => 
			array (
			  'id' => '252',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Ангрен","oz":"Angren shahri","uz":"Ангрен шаҳри","en":""}',
			),
			193 => 
			array (
			  'id' => '253',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Янгиюль","oz":"Yangiyo\'l shahri","uz":"Янгийўл шаҳри","en":""}',
			),
			194 => 
			array (
			  'id' => '254',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Алмалы́к","oz":"Olmaliq shahri","uz":"Олмалиқ шаҳри","en":""}',
			),
			195 => 
			array (
			  'id' => '255',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Ахангаран","oz":"Ohangaron shahri","uz":"Оҳангарон шаҳри","en":""}',
			),
			196 => 
			array (
			  'id' => '256',
			  'city_id' => '11',
			  'title' => '{"ru":"г.Нурафшон","oz":"Nurafshon shahri","uz":"Нурафшон шаҳри","en":""}',
			),
			197 => 
			array (
			  'id' => '257',
			  'city_id' => '12',
			  'title' => '{"ru":"г.Фергана","oz":"Farg\'ona shahri","uz":"Фарғона шаҳри","en":""}',
			),
			198 => 
			array (
			  'id' => '258',
			  'city_id' => '12',
			  'title' => '{"ru":"г.Коканд","oz":"Qo\'qon shahri","uz":"Қўқон шаҳри","en":""}',
			),
			199 => 
			array (
			  'id' => '259',
			  'city_id' => '12',
			  'title' => '{"ru":"г.Кувасай","oz":"Quvasoy shahri","uz":"Қувасой шаҳри","en":""}',
			),
			200 => 
			array (
			  'id' => '260',
			  'city_id' => '12',
			  'title' => '{"ru":"г.Маргилан","oz":"Marg\'ilon shahri","uz":"Марғилон шаҳри","en":""}',
			),
			201 => 
			array (
			  'id' => '261',
			  'city_id' => '13',
			  'title' => '{"ru":"Топрак-калинский район","oz":"Tuproqqal\'a tumani","uz":"Тупроққалъа тумани","en":""}',
			),
			202 => 
			array (
			  'id' => '262',
			  'city_id' => '13',
			  'title' => '{"ru":"г.Хива","oz":"Xiva shahar","uz":"Хива шаҳар","en":""}',
			),
		);
		return $districts;
	}
}
if (!function_exists('getRegions')) {
	function getRegions()
	{
		$regions = array(
			0 =>
			array(
				'id' => '1',
				'title' => '{"ru":"Республика Каракалпакстан","oz":"Qoraqalpog\'iston Respublikasi","uz":"Қорақалпоғистон Республикаси","en":""}',
			),
			1 =>
			array(
				'id' => '2',
				'title' => '{"ru":"Андижанская область","oz":"Andijon viloyati","uz":"Андижон вилояти","en":""}',
			),
			2 =>
			array(
				'id' => '3',
				'title' => '{"ru":"Бухарская область","oz":"Buxoro viloyati","uz":"Бухоро вилояти","en":""}',
			),
			3 =>
			array(
				'id' => '4',
				'title' => '{"ru":"Джизакская область","oz":"Jizzax viloyati","uz":"Жиззах вилояти","en":""}',
			),
			4 =>
			array(
				'id' => '5',
				'title' => '{"ru":"Кашкадарьинская область","oz":"Qashqadaryo viloyati","uz":"Қашқадарё вилояти","en":""}',
			),
			5 =>
			array(
				'id' => '6',
				'title' => '{"ru":"Навоийская область","oz":"Navoiy viloyati","uz":"Навоий вилояти","en":""}',
			),
			6 =>
			array(
				'id' => '7',
				'title' => '{"ru":"Наманганская область","oz":"Namangan viloyati","uz":"Наманган вилояти","en":""}',
			),
			7 =>
			array(
				'id' => '8',
				'title' => '{"ru":"Самаркандская область","oz":"Samarqand viloyati","uz":"Самарқанд вилояти","en":""}',
			),
			8 =>
			array(
				'id' => '9',
				'title' => '{"ru":"Сурхандарьинская область","oz":"Surxondaryo viloyati","uz":"Сурхондарё вилояти","en":""}',
			),
			9 =>
			array(
				'id' => '10',
				'title' => '{"ru":"Сырдарьинская область","oz":"Sirdaryo viloyati","uz":"Сирдарё вилояти","en":""}',
			),
			10 =>
			array(
				'id' => '11',
				'title' => '{"ru":"Ташкентская область","oz":"Toshkent viloyati","uz":"Тошкент вилояти","en":""}',
			),
			11 =>
			array(
				'id' => '12',
				'title' => '{"ru":"Ферганская область","oz":"Farg\'ona viloyati","uz":"Фарғона вилояти","en":""}',
			),
			12 =>
			array(
				'id' => '13',
				'title' => '{"ru":"Хорезмская область","oz":"Xorazm viloyati","uz":"Хоразм вилояти","en":""}',
			),
			13 =>
			array(
				'id' => '14',
				'title' => '{"ru":"г.Ташкент","oz":"Toshkent shahar","uz":"Тошкент шаҳар","en":""}',
			),
		);
		return $regions;
	}
}

if (!function_exists('file_validation_rules')) {
	function file_validation_rules($template_id)
	{
		$template = Template::where('id', $template_id)->first();

		$file_fields = array_filter(json_decode($template->fields, true), function ($v) {
			return $v['type'] == 'file';
		});

		$rules = array_map(function ($v) {
			return ["custom." . $v['name'] => "required | mimes:" . $v['mime_types']];
		}, $file_fields);

		return array_merge(...$rules);
	}
}

if (!function_exists('file_fields_for_validation_edit')) {
	function file_fields_for_validation_edit($template_id)
	{
		$template = Template::where('id', $template_id)->first();

		$file_fields = array_filter(json_decode($template->fields, true), function ($v) {
			return $v['type'] == 'file';
		});

		$rules = array_map(function ($v) {
			return ["custom." . $v['name'] => "mimetypes:" . $v['mime_types']];
		}, $file_fields);
		return array_merge(...$rules);
	}
}

function custom_fields($id)
{
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
if (!function_exists('sms')) {
	function sms($phone, $message='', $template='', $came_data=[])
	{
		$messages=[
			'agent_conclusion_success'=>'Hurmatli {full_name} sizning {conclusion_id} - raqamli xulosangiz muvaffaqiyatli tasdiqlandi. Hurmat bilan e-audit.uz',
			'agent_new_conclusion_send'=>'Hurmatli {full_name} sizning {conclusion_id} - raqamli xulosangiz administratorga yuborildi. Hurmat bilan e-audit.uz',
			'agent_conclusion_rejected'=>'Hurmatli {full_name} sizning {conclusion_id} - raqamli xulosangizda kamchiliklar aniqlandi. Hurmat bilan e-audit.uz',
			'auditor_order_assigned'=>'Hurmatli {full_name} sizga {order_id} - raqamli buyurtma sizga biriktirildi. Hurmat bilan e-audit.uz',
			'user_payment'=>'Hurmatli {full_name} sizning hisobingizga {sum} - so\'m miqdorida pul to\'landi. Hurmat bilan e-audit.uz',
			'user_status_activated'=>'Hurmatli {full_name} sizning akkauntingiz faollashtirildi. Hurmat bilan e-audit.uz',
			'user_blanks_assigned'=>'Hurmatli {full_name} sizga {count} ta blanka berildi',
			'auditor_conclusion_customer_send'=>'Hurmatli {full_name} sizga {order_id} raqamli buyurtmangizga asosan xulosa yuborildi. Ko\'rib chiqib to\'lovni amalga oshirishingiz mumkin. Hurmat bilan e-audit.uz',
			'auditor_conclusion_customer_send_errors'=>'Hurmatli {full_name} sizning {order_id} raqamli buyurtmangizda kamchiliklar aniqlandi.  {message} Hurmat bilan e-audit.uz',
			'auditor_conclusion_customer_send_confirmed'=>'Hurmatli {full_name} sizning {order_id} raqamli buyurtmangiz tasdiqlandi. Hurmat bilan e-audit.uz',
			'verification'=>'Hurmatli mijoz sizning tasdiqlovchi kodingiz {ver_code}.  Hurmat bilan e-audit.uz'
		];
		$ch = curl_init();
		$postData = array(
			"mobile_phone" => $phone,
			"from" => "4546",
			"message" => $message,
			"dlr-level" => "2"
		);
		if($template){
			$postData = array(
				"mobile_phone" => $phone,
				"from" => "4546",
				"message" => strtr($messages[$template], $came_data),
				"dlr-level" => "2"
			);	
		}
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
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json',
				'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ub3RpZnkuZXNraXoudXpcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MDU0NzE4OTIsImV4cCI6MTYwODA2Mzg5MiwibmJmIjoxNjA1NDcxODkyLCJqdGkiOiJFeDV5QmRHMzAyVHJmdm1WIiwic3ViIjoyOTIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.xHIXsJfive_SbDG_wdI-N-RDUp2KjjGtOcJV3zsqNvM'
			)
		);
		// execute
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
}
function getUserLayout($u)
{
	switch ($u) {
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


function lang($word)
{
	// $words = [
	// 	'list_services'=>[
	// 		'oz' => 'Servislar',
	// 		'uz' => 'Сервислар',
	// 		'ru' => 'Сервисы'
	// 	],
	// 	'title'=>[
	// 		'oz' => 'Nomi',
	// 		'uz' => 'Номи',
	// 		'ru' => 'Hазвание'
	// 	],
	// 	'price'=>[
	// 		'oz' => 'Narxi',
	// 		'uz' => 'Нархи',
	// 		'ru' => 'Цена'
	// 	],
	// 	'yearly'=>[
	// 		'oz' => 'Yillik',
	// 		'uz' => 'Йиллик',
	// 		'ru' => 'Годовой'
	// 	],
	// 	'payment_type' => [
	// 		'oz' => 'To\'lov turi',
	// 		'uz' => 'Тўлов тури',
	// 		'ru' => 'Тип платежа'
	// 	],
	// 	'perechislenie' => [
	// 		'oz' => 'Pul o\'tkazish',
	// 		'uz' => 'Пул ўтказиш',
	// 		'ru' => 'Банковский перевод'
	// 	],
	// 	'others' => [
	// 		'oz' => 'click, payme yoki naxt',
	// 		'uz' => 'click, payme ёки нахт',
	// 		'ru' => 'click, payme или наличными'
	// 	],
	// 	'check_all' => [
	// 		'oz' => 'Barchasini belgilash',
	// 		'uz' => 'Барчасини белгилаш',
	// 		'ru' => 'Выбрать все'
	// 	],
	// 	'cust_comp_gov_registration_copy' => [
	// 		'oz' => 'Korxona guvohnomasining nusxasi',
	// 		'uz' => 'Корхона гувоҳномасининг нусхаси',
	// 		'ru' => 'Копия свидетельства компании'
	// 	],
	// 	'cust_comp_director_passport_copy' => [
	// 		'oz' => 'Direktor passport nusxasi',
	// 		'uz' => 'Директор паспорт нусхаси',
	// 		'ru' => 'Копия паспорта директора'
	// 	],
	// 	'quantity' => [
	// 		'oz' => 'Miqdori',
	// 		'uz' => 'Миқдори',
	// 		'ru' => 'Количество'
	// 	],
	// 	'audit_comp_name' => [
	// 		'oz' => 'Auditorlik Kompaniyasi nomi',
	// 		'uz' => 'Аудиторлик Компанияси номи',
	// 		'ru' => 'Название аудиторской компании'
	// 	],
	// 	'audit_comp_gov_reg_date' => [
	// 		'oz' => 'Auditorlik Kompaniyasi ro\'yhatdan o\'tgan sanasi',
	// 		'uz' => 'Аудиторлик Компанияси рўйҳатдан ўтган санаси',
	// 		'ru' => 'Дата регистрации Аудиторской компании'
	// 	],
	// 	'audit_comp_oked' => [
	// 		'oz' => 'OKED',
	// 		'uz' => 'ОКEД',
	// 		'ru' => 'ОКEД'
	// 	],
	// 	'audit_comp_lic_date' => [
	// 		'oz' => 'Sertifikat berilgan sana',
	// 		'uz' => 'Сертификат берилган сана',
	// 		'ru' => 'Дата выдачи Сертификатa'
	// 	],
	// 	'audit_comp_bank_acc' => [
	// 		'oz' => 'Bank hisob raqami',
	// 		'uz' => 'Банк ҳисоб рақами',
	// 		'ru' => 'Банковский счет'
	// 	],
	// 	'audit_comp_director_name' => [
	// 		'oz' => 'Direktor F.I.O.',
	// 		'uz' => 'Директор Ф.И.О.',
	// 		'ru' => 'Ф.И.О Директорa'
	// 	],
	// 	'audit_comp_director_cert_date' => [
	// 		'oz' => 'Direktor sertifikati berilgan sanasi',
	// 		'uz' => 'Директор сертификати берилган санаси',
	// 		'ru' => 'Дата выдачи сертификатa директора'
	// 	],
	// 	'audit_comp_gov_reg_num' => [
	// 		'oz' => 'Auditorlik Kompaniyasi ma\'lumotlari',
	// 		'uz' => 'Аудиторлик Компанияси маъумотлари',
	// 		'ru' => 'Реквизиты аудиторской компании'
	// 	],
	// 	'audit_comp_gov_reg_num' => [
	// 		'oz' => 'Kompaniya ro\'yhatdan o\'tgan sanasi',
	// 		'uz' => 'Компания рўйҳатдан ўтган санаси',
	// 		'ru' => 'Дата регистрации компании'
	// 	],
	// 	'audit_comp_inn' => [
	// 		'oz' => 'Kompaniya INNsi',
	// 		'uz' => 'Компания ИННси',
	// 		'ru' => 'ИНН Компании'
	// 	],
	// 	'audit_comp_lic' => [
	// 		'oz' => 'Kompaniya litsenziya raqami',
	// 		'uz' => 'Компания лицензия рақами',
	// 		'ru' => 'Номер лицензии компании'
	// 	],
	// 	'audit_comp_director_cert_num' => [
	// 		'oz' => 'Auditorlik Kompaniyasi ma\'lumotlari',
	// 		'uz' => 'Аудиторлик Компанияси маъумотлари',
	// 		'ru' => 'Реквизиты аудиторской компании'
	// 	],
	// 	'audit_comp_bank_name' => [
	// 		'oz' => 'Bank nomi',
	// 		'uz' => 'Банк номи',
	// 		'ru' => 'Hазвание банка'
	// 	],
	// 	'audit_comp_bank_mfo' => [
	// 		'oz' => 'MFO',
	// 		'uz' => 'МФО',
	// 		'ru' => 'МФО'
	// 	],
	// 	'audit_comp_info' => [
	// 		'oz' => 'Auditorlik Kompaniyasi ma\'lumotlari',
	// 		'uz' => 'Аудиторлик Компанияси маъумотлари',
	// 		'ru' => 'Реквизиты аудиторской компании'
	// 	],
	// 	'create_blanks' => [
	// 		'oz' => 'Blanka yaratish',
	// 		'uz' => 'Бланка Яратиш',
	// 		'ru' => 'Создать бланк'
	// 	],
	// 	'assign_blanks' => [
	// 		'oz' => 'Blankani biriktirirsh',
	// 		'uz' => 'Бланкани бириктирирш',
	// 		'ru' => 'Назначить бланк'
	// 	],
	// 	'please_try_again' => [
	// 		'oz' => 'Iltimos yana urinib ko\'ring',
	// 		'uz' => 'Илтимос яна уриниб кўринг',
	// 		'ru' => 'Пожалуйста, попробуйте еще раз'
	// 	],
	// 	'passport_number' => [
	// 		'oz' => 'Passport seriyasi va nomeri',
	// 		'uz' => 'Пасспорт серияси ва номериг',
	// 		'ru' => 'Серия и номер паспорта'
	// 	],		
	// 	'region' => [
	// 		'oz' => 'Viloyat',
	// 		'uz' => 'Вилоят',
	// 		'ru' => 'Область'
	// 	],
	// 	'year' => [
	// 		'oz' => 'Yil',
	// 		'uz' => 'Йил',
	// 		'ru' => 'Год'
	// 	],
	// 	'quarter_start' => [
	// 		'oz' => 'Boshlang\'ich kvartal',
	// 		'uz' => 'Бошланғич квартал',
	// 		'ru' => 'Начальный квартал'
	// 	],
	// 	'quarter_finish' => [
	// 		'oz' => 'Tugallovchi kvartal',
	// 		'uz' => 'Тугалловчи квартал',
	// 		'ru' => 'Завершающий квартал'
	// 	],
	// 	'reject' => [
	// 		'oz' => 'Inkor qilish',
	// 		'uz' => 'Инкор қилиш',
	// 		'ru' => 'Отклонить'
	// 	],
	// 	'cust_comp_name' => [
	// 		'oz' => 'Mijoz kompaniya nomi',
	// 		'uz' => 'Мижоз компания номи',
	// 		'ru' => 'Название компании клиента'
	// 	],
	// 	'finished' => [
	// 		'oz' => 'Bajarilgan buyurtmalar',
	// 		'uz' => 'Бажарилган буюртмалар',
	// 		'ru' => 'Законченныe'
	// 	],
	// 	'draft' => [
	// 		'oz' => 'Qoralamalar',
	// 		'uz' => 'Қораламалар',
	// 		'ru' => 'Черновики'
	// 	],
	// 	'rejected' => [
	// 		'oz' => 'Inkor etilgan',
	// 		'uz' => 'Инкор этилган',
	// 		'ru' => 'Отклоненные'
	// 	],
	// 	'sent' => [
	// 		'oz' => 'Jo\'natilgan buyurtmalar',
	// 		'uz' => 'Жўнатилган буюртмалар',
	// 		'ru' => 'Отправленные'
	// 	],
	// 	'sentToAdmin' => [
	// 		'oz' => "adminga jo'natilgan",
	// 		'uz' => 'админга жўнатилган',
	// 		'ru' => 'отправлено админу'
	// 	],
	// 	'accept_and_pay' => [
	// 		'oz' => 'Qabul qilish va to\'lash',
	// 		'uz' => 'Қабул қилиш ва тўлаш',
	// 		'ru' => 'Принять и оплатить'
	// 	],
	// 	'pay' => [
	// 		'oz' => 'To\'lash',
	// 		'uz' => 'Тўлаш',
	// 		'ru' => 'Платить'
	// 	],
	// 	'already_accepted' => [
	// 		'oz' => 'Siz allaqachon xulosani qabul qilgansiz',
	// 		'uz' => 'Сиз аллақачон хулосани қабул қилгансиз',
	// 		'ru' => 'Вы уже приняли заключение'
	// 	],
	// 	'accepted' => [
	// 		'oz' => 'qabul qilingan',
	// 		'uz' => 'қабул қилинган',
	// 		'ru' => 'принято'
	// 	],
	// 	'cancel' => [
	// 		'oz' => 'Ortga qaytish',
	// 		'uz' => 'Ортга қайтиш',
	// 		'ru' => 'назад'
	// 	],
	// 	'fucking_reason' => [
	// 		'oz' => 'Sabab',
	// 		'uz' => 'Сабаб',
	// 		'ru' => 'Причина'
	// 	],
	// 	'type_fucking_reason' => [
	// 		'oz' => 'Iltimos, xulosani rad etish sababini yozing.',
	// 		'uz' => 'Илтимос, хулосани рад этиш сабабини ёзинг.',
	// 		'ru' => 'Введите причину, по которой вы отклоняете заключение.'
	// 	],
	// 	'anything' => [
	// 		'oz' => 'anything',
	// 		'uz' => 'anything',
	// 		'ru' => 'anything'
	// 	],
	// 	'welcome' => [
	// 		'oz' => 'Xush kelibsiz',
	// 		'uz' => 'Хуш келибсиз',
	// 		'ru' => 'Добро пожаловать'
	// 	],
	// 	'registered' => [
	// 		'oz' => 'Siz ro\'yxatdan o\'tganmisiz?',
	// 		'uz' => 'Сиз рўйхатдан ўтганмисиз?',
	// 		'ru' => 'Уже зарегистрированы?'
	// 	],
	// 	'login' => [
	// 		'oz' => 'Kirish',
	// 		'uz' => 'Кириш',
	// 		'ru' => 'Войти'
	// 	],
	// 	'user' => [
	// 		'oz' => 'Mijoz',
	// 		'uz' => 'Мижоз',
	// 		'ru' => 'Клиент'
	// 	],
	// 	'customer' => [
	// 		'oz' => 'Mijoz',
	// 		'uz' => 'Мижоз',
	// 		'ru' => 'Клиент'
	// 	],
	// 	'agent' => [
	// 		'oz' => 'Agent',
	// 		'uz' => 'Агент',
	// 		'ru' => 'Агент'
	// 	],
	// 	'asUser' => [
	// 		'oz' => 'Mijoz sifatida ro\'yhatdan o\'tish',
	// 		'uz' => 'Мижоз сифатида рўйҳатдан ўтиш',
	// 		'ru' => 'Зарегистрируйтесь как клиент'
	// 	],
	// 	'createUser' => [
	// 		'oz' => 'Foydalanuvchi yaratish',
	// 		'uz' => 'Фойдаланувчи яратиш',
	// 		'ru' => 'Создать пользователя'
	// 	],
	// 	'name' => [
	// 		'oz' => 'Ism',
	// 		'uz' => 'Исм',
	// 		'ru' => 'Имя'
	// 	],
	// 	'surname' => [
	// 		'oz' => 'Familiya',
	// 		'uz' => 'Фамилия',
	// 		'ru' => 'Фамилия'
	// 	],
	// 	'patronymic' => [
	// 		'oz' => 'Otangizni ismi',
	// 		'uz' => 'Отангизни исми',
	// 		'ru' => 'Отчество'
	// 	],
	// 	'userPatronymic' => [
	// 		'oz' => 'Otansining ismi',
	// 		'uz' => 'Отасининг исми',
	// 		'ru' => 'Отчество'
	// 	],
	// 	'phoneNumber' => [
	// 		'oz' => 'Telefon raqamingiz',
	// 		'uz' => 'Телефон рақамингиз',
	// 		'ru' => 'Телефонный номер'
	// 	],
	// 	'verificationCode' => [
	// 		'oz' => 'Tasdiqlash kodi',
	// 		'uz' => 'Тасдиқлаш коди',
	// 		'ru' => 'Ваш проверочный код'
	// 	],
	// 	'sendConfirmation' => [
	// 		'oz' => 'Tasdiqlash uchun yuborish',
	// 		'uz' => 'Тасдиқлаш учун юбориш',
	// 		'ru' => 'Отправить подтверждение'
	// 	],
	// 	'anotherPhoneNumber' => [
	// 		'oz' => 'Telefon raqami',
	// 		'uz' => 'Телефон рақами',
	// 		'ru' => 'Номер телефона'
	// 	],
	// 	'phone' => [
	// 		'oz' => 'Telefon raqami',
	// 		'uz' => 'Телефон рақами',
	// 		'ru' => 'Номер телефона'
	// 	],
	// 	'password' => [
	// 		'oz' => 'Parol',
	// 		'uz' => 'Парол',
	// 		'ru' => 'Парол'
	// 	],
	// 	'register' => [
	// 		'oz' => "Ro'yxatdan o'tish",
	// 		'uz' => 'Рўйхатдан ўтиш',
	// 		'ru' => 'Регистрация'
	// 	],
	// 	'restorePassword' => [
	// 		'oz' => "Parolni tiklash",
	// 		'uz' => 'Паролни тиклаш',
	// 		'ru' => 'Восстановить пароль'
	// 	],
	// 	'asAgent' => [
	// 		'oz' => "Mijoz sifatida ro'yhatdan o'tish",
	// 		'uz' => 'Мижоз сифатида рўйҳатдан ўтиш',
	// 		'ru' => 'Зарегистрируйтесь как клиент'
	// 	],
	// 	'passportCopy' => [
	// 		'oz' => "Pasport nusxasi",
	// 		'uz' => 'Паспорт нусхаси',
	// 		'ru' => 'Паспорт копия'
	// 	],
	// 	'pay' => [
	// 		'oz' => "To'lash",
	// 		'uz' => 'Тўлаш',
	// 		'ru' => 'ОПЛАТИТЬ'
	// 	],
	// 	'upload' => [
	// 		'oz' => "Yuklash",
	// 		'uz' => 'Юклаш',
	// 		'ru' => 'Загрузить'
	// 	],
	// 	'inn' => [
	// 		'oz' => "INN",
	// 		'uz' => 'ИНН',
	// 		'ru' => 'ИНН'
	// 	],
	// 	'cust_comp_name' => [
	// 		'oz' => "Korxona Nome",
	// 		'uz' => 'Korxona Nome',
	// 		'ru' => 'Название компании клиента'
	// 	],
	// 	'cust_comp_inn' => [
	// 		'oz' => "Korxona INNsi",
	// 		'uz' => 'Korxona INNsi',
	// 		'ru' => 'Предприятие ИНН'
	// 	],
	// 	'auditCompInn' => [
	// 		'oz' => "Auditorlik korxonasining INNsi",
	// 		'uz' => 'Аудиторлик корхонасининг ИННси',
	// 		'ru' => 'ИНН аудиторской компании'
	// 	],
	// 	'custCompInn' => [
	// 		'oz' => "Mijoz korxonasining INNsi",
	// 		'uz' => 'Мижоз корхонасининг ИННси',
	// 		'ru' => 'ИНН компании клиента'
	// 	],
	// 	'auditCompOked' => [
	// 		'oz' => "Auditorlik korxonasining OKEDi",
	// 		'uz' => 'Аудиторлик корхонасининг ОКEДи',
	// 		'ru' => 'ОКЭД аудиторской компании'
	// 	],
	// 	'custCompOked' => [
	// 		'oz' => "Mijoz korxonasining OKEDi",
	// 		'uz' => 'Мижоз корхонасининг ОКEДи',
	// 		'ru' => 'ОКЭД компании клиента'
	// 	],
	// 	'auditCompLicense' => [
	// 		'oz' => "Audit korxonasining litsenziya raqami",
	// 		'uz' => 'Аудит корхонасининг лицензия рақами',
	// 		'ru' => 'Номер Лицензии Аудиторской Компании'
	// 	],
	// 	'auditCompLicenseDate' => [
	// 		'oz' => "Audit korxonasining litsenziyasi ro'yxatdan o'tgan sanasi",
	// 		'uz' => 'Аудит корхонасининг лицензияси рўйхатдан ўтган санаси',
	// 		'ru' => 'Дата регистрации лицензии аудиторской компании'
	// 	],
	// 	'auditCompName' => [
	// 		'oz' => "Audit korxonasining nomi",
	// 		'uz' => 'Аудит корхонасининг номи',
	// 		'ru' => 'Наименование аудиторской компании'
	// 	],
	// 	'auditCompBank' => [
	// 		'oz' => "Audit korxonasining bank nomi",
	// 		'uz' => 'Аудит корхонасининг банк номи',
	// 		'ru' => 'Наименование банка аудиторской компании'
	// 	],
	// 	'custCompBank' => [
	// 		'oz' => "Mijoz korxonasining bank nomi",
	// 		'uz' => 'Мижоз корхонасининг банк номи',
	// 		'ru' => 'Название банка компании клиента'
	// 	],
	// 	'auditCompBankAccount' => [
	// 		'oz' => "Audit korxonasining bank hisob raqami",
	// 		'uz' => 'Аудит корхонасининг банк ҳисоб рақами',
	// 		'ru' => 'Банковский счет аудиторской компании'
	// 	],
	// 	'auditCompBankMfo' => [
	// 		'oz' => "Audit korxonasining bank MFOsi",
	// 		'uz' => 'Аудит корхонасининг банк МФОси',
	// 		'ru' => 'МФО Банка аудиторской компании'
	// 	],
	// 	'custCompBankMfo' => [
	// 		'oz' => "Mijoz korxonasining bank MFOsi",
	// 		'uz' => 'Мижоз корхонасининг банк МФОси',
	// 		'ru' => 'Банковский МФО компании клиента'
	// 	],
	// 	'auditCompDirector' => [
	// 		'oz' => "Audit korxonasining direkotori F.I.Osi",
	// 		'uz' => 'Аудит корхонасининг дирекотори Ф.И.Оси',
	// 		'ru' => 'Ф.И.О директора аудиторской компании'
	// 	],
	// 	'auditCompDirectorLicenseNum' => [
	// 		'oz' => "Audit korxonasi direkotorining sertifikat raqami",
	// 		'uz' => 'Аудит корхонаси дирекоторининг сертификат рақами',
	// 		'ru' => 'Номер сертификата директора аудиторской компании'
	// 	],
	// 	'auditCompDirectorLicenseDate' => [
	// 		'oz' => "Audit korxonasi direkotorining sertifikat berilgan sanasi",
	// 		'uz' => 'Аудит корхонаси дирекоторининг сертификат берилган санаси',
	// 		'ru' => 'Дата сертификата директора аудиторской компании'
	// 	],
	// 	'custCompDirector' => [
	// 		'oz' => "Mijoz korxonasining direkotori F.I.Osi",
	// 		'uz' => 'Мижоз корхонасининг дирекотори Ф.И.Оси',
	// 		'ru' => 'Ф.И.О Директора Компании Клиента'
	// 	],
	// 	'custCompActivity' => [
	// 		'oz' => "Mijoz kompaniyasining faoliyati",
	// 		'uz' => 'Мижоз компаниясининг фаолияти',
	// 		'ru' => 'Деятельность Компании-Заказчика'
	// 	],
	// 	'requiredDocs' => [
	// 		'oz' => "Kerakli hujjatlar",
	// 		'uz' => 'Керакли ҳужжатлар',
	// 		'ru' => 'Необходимые документы'
	// 	],
	// 	'auditCompGovNumber' => [
	// 		'oz' => "Auditorlik korxonasining davlat ro'yxatidan o'tgan raqami",
	// 		'uz' => 'Аудиторлик корхонасининг давлат рўйхатидан ўтган рақами',
	// 		'ru' => 'Государственный Регистрационный Номер Аудиторской Компании'
	// 	],
	// 	'sertificateNumber' => [
	// 		'oz' => "Sertifikat raqami",
	// 		'uz' => 'Сертификат рақами',
	// 		'ru' => 'Номер сертификата'
	// 	],
	// 	'sertificateSerie' => [
	// 		'oz' => "Sertifikat seriyasi",
	// 		'uz' => 'Сертификат серияси',
	// 		'ru' => 'Серия сертификата'
	// 	],
	// 	'city' => [
	// 		'oz' => "Shaxar",
	// 		'uz' => 'Шахар',
	// 		'ru' => 'Регион'
	// 	],
	// 	'district' => [
	// 		'oz' => "Tuman",
	// 		'uz' => 'Туман',
	// 		'ru' => 'Район'
	// 	],
	// 	'address' => [
	// 		'oz' => "Manzil",
	// 		'uz' => 'Манзил',
	// 		'ru' => 'Адрес'
	// 	],
	// 	'address_to_deliver' => [
	// 		'oz' => "Manzil",
	// 		'uz' => 'Манзил',
	// 		'ru' => 'Адрес'
	// 	],
	// 	'cust_comp_address' => [
	// 		'oz' => "Manzil",
	// 		'uz' => 'Манзил',
	// 		'ru' => 'Адрес'
	// 	],
	// 	'deliverAddress' => [
	// 		'oz' => "Yetkazib berish manzili",
	// 		'uz' => 'Етказиб бериш манзили',
	// 		'ru' => 'Адрес для доставки'
	// 	],
	// 	'custCompAddress' => [
	// 		'oz' => "Mijoz korxonasi manzili",
	// 		'uz' => 'Мижоз корхонаси манзили',
	// 		'ru' => 'Адрес Компании Клиента'
	// 	],
	// 	'agree' => [
	// 		'oz' => "Roziman",
	// 		'uz' => 'Розиман',
	// 		'ru' => 'Согласен'
	// 	],
	// 	'htmlLang' => [
	// 		'oz' => "uz",
	// 		'uz' => 'uz',
	// 		'ru' => 'ru'
	// 	],
	// 	'lang' => [
	// 		'oz' => "Til",
	// 		'uz' => 'Тил',
	// 		'ru' => 'Язык'
	// 	],
	// 	'users' => [
	// 		'oz' => "Foydalanuvchilar",
	// 		'uz' => 'Фойдаланувчилар',
	// 		'ru' => 'Пользователи'
	// 	],
	// 	'orders' => [
	// 		'oz' => "Buyurtmalar",
	// 		'uz' => 'Буюртмалар',
	// 		'ru' => 'Заказы'
	// 	],
	// 	'order' => [
	// 		'oz' => "Buyurtma",
	// 		'uz' => 'Буюртма',
	// 		'ru' => 'Заказ'
	// 	],
	// 	'conclusions' => [
	// 		'oz' => "Xulosalar",
	// 		'uz' => 'Хулосалар',
	// 		'ru' => 'Заключении'
	// 	],
	// 	'newConclusion' => [
	// 		'oz' => "Xulosa yaratish",
	// 		'uz' => 'Хулоса яратиш',
	// 		'ru' => 'Создать Заключении'
	// 	],
	// 	'conclusion' => [
	// 		'oz' => "Xulosa",
	// 		'uz' => 'Хулоса',
	// 		'ru' => 'Заключение'
	// 	],
	// 	'adminPanel' => [
	// 		'oz' => "Administrator paneli",
	// 		'uz' => 'Администратор панели',
	// 		'ru' => 'Панель администратора'
	// 	],
	// 	'logout' => [
	// 		'oz' => "Chiqish",
	// 		'uz' => 'Чиқиш',
	// 		'ru' => 'Выйти'
	// 	],
	// 	'mchj' => [
	// 		'oz' => "MCHJ",
	// 		'uz' => 'МЧЖ',
	// 		'ru' => 'OOO'
	// 	],
	// 	'sidebarBg' => [
	// 		'oz' => "Yon panel foni",
	// 		'uz' => 'Ён панел фони',
	// 		'ru' => 'Фон боковой панели'
	// 	],
	// 	'light' => [
	// 		'oz' => "Oq",
	// 		'uz' => 'Оқ',
	// 		'ru' => 'Белый'
	// 	],
	// 	'dark' => [
	// 		'oz' => "Qora",
	// 		'uz' => 'Қора',
	// 		'ru' => 'Темно'
	// 	],
	// 	'fio' => [
	// 		'oz' => "F.I.O",
	// 		'uz' => 'Ф.И.О',
	// 		'ru' => 'Ф.И.О'
	// 	],
	// 	'role' => [
	// 		'oz' => "Rol",
	// 		'uz' => 'Рол',
	// 		'ru' => 'Роль'
	// 	],
	// 	'admin' => [
	// 		'oz' => "Admin",
	// 		'uz' => 'Aдмин',
	// 		'ru' => 'Aдмин'
	// 	],
	// 	'auditor' => [
	// 		'oz' => "Auditor",
	// 		'uz' => 'Аудитор',
	// 		'ru' => 'Аудитор'
	// 	],
	// 	'search' => [
	// 		'oz' => "Qidiruv",
	// 		'uz' => 'Қидирув',
	// 		'ru' => 'Поиск'
	// 	],
	// 	'create' => [
	// 		'oz' => "Yaratish",
	// 		'uz' => 'Яратиш',
	// 		'ru' => 'Создать'
	// 	],
	// 	'id' => [
	// 		'oz' => "ID",
	// 		'uz' => 'Ид',
	// 		'ru' => 'Ид'
	// 	],
	// 	'fund' => [
	// 		'oz' => "PUL MIQDORI",
	// 		'uz' => 'ПУЛ МИҚДОРИ',
	// 		'ru' => 'СУММА ДЕНЕГ'
	// 	],
	// 	'show' => [
	// 		'oz' => "Ko'rish",
	// 		'uz' => 'Кўриш',
	// 		'ru' => 'ПОКАЗАТЬ'
	// 	],
	// 	'showConclusion' => [
	// 		'oz' => "Xulosani ko'rish",
	// 		'uz' => 'Хулосани кўриш',
	// 		'ru' => 'ПОСМОТРЕТЬ ЗАКЛЮЧЕНИЕ'
	// 	],
	// 	'standartNumber' => [
	// 		'oz' => "SHABLON STANDART RAQAMI",
	// 		'uz' => 'ШАБЛОН СТАНДАРТ РАҚАМИ',
	// 		'ru' => 'СТАНДАРТНЫЙ НОМЕР ШАБЛОНА'
	// 	],
	// 	'message' => [
	// 		'oz' => "xabar",
	// 		'uz' => 'xaбaр',
	// 		'ru' => 'сообщение'
	// 	],
	// 	'status' => [
	// 		'oz' => "HOLATI",
	// 		'uz' => 'ҲОЛАТИ',
	// 		'ru' => 'СТАТУС'
	// 	],
	// 	'active' => [
	// 		'oz' => "Faol",
	// 		'uz' => 'Фаол',
	// 		'ru' => 'Активный'
	// 	],
	// 	'inactive' => [
	// 		'oz' => "Nofaol",
	// 		'uz' => 'Нофаол',
	// 		'ru' => 'Неактивный'
	// 	],
	// 	'userAgrement' => [
	// 		'oz' => "Sistemadan foydalanish shartlari",
	// 		'uz' => 'Системадан фойдаланиш шартлари',
	// 		'ru' => 'Условия использования политика конфиденциальности'
	// 	],
	// 	'enterCode' => [
	// 		'oz' => "Iltimos, tasdiqlash kodini kiriting",
	// 		'uz' => 'Илтимос, тасдиқлаш кодини киритинг',
	// 		'ru' => 'Пожалуйста, введите проверочный код'
	// 	],
	// 	'cust_comp_activity' => [
	// 		'oz' => "Korxona holati",
	// 		'uz' => 'Корхона ҳолати',
	// 		'ru' => 'Предприятие статус'
	// 	],
	// 	'createdDate' => [
	// 		'oz' => "Yaratilgan sanasi",
	// 		'uz' => 'Яратилган санаси',
	// 		'ru' => 'ДАТА СОЗДАНИЯ'
	// 	],
	// 	'created' => [
	// 		'oz' => "Yaratilgan",
	// 		'uz' => 'Яратилган',
	// 		'ru' => 'Создан'
	// 	],
	// 	'created_at' => [
	// 		'oz' => "Yaratilgan sanasi",
	// 		'uz' => 'Яратилган санаси',
	// 		'ru' => 'ДАТА СОЗДАНИЯ'
	// 	],
	// 	'bill' => [
	// 		'oz' => "Hisob",
	// 		'uz' => 'Ҳисоб',
	// 		'ru' => 'Счет'
	// 	],
	// 	'myConclusions' => [
	// 		'oz' => "Mening Xulosalarim",
	// 		'uz' => 'Мени хулосаларим',
	// 		'ru' => 'Мои заключены'
	// 	],
	// 	'auditorPanel' => [
	// 		'oz' => "Auditor paneli",
	// 		'uz' => 'Аудитор панели',
	// 		'ru' => 'ПАНЕЛЬ аудиторa'
	// 	],
	// 	'agentPanel' => [
	// 		'oz' => "Agent paneli",
	// 		'uz' => 'Агент панели',
	// 		'ru' => 'Агент панель'
	// 	],
	// 	'customerPanel' => [
	// 		'oz' => "Mijoz paneli",
	// 		'uz' => 'Мижоз панели',
	// 		'ru' => 'Панель клиента'
	// 	],
	// 	'useCases' => [
	// 		'oz' => "Foydalanish turi",
	// 		'uz' => 'Фойдаланиш тури',
	// 		'ru' => 'ВАРИАНТ ИСПОЛЬЗОВАНИЯ'
	// 	],
	// 	'date' => [
	// 		'oz' => "Sana",
	// 		'uz' => 'Сана',
	// 		'ru' => 'ДАТА'
	// 	],
	// 	'activity' => [
	// 		'oz' => "Operatsiyalar",
	// 		'uz' => 'Операциялар',
	// 		'ru' => 'ДЕЙСТВИЯ'
	// 	],
	// 	'send' => [
	// 		'oz' => "Jo'natish",
	// 		'uz' => 'Жўнатиш',
	// 		'ru' => 'Отправить'
	// 	],
	// 	'sent' => [
	// 		'oz' => "Jo'natilgan",
	// 		'uz' => 'Жўнатилган',
	// 		'ru' => 'посланный'
	// 	],
	// 	'myOrders' => [
	// 		'oz' => "Mening buyurtmalarim",
	// 		'uz' => 'Менинг буюртмаларим',
	// 		'ru' => 'Мои заказы'
	// 	],
	// 	'template' => [
	// 		'oz' => "Shablon",
	// 		'uz' => 'ШАБЛОН',
	// 		'ru' => 'ШАБЛОН'
	// 	],
	// 	'templateNum' => [
	// 		'oz' => "Shablon raqami",
	// 		'uz' => 'Шаблон рақами',
	// 		'ru' => 'Номер шаблона'
	// 	],
	// 	'forWhat' => [
	// 		'oz' => "Nima uchun?",
	// 		'uz' => 'Нима учун?',
	// 		'ru' => 'Для чего?'
	// 	],
	// 	'for' => [
	// 		'oz' => "Nima uchun",
	// 		'uz' => 'Нима учун',
	// 		'ru' => 'Для'
	// 	],
	// 	'details' => [
	// 		'oz' => "Tafsilotlar",
	// 		'uz' => 'Тафсилотлар',
	// 		'ru' => 'Подробности'
	// 	],
	// 	'orderDetails' => [
	// 		'oz' => "Buyurtma haqida ma'lumot",
	// 		'uz' => 'Буюртма ҳақида маълумот',
	// 		'ru' => 'Информация о заказе'
	// 	],
	// 	'clientInfo' => [
	// 		'oz' => "Mijoz haqida ma'lumot",
	// 		'uz' => 'Мижоз ҳақида маълумот',
	// 		'ru' => 'Информация о клиенте'
	// 	],
	// 	'passportSeries' => [
	// 		'oz' => "Pasport seriya",
	// 		'uz' => 'Паспорт серия',
	// 		'ru' => 'Паспортная серия'
	// 	],
	// 	'cust_comp_gov_reg_date' => [
	// 		'oz' => "Ro'yxatdan o'tgan sanasi",
	// 		'uz' => 'Рўйхатдан ўтган санаси',
	// 		'ru' => 'Дата регистрации'
	// 	],
	// 	'cust_comp_bank_name' => [
	// 		'oz' => "Bank",
	// 		'uz' => 'Банк',
	// 		'ru' => 'Банк'
	// 	],
	// 	'cust_comp_bank_acc' => [
	// 		'oz' => "Mijoz korxonasining bank hisobvarag'i",
	// 		'uz' => 'Мижоз корхонасининг банк ҳисобварағи',
	// 		'ru' => 'Банковский счет компании клиента'
	// 	],
	// 	'cust_comp_bank_mfo' => [
	// 		'oz' => "Bank MFO",
	// 		'uz' => 'Банк МФО',
	// 		'ru' => 'Банк МФО'
	// 	],
	// 	'cust_comp_oked' => [
	// 		'oz' => "OKED",
	// 		'uz' => 'ОКЕД',
	// 		'ru' => 'ОКЕД'
	// 	],
	// 	'cust_comp_director_name' => [
	// 		'oz' => "Korxona direktori",
	// 		'uz' => 'Корхона директори',
	// 		'ru' => 'Директор предприятие'
	// 	],
	// 	'cust_comp_activity' => [
	// 		'oz' => "Korxona direktori",
	// 		'uz' => 'Корхона директори',
	// 		'ru' => 'Директор предприятие'
	// 	],
	// 	'write_conc_for_this' => [
	// 		'oz' => "Ushbu buyurtma asosida xulosa yozish",
	// 		'uz' => 'Ушбу буюртма асосида хулоса ёзинг',
	// 		'ru' => 'Напишите заключение на основании этого приказа'
	// 	],
	// 	'cust_comp_gov_reg_num' => [
	// 		'oz' => "Mijoz korxonasining davlat ro'yxatidan o'tkgan raqami",
	// 		'uz' => 'Мижоз корхонасининг давлат рўйхатидан ўткган рақами',
	// 		'ru' => 'Государственный регистрационный номер компании заказчика'
	// 	],
	// 	'Форма 1' => [
	// 		'oz' => "Forma 1",
	// 		'uz' => 'Форма 1',
	// 		'ru' => 'Форма 1'
	// 	],
	// 	'Форма 2' => [
	// 		'oz' => "Forma 2",
	// 		'uz' => 'Форма 2',
	// 		'ru' => 'Форма 2'
	// 	],
	// 	'Forma 1' => [
	// 		'oz' => "Forma 1",
	// 		'uz' => 'Форма 1',
	// 		'ru' => 'Форма 1'
	// 	],
	// 	'Forma 2' => [
	// 		'oz' => "Forma 2",
	// 		'uz' => 'Форма 2',
	// 		'ru' => 'Форма 2'
	// 	],
	// 	'newOrder' => [
	// 		'oz' => "Yangi buyurtma",
	// 		'uz' => 'Янги буюртма',
	// 		'ru' => 'Новый заказ'
	// 	],
	// 	'newPassword' => [
	// 		'oz' => "Yangi parol",
	// 		'uz' => 'Янги парол',
	// 		'ru' => 'Новый пароль'
	// 	],
	// 	'typeNewPassword' => [
	// 		'oz' => "Yangi parolni kiriting",
	// 		'uz' => 'Янги паролни киритинг',
	// 		'ru' => 'Введите новый пароль'
	// 	],
	// 	'basicInfo' => [
	// 		'oz' => "Asosiy malumotlar",
	// 		'uz' => 'Асосий малумотлар',
	// 		'ru' => 'Базовая информация'
	// 	],
	// 	'structuredPhone' => [
	// 		'oz' => "998971112233 shaklidagi telefon raqami, + belgisiz",
	// 		'uz' => '998971112233 шаклидаги телефон рақами, + белгисиз',
	// 		'ru' => 'Номер телефона, в виде 998971112233, без знака +'
	// 	],
	// 	'sentOrder' => [
	// 		'oz' => "Jo'natilgan buyurtma",
	// 		'uz' => 'Жўнатилган буюртма',
	// 		'ru' => 'Отправленные заказы'
	// 	],
	// 	'draftOrder' => [
	// 		'oz' => "Qoralamalar",
	// 		'uz' => 'Қораламалар',
	// 		'ru' => 'Черновики'
	// 	],
	// 	'recievedOrder' => [
	// 		'oz' => "Qabul qlingan xulosalar",
	// 		'uz' => 'Қабул қлинган хулосалар',
	// 		'ru' => 'Полученные заключения'
	// 	],
	// 	'rejectedOrders' => [
	// 		'oz' => "Inkor qilingan xulosalar",
	// 		'uz' => 'Инкор қилинган хулосалар',
	// 		'ru' => 'Отклоненные заключения'
	// 	],
	// 	'assign' => [
	// 		'oz' => "Biriktirmoq",
	// 		'uz' => 'Бириктирмоқ',
	// 		'ru' => 'Назначать'
	// 	],
	// 	'fillData' => [
	// 		'oz' => "Iltimos, foydalanuvchi ma'lumotlarini to'ldiring",
	// 		'uz' => 'Илтимос, фойдаланувчи маълумотларини тўлдиринг',
	// 		'ru' => 'Пожалуйста, заполните данные пользователя'
	// 	],
	// 	'certificateDate' => [
	// 		'oz' => "Sertifikat berilgan sanasi",
	// 		'uz' => 'Сертификат берилган санаси',
	// 		'ru' => 'Дата сертификата'
	// 	],
	// 	'addressLine' => [
	// 		'oz' => "Ko'cha / uy (kvartira)",
	// 		'uz' => 'Кўча / уй (квартира)',
	// 		'ru' => 'Улица / дом (квартира)'
	// 	],
	// 	'save' => [
	// 		'oz' => "Saqlash",
	// 		'uz' => 'Сақлаш',
	// 		'ru' => 'Сохранить'
	// 	],
	// 	'save' => [
	// 		'oz' => "Saqlash",
	// 		'uz' => 'Сақлаш',
	// 		'ru' => 'Сохранить'
	// 	],
	// 	'draft' => [
	// 		'oz' => "Saqlash",
	// 		'uz' => 'Сақлаш',
	// 		'ru' => 'Сохранить'
	// 	],
	// 	'select' => [
	// 		'oz' => "Tanlang",
	// 		'uz' => 'Танланг',
	// 		'ru' => 'Выбрать'
	// 	],
	// 	'selectTemplate' => [
	// 		'oz' => "Iltimos, Shablonni tanlang",
	// 		'uz' => 'Илтимос, Шаблонни танланг',
	// 		'ru' => 'Пожалуйста, выберите шаблон'
	// 	],
	// 	'templateUseCase' => [
	// 		'oz' => "Iltimos, foydalanish turini tanlang:",
	// 		'uz' => 'Илтимос, фойдаланиш турини танланг:',
	// 		'ru' => 'Пожалуйста, выберите вариант использования:'
	// 	],
	// 	'Tender' => [
	// 		'oz' => "Tender",
	// 		'uz' => 'Тендер',
	// 		'ru' => 'Тендер'
	// 	],
	// 	'Тендер' => [
	// 		'oz' => "Tender",
	// 		'uz' => 'Тендер',
	// 		'ru' => 'Тендер'
	// 	],
	// 	'Kredit' => [
	// 		'oz' => "Kredit",
	// 		'uz' => 'Кредит',
	// 		'ru' => 'Кредит'
	// 	],
	// 	'editProfile' => [
	// 		'oz' => "Profilni tahrirlash",
	// 		'uz' => 'Профилни таҳрирлаш',
	// 		'ru' => 'Редактировать профиль'
	// 	],
	// 	"moliyaviy hisobot bo'yicha fikr" => [
	// 		'oz' => "Moliyaviy hisobot bo'yicha fikr",
	// 		'uz' => 'Молиявий ҳисобот бўйича фикр',
	// 		'ru' => 'Заключение по финансовой отчетности'
	// 	],
	// 	'continue' => [
	// 		'oz' => "Davom etish",
	// 		'uz' => 'Давом этиш',
	// 		'ru' => 'Продолжать'
	// 	],
	// 	'mail' => [
	// 		'oz' => "Elektron pochta manzili",
	// 		'uz' => 'Электрон почта манзили',
	// 		'ru' => 'Адрес электронной почты'
	// 	],
	// 	'uz' => [
	// 		'oz' => "O'zbek",
	// 		'uz' => 'Ўзбек',
	// 		'ru' => 'Узбекский'
	// 	],
	// 	'ru' => [
	// 		'oz' => "Ruscha",
	// 		'uz' => 'Русча',
	// 		'ru' => 'Русский'
	// 	],
	// 	'companyName' => [
	// 		'oz' => "Korxona Nomi",
	// 		'uz' => 'Корхона Номи',
	// 		'ru' => 'Наименование Компания'
	// 	],
	// 	'govRegDate' => [
	// 		'oz' => "Auditorlik korxonasining davlat ro'yxatidan o'tkazilgan sanasi",
	// 		'uz' => 'Аудиторлик корхонасининг давлат рўйхатидан ўтказилган санаси',
	// 		'ru' => 'Дата государственной регистрации аудиторской компании'
	// 	],
	// 	'userCompGovRegDate' => [
	// 		'oz' => "Mijoz korxonasining davlat ro'yxatidan o'tkazilgan sanasi",
	// 		'uz' => 'Мижоз корхонасининг давлат рўйхатидан ўтказилган санаси',
	// 		'ru' => 'Дата государственной регистрации компании заказчика'
	// 	],
	// 	'basicConclusions' => [
	// 		'oz' => "Asosiy xulosa",
	// 		'uz' => 'Асосий хулоса',
	// 		'ru' => 'Базовая заключения'
	// 	],
	// 	'next' => [
	// 		'oz' => "Keyingi",
	// 		'uz' => 'Кейинги',
	// 		'ru' => 'Следующий'
	// 	],
	// 	'previous' => [
	// 		'oz' => "Orqaga",
	// 		'uz' => 'Орқага',
	// 		'ru' => 'Предыдущий'
	// 	],
	// 	'saveDraft' => [
	// 		'oz' => "Qoralama sifatida saqlash",
	// 		'uz' => 'Қоралама сифатида сақлаш',
	// 		'ru' => 'Сохранить как черновик'
	// 	],
	// 	'saveAndSubmit' => [
	// 		'oz' => "Saqlang va yuboring",
	// 		'uz' => 'Сақланг ва юборинг',
	// 		'ru' => 'Сохранить и отправить'
	// 	],
	// 	'submit' => [
	// 		'oz' => "Jo'natish",
	// 		'uz' => 'Жўнатиш',
	// 		'ru' => 'Отправить'
	// 	],
	// 	'custInfo' => [
	// 		'oz' => "Mijoz malumotlari",
	// 		'uz' => 'Мижоз малумотлари',
	// 		'ru' => 'Информация о клиенте'
	// 	],
	// 	'custCompInfo' => [
	// 		'oz' => "Mijoz korxonasi haqida malumot",
	// 		'uz' => 'Мижоз корхонаси ҳақида малумот',
	// 		'ru' => 'Информация о компании клиента'
	// 	],
	// 	'profile' => [
	// 		'oz' => "Profil",
	// 		'uz' => 'Профил',
	// 		'ru' => 'Профиль'
	// 	],
	// 	'cust_comp_name' => [
	// 		'oz' => "Kompaniya nomi",
	// 		'uz' => 'Компания номи',
	// 		'ru' => 'Имя компания'
	// 	],
	// 	'cust_comp_registered_by' => [
	// 		'oz' => "Kompaniya (kim, nima) tomonidan ro'yhatga olingan ",
	// 		'uz' => 'Компания (ким, нима) томонидан рўйхатга олинган',
	// 		'ru' => 'Зарегистрировано компанией (кто, что)'
	// 	],
	// 	'select' => [
	// 		'oz' => "Tanlash ",
	// 		'uz' => 'Танлаш',
	// 		'ru' => 'Выбрать'
	// 	],
	// 	'long_term_liabilities' => [
	// 		'oz' => 'Uzoq muddatli majburiyatlar',
	// 		'uz' => 'Узоқ муддатли мажбуриятлар',
	// 		'ru' => 'Долгосрочные обязательства'
	// 	],
	// 	'current_actives' => [
	// 		'oz' => 'Joriy (aylanma) aktivlar',
	// 		'uz' => 'Жорий (айланма) активлар',
	// 		'ru' => 'Текущие (оборотные) активы'
	// 	],
	// 	'current_obligation' => [
	// 		'oz' => 'Majburiyatlar',
	// 		'uz' => 'Мажбуриятлар',
	// 		'ru' => 'Обязательства'
	// 	],
	// 	'long_term_actives' => [
	// 		'oz' => 'Uzoq muddatli aktivlar',
	// 		'uz' => 'Узоқ муддатли активлар',
	// 		'ru' => 'Долгосрочные активы'
	// 	],
	// 	'sources_of_own_funds' => [
	// 		'oz' => 'O\'z mablag\'lari manbalari',
	// 		'uz' => 'Ўз маблағлари манбалари',
	// 		'ru' => 'Источники собственных средств'
	// 	],
	// 	'long_term_loans' => [
	// 		'oz' => 'Uzoq muddatli kreditlar va kreditlar',
	// 		'uz' => 'Узоқ муддатли кредитлар ва кредитлар',
	// 		'ru' => 'Долгосрочные займы и кредиты'
	// 	],
	// 	'user_funds'=>[
	// 		'oz' => 'Hisobingizda: ',
	// 		'uz' => 'Ҳисобингизда: ',
	// 		'ru' => 'На счету: '
	// 	],
	// 	'fill_balance'=>[
	// 		'oz' => 'Hisobingizni to\'ldiring',
	// 		'uz' => 'Ҳисобингизни тўлдиринг',
	// 		'ru' => ' Пополнить счет'
	// 	],
	// 	'min_sum'=>[
	// 		'oz' => 'Minimal summa',
	// 		'uz' => 'Минимал сумма',
	// 		'ru' => ' Минимальная сумма'
	// 	],
	// 	'max_sum'=>[
	// 		'oz' => 'Maksimal summa',
	// 		'uz' => 'Максимал сумма',
	// 		'ru' => 'Максимальная сумма'
	// 	],
	// 	'max_balance'=>[
	// 		'oz' => 'Maksimal balans miqdori',
	// 		'uz' => 'Максимал баланс миқдори',
	// 		'ru' => ' Максимальный баланс'
	// 	],
	// 	'sum'=>[
	// 		'oz' => 'so\'m',
	// 		'uz' => 'сум',
	// 		'ru' => 'сум'
	// 	],
	// 	'available_systems'=>[
	// 		'oz' => 'Balansni to\'ldirish uchun mavjud bo\'lgan to\'lov tizimlari',
	// 		'uz' => 'Балансни тўлдириш учун мавжуд бўлган тўлов тизимлари',
	// 		'ru' => 'Доступные платежные системы для пополнения балансового счета'
	// 	],
	// 	'your_id'=>[
	// 		'oz' => 'Sizning ID',
	// 		'uz' => 'Сизнинг ИД',
	// 		'ru' => 'Ваш ID'
	// 	]

	// ];
	$foundWord=Setting::where(['alias'=>$word])->first();
	if($foundWord){
		$foundWord->toArray();
		return $foundWord[config('global.lang')];
	}else{
		return $word;
	}
}
