<?php

namespace App\Classes;

use App\Models\Invoice;
use App\Models\Transaction;

class PaymeChecks
{
	
	public function validatePerform(array $params): array
	{
		$params = (object) $params;
		if (!isset($params->id) || !$params->id) {
			return [
				'error' => [
					'message' => [
						'uz' => 'Нет код Транзакция.',
						'ru' => 'Transaksiya kodida berilmadi.',
						'en' => 'No transaction code.'
					],
					'code' => -31050
				]
			];
		}
		$transaction = Transaction::where(['system_transaction_id' => $params->id])->first();

		//additional check
		//check if invoice is not confirmed yet
		if($transaction->invoice->status=='confirmed'){
			if($transaction->state=='confirmed'){
				return [
					'result' => [
						"perform_time" => strtotime($transaction->perform_time) * 1000,
						"transaction" => "$transaction->id",
						"state" => 2
					],
					'error' => [
						'message' => 'Successfull',
						'code' => 0
					]
				];
			}
			return [
				'error' => [
					'message' => [	
						'uz' => 'Невозможно выполнить данную операцию.',
						'ru' => 'Bu operatsiyani bajarib bomidi.',
						'en' => 'This operation can not be done.'
					],
					'code' => -31008
				]
			];
		}

		
		if(!$transaction){
			return [
				'error' => [
					'message' => [
						'uz' => 'Транзакция не найдена.',
						'ru' => 'Tranzaksiya topilmadi.',
						'en' => 'Transaction not found.'
					],
					'code' => -31003
				]
			];
		}
		switch ($transaction->transaction_state()) {
			case 1:

			break;
			case 2:
			return [
				'result' => [
					"perform_time" => strtotime($transaction->perform_time) * 1000,
					"transaction" => "$transaction->id",
					"state" => 2
				],
				'error' => [
					'message' => 'Successfull',
					'code' => 0
				]
			];
			break;
			
			default:
			return [
				'error' => [
					'message' => [
						'uz' => 'Невозможно выполнить данную операцию.',
						'ru' => 'Bu operatsiyani bajarib bomidi.',
						'en' => 'This operation can not be done.'
					],
					'code' => -31008
				]
			];
			break;
		}
		
		if ((round(microtime(true) * 1000) - strtotime($transaction->system_create_time)*1000) > 43200000) {
			$transaction->state = 'cancelled';
			$transaction->error_code = 4;
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
		$transaction->state = 'confirmed';
		$transaction->perform_time=date("Y-m-d H:i:s");
		$transaction->save();
		$invoice=Invoice::where(['id'=>$transaction->invoice_id])->first();
		$invoice->status='confirmed';
		$invoice->save();
		return [
			'result' => [
				"perform_time" => strtotime($transaction->perform_time) * 1000,
				"transaction" => "$transaction->id",
				"state" => 2
			],
			'error' => [
				'message' => 'Successfull',
				'code' => 0
			]
		];
	}
	/*
	*@name validateCheckParams
	*@param $params array-like
	*@return array-like 
	*/
	
	public function validateCheckParams(array $params): array
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

		if (!isset($params->account['id']) || !$params->account['id']) {
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

		$invoice = Invoice::where('id', $params->account['id'])->first();

		// Check, is order found by specified order_id
		if (!$invoice || !$invoice->id) {
			return [
				'error' => [
					'message' => [
						'uz' => 'Неверный код заказа.',
						'ru' => 'Harid kodida xatolik.',
						'en' => 'Incorrect order code.'
					],
					'code' => -31051
				]
			];
		}
		
		// for example, order state before payment should be 'waiting pay'

		if ($invoice->status != 'waiting') {
			return [
				'error' => [
					'message' => 'Order state is invalid.',
					'code' => -31051
				]
			];
		}

		// validate amount

		if ($invoice->price*100 !=  $params->amount) {
			return [
				'error' => [
					'message' => [
						'uz' => 'Incorrect amount.',
						'ru' => 'Incorrect amount.',
						'en' => 'Incorrect amount.'
					],
					'code' => -31001
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
	/*
	*@name transaction_check
	*@param $params array-like
	*@return array-like 
	*/
	public function transaction_check(array $params): array
	{
		if (!$params['id']) {
			return [
				'error' => [
					'message' => 'Incorrect params',
					'code' => -31008
				]
			];
		}
		$transaction = Transaction::where([
			'system_transaction_id' => $params['id'],
			'payment_system' => 'payme',
		])->first();

		if (!$transaction) {
			return [
				'error' => [
					'message' => 'Transaction not found',
					'code' => -31003
				]
			];
		}

		return [
			'error' => [
				'code' => 0,
				'message' => 'Successfull',
			],
			'transaction' => $transaction
		];
	}
	/*
	*@name cancel_param_check
	*@param array $param
	*@return array
	*/
	public function cancel_param_check(array $params): array
	{
		if (!$params['id'] && !$params['reason']) {
			return [
				'error' => [
					'message' => 'Incorrect params',
					'code' => -31008
				]
			];
		}
		
		$transaction = Transaction::where([
			'system_transaction_id' => $params['id'],
			'payment_system' => 'payme',
		])->first();

		if (!$transaction) {
			return [
				'error' => [
					'message' => 'Transaction not found',
					'code' => -31003
				]
			];
		}
		switch ($transaction->transaction_state()) {
            case '1':
                $transaction->reason=$params['reason'];
                $transaction->state='cancelled';
                $transaction->cancel_time=date('Y-m-d H:i:s');
                $transaction->save();
                break;
            case '2':
                $invoice=$transaction->invoice;
                $invoice->status='waiting';
                $invoice->save();
                $transaction->reason=$params['reason'];
                $transaction->state='cancelled_after_confirmed';
                $transaction->cancel_time=date('Y-m-d H:i:s');
                $transaction->save();
                break;
            
            default:
                break;
        }
		return [
			'error' => [
				'message' => 'Successfull',
				'code' => 0
			],
			'transaction' => $transaction
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

		if (!isset($params->account['id']) || !$params->account['id']) {
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
		$transaction = Transaction::where(['system_transaction_id' => $params->id, 'payment_system' => 'payme'])->first();

		if (!$transaction) {
			$checkPerformTransaction = $this->validateCheckParams((array) $params);
			if ($checkPerformTransaction['error']['code'] != 0) {
				return $checkPerformTransaction;
			}

			$new_transaction = new Transaction;
			$new_transaction->payment_system = 'payme';
			$new_transaction->system_transaction_id = $params->id;
			$new_transaction->invoice_id = $params->account['id'];
			$new_transaction->error_code = 1;
			$new_transaction->created_at = date("Y-m-d H:i:s");
			$new_transaction->system_create_time = date('Y-m-d H:i:s', floor($params->time / 1000));
			$new_transaction->save();

			// make invoice inprocess

			$invoice=$new_transaction->invoice;
			$invoice->status='inprocess';
			$invoice->save();

			return [
				'error' => [
					'message' => 'Successfull',
					'code' => 0
				],
				'result' => [
					"create_time" => strtotime($new_transaction->created_at) * 1000,
					"transaction" => "$new_transaction->id",
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
						'en' => 'Order is cancelled.'
					],
					'code' => -31008
				]
			];
		}

		if ((round(microtime(true) * 1000) - $params->time) > 43200000) {
			$transaction->state = 'cancelled';
			$transaction->error_code = 4;
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
				"create_time" => strtotime($transaction->created_at) * 1000,
				"transaction" => "$transaction->id",
				"state" => 1
			]

		];
	}
}
