<?php
namespace App\Classes;

use App\Models\Invoice;
use App\Models\Transaction;

class PaymeChecks{
	/*
	*@name validateCheckParams
	*@param $params array-like
	*@return array-like 
	*/
	public function validateCheckParams($params){
		// todo: Validate amount, if failed throw error
        // for example, check amount is numeric
        $params=(object) $params;
		if (!is_numeric($params->amount)) {
			return [
				'error'=>[
					'message'=>'Incorrect amount.',
					'code'=>-31001
				]
			];
		}

        // todo: Validate account, if failed throw error
        // assume, we should have order_id

		if (!isset($params->account['Test'])||!$params->account['Test']) {
			return [
				'error'=>[
					'message'=>[
						'uz'=>'Неверный код заказа.',
						'ru'=>'Harid kodida xatolik.',
						'en'=>'Incorrect order code.'
					],
					'code'=>-31050
				]
			];
		}

        // todo: Check is invoice available

        $invoice = Invoice::where('id',$params->account['Test'])->first();

        // Check, is order found by specified order_id
		if (!$invoice||!$invoice->id) {
			return [
				'error'=>[
					'message'=>[
						'uz'=>'Неверный код заказа.',
						'ru'=>'Harid kodida xatolik.',
						'en'=>'Incorrect order code.'
					],
					'code'=>-31050
				]
			];
		}

        // validate amount

        if ($invoice->price !=  $params->amount) {
			return[
				'error'=>[
					'message'=>'Incorrect amount.',
					'code'=>-31001
				]
			];
		}

        // for example, order state before payment should be 'waiting pay'

		if ($invoice->status == 'confirmed'||$invoice->status == 'rejected') {
			return[
				'error'=>[
					'message'=>'Order state is invalid.',
					'code'=>-31008
				]
			];
		}
		$transaction=Transaction::where([
			'invoice_id'=>$invoice->id,
			'payment_system'=>'payme'
		])->first();
		if($transaction&&
			($transaction->state=='waiting'||$transaction->state=='confirmed')){
			return[
				'error'=>[
					'message'=>'There is other active/completed transaction for this order.',
					'code'=>-31008
				]
			];
		}
        return [
        		'error'=>[
					'message'=>'Successfull',
					'code'=>0
				]
			];
	}
}


?>