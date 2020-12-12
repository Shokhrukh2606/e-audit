<style>
	.price{
		display: none;
	}
</style>
<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>{{lang('id')}}</th>
				<th>{{lang('user')}}</th>
				<th>{{lang('conclusion_id')}}</th>
				<th>{{lang('price')}}</th>
				<th>{{lang('edit')}}</th>
			</thead>
			<tbody>
				@foreach($invoices as $invoice)
                   <tr>
                   	<td>{{$invoice->id}}</td>
                   	<td>{{$invoice->user->full_name}}</td>
                   	<td>{{$invoice->conclusion->id}}</td>
                   	<td>
                   		{{$invoice->price}}
                   		<form action="{{route('admin.invoice_edit', $invoice->id)}}" method="POST" class="form">
                   			@csrf
                   			<input type="text" class="price" name="price">
                   		</form>
                   	</td>
                   	<td>
                   		<button class="btn btn-warning" onclick="edit(this)">
                   			{{lang('edit')}}
                   		</button>
                   	</td>
                   </tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	function edit(elem){
		var form=elem.parentNode.parentNode.getElementsByClassName('form')[0];
		var input=elem.parentNode.parentNode.getElementsByClassName('price')[0];
		if(input.style.display=="block"){
			form.submit();
			return 0;
		}
		input.style.display="block";
		elem.innerHTML="{{lang('complete')}}";

	}
</script>