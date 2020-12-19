@php
$iterated=['cust_comp_name', 'cust_comp_inn',"cust_comp_gov_registration_copy","cust_comp_director_passport_copy"];
$files=['cust_comp_gov_registration_copy', 'cust_comp_director_passport_copy']
@endphp
<div class="card">
	<div class="card-header">
		<h2>{{lang('order')}} {{$order->id}}
			<span class="badge badge-danger">
                {{config('global.reverted_states')[$order->status]}}
            </span>
		</h2>
	</div>
	<div class="card-body">
		{{-- Order info --}}
		<h3>{{lang('orderDetails')}}</h3>
		<ul>
			<li>{{lang('standartNumber')}}: {{$order->cust_info->template->standart_num}}</li>
			<li>{{lang('useCases')}}:
				@foreach($order->cust_info->use_cases as $uc)
				<span>{{json_decode($uc->title)->ru}}</span>
				@endforeach
			</li>
			@foreach($order->getAttributes() as $key=>$value)
			@continue(!in_array($key, $iterated, TRUE))
				<li>{{lang($key)}}: {{$value}}</li>
			@endforeach
		</ul>
		{{-- Customer info --}}
		<h3>{{lang('clientInfo')}}</h3>
		<ul>
			@foreach($order->cust_info->getAttributes() as $key=>$value)
			@continue(!in_array($key, $iterated, TRUE))
			<li>{{lang($key)}}:  @if(in_array($key, $files, true))
                        <a href="{{route('file')."?path=".$value}}" target="blank"
                        class="btn btn-primary btn-link"
                        >
                    {{lang('show')}}
                    </a>
                    @else
                        {{$value}}
                    @endif
             </li>
			@endforeach
			@php
	// get custom fields array
			$custom_fields=json_decode($order->cust_info->custom_fields??"[]");
			@endphp
			{{-- get custom fields meta and iterate --}}

			@foreach(custom_fields($order->cust_info->template_id) as $field)

			<li>
				{{$field->label->ru}} :
				@if(!isset($custom_fields->{$field->name}))
				{{__('front.nothing_yet')}}
				@continue
				@endif
				@if($field->type=='file')
				<a class="btn btn-sm btn-info btn-link" 
				href="{{route('file')."?path=".$custom_fields->{$field->name} }}" target="blank"
				>
					{{lang('show')}}
				</a>
				@else
				{{$custom_fields->{$field->name} }}
				@endif
			</li>
			@endforeach

		</ul>
		@if(in_array($order->status, [3,6]))
			<a href="{{route('auditor.confirm', $order->id)}}" 
				class="btn btn-success btn-sm btn-simple">
				Подтвердить правильность документов
			</a>
			<!-- Modal -->
			<div class="modal modal-black fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">
			        	Введите ошибки
			        </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			          <i class="tim-icons icon-simple-remove"></i>
			        </button>
			      </div>
			      <div class="modal-body ">
			      	<form 
			      		action="{{route('auditor.send_with_errors',$order->id)}}" 
			      		id="errors"
			      		method="POST" 
			      	>
			      	@csrf
			        <textarea 
			        	name="message" 
			        	class="form-control" 
			        	rows="3"
			        >			        	
			        </textarea>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">
			        	Закрыть
			        </button>
			        <button type="button" class="btn btn-primary" onclick="send_errors()">
			        	Отправлять
			        </button>
			      </div>
			    </div>
			  </div>
			</div>
			<button type="button" class="btn btn-danger btn-simple btn-sm" data-toggle="modal" data-target="#exampleModal">
			  Cообщать об ошибках
			</button>
		@endif
		@if($order->status==4)
			@if($order->cust_info->conclusion??false)
			
			@else
			<a class="btn btn-sm btn-success btn-simple" 
				href="{{route('auditor.create_conc_on_order', $order->id)}}">
				{{lang('write_conc_for_this')}}
			</a>
			@endif
		@endif

	</div>
</div>
<script>
	function send_errors(){
		document.getElementById('errors').submit();
	}
</script>