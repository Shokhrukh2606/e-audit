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
?>