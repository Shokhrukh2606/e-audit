<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Click extends Controller
{
	public function prepare(Request $req){
		/*$click_trans_id=$req->click_trans_id;
		$invoice_id=$req->merchant_trans_id;
		$amount=$req->amount;
		$service_id=$req->service_id;
		$error=$req->error;
		// check if invoice exists with this amount and service_id
		if(Invoice::exist($invoice_id,$amount, $service_id)){
			//check if transaction exists
			if($transaction=Transaction::where('invoice_id', $invoice_id)){

			}else{
			// if it does not exist create one
				$transaction=new Transaction;
				$transaction->invoice_id=$invoice_id
			}
			// check if status is open
			if($transaction->status=="open"){

			}
		}*/


	}
	public function complete(Request $req){
		return 0;	
	}
}
