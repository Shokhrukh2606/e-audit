<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('payment/styles.css') }}">
<style>
    *{
        color:black !important;
        font-size:14px;
    }
    * { 
    font-family: DejaVu Sans, sans-serif;
    text-align: justify;
  }
</style>
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

