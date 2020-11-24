<?php

namespace App\Http\Controllers;

use App\Models\Conclusion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class RegisterController extends Controller
{
    private $passable=['phone','password', 'passport_copy'];
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
        $customer->phone="998".$req->input('phone');
        $customer->password=Hash::make($req->input('password'));
       
    	$customer->save();
        session(['message'=>'Вы успешно зарегистрировались, пожалуйста, введите свой номер телефона и пароль для входа в систему']);
        return redirect()->route('login');
    }
    public function reg_agent(Request $req){
        if(!session('ver_code')||session('ver_code')!=$req->input('ver_code')){
            return redirect()->route('show_register');
        }
		$req->validate([
			'phone' => 'required|unique:users'
		]);
		$fields=$req->all();
        unset($fields['ver_code']);
    	unset($fields['_token']);
    	$agent=new User();
    	foreach ($fields as $name => $value) {
    		if(in_array($name, $this->passable, TRUE))
    			continue;
    		$agent->$name=$value;
    	}
    	$agent->group_id=3;
        $agent->phone="998".$req->input('phone');
        $agent->status="inactive";
        $agent->password=Hash::make($req->input('password'));
    	$agent->passport_copy=$req->file('passport_copy')->store('agents');
    	$agent->save();
        
        session(['message'=>'Вы успешно зарегистрировались, вы получите уведомление, когда администратор примет вас.']);
        return redirect()->route('show_register');
    }
    public function open_conclusion(Request $req){
        $data['conclusion']=Conclusion::where('qr_hash', $req->id)->first();
        if($data['conclusion']){
            $template=$data['conclusion']->cust_info->template->standart_num;
            $lang=$data['conclusion']->cust_info->lang;
            $data['qrcode']=base64_encode(QrCode::size(100)->generate(route('open_conclusion', ['id' => $data['conclusion']->qr_hash])));
            $pdf = PDF::loadView("templates.$template.$lang", $data);
            return $pdf->stream('invoice.pdf');
        }
        abort(404);
    }
}
