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
		]
	];
	return $words[$word][config('global.lang')];
}
?>