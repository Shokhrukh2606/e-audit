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