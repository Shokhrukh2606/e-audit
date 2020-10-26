<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Use_Case;
use App\Models\Conclusion;
use App\Models\Cust_comp_info;
use App\Models\Ciucm;
use Illuminate\Support\Facades\Storage;
use PDF;

class Audit_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:auditor');
    }
    private function view($file, $data=[]){
    	return view('Auditor.'.$file, $data);
    } 
   	public function select_temp(){
   		$data['templates']=Template::all();
   		$data['use_cases']=Use_Case::all();
   		return $this->view('select_template', $data);
   	}
    public function create_conclusion(Request $req){
    	switch ($req->method()) {
    		case 'GET':
    			$data['template_id']=$_GET['template_id']??false;
    			$data['use_cases']=$_GET['use_cases']??false;
    			if($data["template_id"]&&$data["use_cases"])
    				return $this->view('create_conclusion', $data);
    			return $this->select_temp();
    			break;
    		case 'POST':
    			$all=$req->all();
                $conclusion_fields=$req->input('conclusion');
                $cust_info_fields=$req->input('cust_info');
                $custom_fields_files=$req->file('custom');
                $custom_fields=$req->input('custom');
                // customer_info-use_case mappings
                $ciucm_fields=$req->input('ciucm');
                $conclusion=new Conclusion();
                $conclusion->auditor_id=auth()->user()->id;
                foreach ($conclusion_fields??[] as $key => $value) {
                    $conclusion->$key=$value;
                }
                $conclusion->save();
                $CCI=new Cust_comp_info();
                $CCI->conclusion_id=$conclusion->id;
                foreach ($cust_info_fields??[] as $key => $value) {
                    $CCI->$key=$value;
                }
               
                foreach ($custom_fields_files??[] as $key => $value) {
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                   $custom_fields[$key]=$value
                   ->storeAs("cust_info/$conclusion->id", time().$value->getClientOriginalName());
                }

                $CCI->custom_fields=json_encode($custom_fields);
                $CCI->save();
                foreach ($ciucm_fields as $key => $value) {
                    $cuicm=new Ciucm();
                    $cuicm->cust_info_id=$CCI->id;
                    $cuicm->use_case_id=$value;
                    $cuicm->save();
                }
                return redirect()->route('auditor.conclusions');
    			break;
    		default:
    			# code...
    			break;
    	}
    }
    public function conclusions(){
        $data['conclusions']=Conclusion::where('auditor_id', 7)->get();
        return $this->view("list_conclusions", $data);
    }
    public function pdf(Request $req){
        $data['word']="word";
        $pdf = PDF::loadView('templates.80.ru', $data);
        return $pdf->stream('conclusion.pdf');
    }
}
