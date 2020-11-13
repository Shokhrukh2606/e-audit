<?php

namespace App\Classes;

use App\Models\Invoice;
use App\Models\Transaction;

class PaymeChecks
{
	/*
	*@name validateCheckParams
	*@param $params array-like
	*@return array-like 
	*/
	public function validateCreateParams($params)
	{
		// todo: Validate amount, if failed throw error
		// for example, check amount is numeric
		$params = (object) $params;
		if (!is_numeric($params->amount)) {
			return [
				'error' => [
					'message' => 'Incorrect amount.',
					'code' => -31001
				]
			];
		}

		// todo: Validate account, if failed throw error
		// assume, we should have order_id

		if (!isset($params->account['Test']) || !$params->account['Test']) {
			return [
				'error' => [
					'message' => [
						'uz' => 'Неверный код заказа.',
						'ru' => 'Harid kodida xatolik.',
						'en' => 'Incorrect order code.'
					],
					'code' => -31050
				]
			];
		}
		// Find transaction by id
		$transaction = Transaction::where(['system_transaction_id' => $params->id, 'payment_system'=>'payme'])->first();
		if (!$transaction) {
			$invoice=Invoice::where(['id'=>$params->account['Test'], 'price'=>$params->amount])->first();
			if(!$invoice){
				return [
					'error' => [
						'message' => [
							'uz' => 'Bu id bilan ochilgan invoice topilmadi',
							'ru' => 'Этот идентификатор счета-фактуры не существует',
							'en' => 'This kind of id does not exist.'
						],
						'code' => -31050
					]
				];
			}
			$new_transaction=new Transaction;
			$new_transaction->payment_system='payme';
			$new_transaction->system_transaction_id=$params->id;
			$new_transaction->invoice_id=$params->account['Test'];
			$new_transaction->error_code=1;
			$new_transaction->system_create_time=date('Y-m-d H:i:s', floor($params->time/1000));
            $new_transaction->save();
			return [
				'error' => [
					'message' => 'Successfull',
					'code' => 0
				],
				'result' => [
					"create_time" =>strtotime($new_transaction->system_create_time)*1000 ,
					"transaction" => "$new_transaction->invoice_id",
					"state" => 1
				]
			];
		}
		if ($transaction->transaction_state() != 1 &&$transaction->transaction_state() != 2) {
			return [
				'error' => [
					'message' => [
						'uz' => 'Чек отказано.',
						'ru' => 'Check bekor qilingan.',
						'en' => 'Order is rejected.'
					],
					'code' => -31008
				]
			];
		}
		
		if ((round(microtime(true) * 1000)-$params->time)>43200000) {
			$transaction->state='rejected';
			$transaction->error_code=4;
			$transaction->save();
			return [
				'error' => [
					'message' => [
						'uz' => 'Срок Чек истекло.',
						'ru' => 'Check amal qilish muddati tugagan.',
						'en' => 'Order deadline is passed.'
					],
					'code' => -31008
				]
			];
		}
		return [
			'error' => [
				'message' => 'Successfull',
				'code' => 0
			],
			'result' => [
				"create_time" =>strtotime($transaction->system_create_time)*1000,
				"transaction" =>"$transaction->invoice_id",
				"state" => 1
			]
			
		];
		

	}
}
