<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    private $passable=['password', 'passport_copy'];
    public function show(){
    	return view("register.show");
    }
    public function reg_cust(Request $req){
    	$fields=$req->all();
    	unset($fields['_token']);
    	$customer=new User();
    	foreach ($fields as $name => $value) {
    		$customer->$name=$value;
            if(in_array($name, $this->passable, TRUE))
                continue;
    	}
    	$customer->group_id=4;
        $customer->password=Hash::make($req->input('password'));
    	$customer->save();
    }
    public function reg_agent(Request $req){
    	$fields=$req->all();
    	unset($fields['_token']);
    	$agent=new User();
    	foreach ($fields as $name => $value) {
    		if(in_array($name, $this->passable, TRUE))
    			continue;
    		$agent->$name=$value;
    	}
    	$agent->group_id=3;
        $agent->password=Hash::make($req->input('password'));
    	$agent->passport_copy=$req->file('passport_copy')->store('agents');
    	$agent->save();
    }
}
