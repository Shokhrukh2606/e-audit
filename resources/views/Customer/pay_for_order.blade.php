<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('payment/styles.css') }}">
<div class="container">

    <div class="bill mb-30">
        <div class="title center mb-30">
            <h3 class="bold mb-5">СЧЕТ НА ЗАКЛЮЧЕНИЕ № {{ $invoice->conclusion->id }} от
                {{ $invoice->conclusion->created_at }}</h3>
            <h3 class="bold mt-0">к Договору № {{ $invoice->id }} от {{ $invoice->created_at }}</h3>
        </div>
        <div class="mb-15 users">
            <div>
                <p class="mb-10"><span class="bold">Исполнитель: </span>{{ $invoice->conclusion->audit_comp_name }}</p>
                {{-- <p><span class="bold">Адрес:
                    </span>{{ $invoice->conclusion->audit_comp_name }}</p> --}}
                {{-- <p><span class="bold">Юридический адрес: </span>г. Ташкент, II
                    Чимбай, 115-8
                    Телефон: (+998 78) 113-44-54</p> --}}
                {{-- <p><span class="bold">Телефон: </span>(+998 78) 113-44-54</p>
                --}}
                {{-- <p><span class="bold">Эл.почта: </span>info@eauit.uz</p>
                --}}
                <p><span class="bold">Расчетный счет: </span>{{ $invoice->conclusion->audit_comp_bank_acc }} в
                    {{ $invoice->conclusion->audit_comp_bank_name }}
                </p>
                <p><span class="bold">МФО: </span>{{ $invoice->conclusion->audit_comp_mfo }}</p>
                <p><span class="bold">ИНН: </span>{{ $invoice->conclusion->audit_comp_inn }}</p>
                <p><span class="bold">ОКЭД: </span>{{ $invoice->conclusion->audit_comp_oked }}</p>
            </div>
            <div>
                <p class="mb-10"><span class="bold">Заказчик:
                    </span>{{ $invoice->conclusion->cust_info['cust_comp_name'] }}</p>
                <p><span class="bold">Адрес: </span>{{ $invoice->conclusion->cust_info['cust_comp_address'] }}</p>
                <p><span class="bold">Расчетный счет: </span>{{ $invoice->conclusion->cust_info['cust_comp_bank_acc'] }}
                    в {{ $invoice->conclusion->cust_info['cust_comp_bank_name'] }}
                <p><span class="bold">МФО: </span>{{ $invoice->conclusion->cust_info['cust_comp_bank_mfo'] }}</p>
                <p><span class="bold">ИНН: </span>{{ $invoice->conclusion->cust_info['cust_comp_inn'] }}</p>
                <p><span class="bold">ОКЭД: </span>{{ $invoice->conclusion->cust_info['cust_comp_oked'] }}</p>


            </div>
        </div>
    </div>

    <div class="services mb-30">
        <p class="bold">Список заказанных услуг:</p>
        <table class="mb-30">
            <tr>
                <th class="bold center">№</th>
                <th class="bold center">Услуги</th>
                <th class="bold center">Стоимость (сум)</th>
            </tr>
            <tr>
                <td class="center">1</td>
                <td>Заключение</td>
                <td class="center">{{ $invoice->price }}</td>
            </tr>
            <tr>
                <td colspan="2" class="bold">Итого</td>
                <td class="center">{{ $invoice->price }}</td>
            </tr>
        </table>
        <p class="bold mb-60">Итого к оплате: {{$invoice->price}} сум (восемь тысяч четыреста сум), без НДС.</p>
    </div>

    <div class="attentation mb-60">
        <p class="bold mb-5">Внимание! Оплата данного счета означает согласие с условиями предоставления услуг.</p>
        <p class="mt-0">Уведомление об оплате необязательно. Услуги предоставляются по факту поступления денежных
            средств
            на расчетный счет Исполнителя. После предоставления услуги, Исполнитель уведомляет об этом Заказчика
            посредством
            отправки электронного письма на электронный почтовый адрес Заказчика: axtrem13@gmail.com.</p>
    </div>
    @if ($invoice->status == 'waiting')
        <div class="mb-30">
            <h2 class="center">Способ оплаты</h2>
            <div class="payment-box mb-20">
                <input type="radio" id="click" value="click" name="payment">
                <label for="click"><img src="{{ asset('payment/click.png') }}" alt=""></label><br>
            </div>
            <div class="payment-box mb-20">
                <input type="radio" id="payme" value="payme" name="payment">
                <label for="payme"><img src="{{ asset('payment/payme.png') }}" alt=""></label><br>
            </div>
            <div class="payment-box mb-20">
                <input type="radio" id="paynet" value="paynet" name="payment">
                <label for="paynet"><img src="{{ asset('payment/paynet.png') }}" alt=""></label>
            </div>
            <div class="payment-box mb-20">
                <input type="radio" id="cash" value="cash" name="payment">
                <label for="cash">Наличные</label>
            </div>
            <div class="payment-box mb-20">
                <input type="radio" id="transfer" value="transfer" name="payment">
                <label for="transfer">Перечисление</label>
            </div>
        </div>

        <style>
            input {
                width: unset;
            }

            * {
                color: white;
            }

        </style>
        <form method="POST" action="https://checkout.test.paycom.uz/" id="payme" name="payme" target="_blank">

            <!-- Идентификатор WEB Кассы -->
            <input type="hidden" name="merchant" value="5fa30924740f35d3638b7d41" />

            <!-- Сумма платежа в тийинах -->
            <input type="hidden" name="amount" value="{{ $invoice->price*100 }}" />

            <!-- Поля Объекта Account -->
            <input type="hidden" name="account[id]" value="{{$invoice->id}}" />
        

            <!-- ==================== НЕОБЯЗАТЕЛЬНЫЕ ПОЛЯ ====================== -->
            <!-- Язык. Доступные значения: ru|uz|en 
   Другие значения игнорируются
   Значение по умолчанию ru -->
            <input type="hidden" name="lang" value="ru" />

            <!-- Валюта. Доступные значения: 643|840|860|978
   Другие значения игнорируются
   Значение по умолчанию 860
   Коды валют в ISO формате
   643 - RUB
   840 - USD
   860 - UZS
   978 - EUR -->
            <input type="hidden" name="currency" value="860" />

            <!-- URL возврата после оплаты или отмены платежа.
   Если URL возврата не указан, он берется из заголовка запроса Referer.
   URL возврата может содержать параметры, которые заменяются Paycom при запросе.
   Доступные параметры для callback:
   :transaction - id транзакции или "null" если транзакцию не удалось создать
   :account.{field} - поля объекта Account
   Пример: https://your-service.uz/paycom/:transaction -->
            <input type="hidden" name="callback" value="{{ route('customer.pay', $invoice->id) }}" />

            <!-- Таймаут после успешного платежа в миллисекундах. 
   Значение по умолчанию 15
   После успешной оплаты, по истечении времени callback_timeout
   производится перенаправление пользователя по url возврата после платежа -->
            <input type="hidden" name="callback_timeout" value="5000" />

            <!-- Выбор платежного инструмента Paycom.
   В Paycom доступна регистрация несколько платежных 
   инструментов. Если платёжный инструмент не указан, 
   пользователю предоставляется выбор инструмента оплаты. 
   Если указать id определённого платежного инструмента - 
   пользователь перенаправляется на указанный платежный инструмент. -->
            {{-- <input type="hidden" name="payment" value="{payment_id}" />
            --}}    
        </form>
        <form action="https://my.click.uz/services/pay" method="get" target="_blank" id="click" name="click">
            <input type="hidden" name="merchant_id" value="12244" />
            <input type="hidden" name="merchant_user_id" value="18124" />
            <input type="hidden" name="service_id" value="16912" />
            <input type="hidden" name="transaction_param" value="{{ $invoice->id }}" />
            <input type="hidden" name="amount" value="{{ $invoice->price }}" />
            <input type="hidden" name="return_url" value={{ route('customer.pay', $invoice->id) }} />
		</form>
		<p class="mt-0">Сумма оплаты: 8400.00 сум</p>
		<button class="btn btn-info" id="generator">Оплатить</button>
    @else
        <h3>Already paid</h3>
    @endif

</div>
<script>
	var formGenerator=document.getElementById("generator")
	formGenerator.addEventListener("click", function(e){
		e.preventDefault()		
		var selectedType=document.querySelector('input[name="payment"]:checked').value;
		if(typeof selectedType != "undefined"){
			switch(selectedType){
			case 'click':
				var click=document.click.submit()
				click.submit();
			break;
			case 'payme':
				var payme=document.payme.submit()
				payme.submit();
			break;
			default:
				alert('Bunday yoq')
		}
		}
	});
</script>