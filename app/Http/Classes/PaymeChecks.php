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
	public function validateCheckParams($params)
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

		// todo: Check is invoice available

		$invoice = Invoice::where('id', $params->account['Test'])->first();

		// Check, is order found by specified order_id
		if (!$invoice || !$invoice->id) {
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

		// validate amount

		if ($invoice->price !=  $params->amount) {
			return [
				'error' => [
					'message' => 'Incorrect amount.',
					'code' => -31001
				]
			];
		}

		// for example, order state before payment should be 'waiting pay'

		if ($invoice->status == 'confirmed' || $invoice->status == 'rejected') {
			return [
				'error' => [
					'message' => 'Order state is invalid.',
					'code' => -31008
				]
			];
		}
		$transaction = Transaction::where([
			'Test' => $invoice->id,
			'payment_system' => 'payme'
		])->first();
		if (
			$transaction &&
			($transaction->state == 'waiting' || $transaction->state == 'confirmed')
		) {
			return [
				'error' => [
					'message' => 'There is other active/completed transaction for this order.',
					'code' => -31008
				]
			];
		}
		return [
			'error' => [
				'message' => 'Successfull',
				'code' => 0
			]
		];
	}
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
		$transaction = Transaction::where(['system_transaction_id' => $params->id])->first();
		if (!$transaction) {
			$invoice=Invoice::where(['id'=>$params->account['Test'], 'price'=>$params->amount]);
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
					"transaction" => $new_transaction->invoice_id,
					"state" => 1
				]
			];
		}
		if ($transaction->transaction_state() != 1) {
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
		$created_date = date('Y-m-d H:i:s', $params->time);
		$dif = time() -(12);
		if ( !(date('Y-m-d H:i:s', $dif)>$created_date)) {
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
				"transaction" =>$transaction->invoice_id,
				"state" => 1
			]
			
		];
		

	}
}
