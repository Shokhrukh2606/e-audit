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
    public function forgot_pswrd(Request $req){
        switch ($req->method()) {
            case 'GET':
                return view('register.forgot_password');
                break;
            case 'POST':
                $phone="+".$req->input('phone');
                $user=User::where('phone',$phone)->first();
                if($user&&session('ver_code')&&session('ver_code')==$req->input('ver_code'))
                {
                    
                    $data['password']=Hash::make($req->input('password'));
                    User::where('phone',$phone)->update($data);
                    return redirect()->route('login');
                }
                return redirect()->route('forgot_pswrd');
                break;
            default:
                abort(401);
                break;
        }
    }
    public function verification(Request $req){
        $phone=$_GET['phone']??false;
        if(!$phone)
            return 0;
        $verification=rand(1000, 10000);
        session(['ver_code'=>md5($verification)]);
        sms($phone, $verification);
        header("Access-Control-Allow-Origin: *");
        return md5($verification);
    }
    public function reg_cust(Request $req){
        // if(!session('ver_code')||session('ver_code')!=$req->input('ver_code')){
        //     return redirect()->route('show_register');
        // }
		$req->validate([
			'phone' => 'required|unique:users'
		]);
    	$fields=$req->all();
    	unset($fields['_token']);
        unset($fields['ver_code']);
    	$customer=new User();
    	foreach ($fields as $name => $value) {
    		$customer->$name=$value;
            if(in_array($name, $this->passable, TRUE))
                continue;
    	}
    	$customer->group_id=4;
        $customer->password=Hash::make($req->input('password'));
       
    	$customer->save();
        dd($customer);
        return redirect()->route('dispatcher');
    }
    public function reg_agent(Request $req){
        if(!session('ver_code')||session('ver_code')!=$req->input('ver_code')){
            return redirect()->route('show_register');
        }
		$req->validate([
			'phone' => 'required|unique:users'
		]);
        unset($fields['ver_code']);
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
        return redirect()->route('dispatcher');
    }
}
