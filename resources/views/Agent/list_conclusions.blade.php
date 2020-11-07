<h2>{{"У вас есть ".Auth::user()->agent_conclusions->count()." заключены" }}</h2>
<div class="card">
	<div class="card-header">
      <h1 class="card-title">Заключении</h1>
    <a class="btn btn-sm btn-success" href="{{route('agent.create_conclusion')}}">{{__('custom.create')}}</a>
	</div>
	<div class="card-body">
        <table class="table tablesorter">
            <tr>
				<th>{{__('front.template_num')}}</th>
                <th>{{__('front.use_cases')}}</th>
                <th>{{__('front.fio')}}</th>
                <th>{{__('front.aduit_comp_name')}}</th>
                <th>{{__('front.audit_comp_direc_name')}}</th>
                <th>{{__('front.audit_comp_inn')}}</th>
            </tr>
            @foreach ($conclusions as $item)
                <tr>
                    <td>{{$item->cust_info->template->standart_num}}</td>
                    <td>
                        {{-- many to many retrieval --}}
                        @foreach($item->cust_info->use_cases as $uc)
                          <span>{{json_decode($uc->title)->ru}}</span> | 
                        @endforeach
                        </td>
                    <td>{{ getUserName($item->agent_id) }}</td>
                    <td>{{ $item->audit_comp_name }}</td>
                    <td>{{ $item->audit_comp_director_name }}</td>
                    <td>{{ $item->audit_comp_inn }}</td>
                    <td><a href="{{route('agent.view_conclusion_open', $item->id)}}">More</a></td>
                </tr>
            @endforeach
        </table>
        
        <table class="table tablesorter">
			<thead>
				<th>ID</th>
				<th>{{__('front.customer')}}</th>
				<th>{{__('front.auditor')}}</th>
				<th>{{__('front.agent')}}</th>
				<th>{{__('front.template_num')}}</th>
				<th>{{__('front.actions')}}</th>
			</thead>
			<tbody>
				<tr>
					@foreach($conclusions as $conclusion)
						<td>{{$conclusion->id}}</td>
						<td>
							{{$conclusion->customer->name??'No'}}
							{{$conclusion->customer->surname??'Customer'}}
						</td>
						<td>
							{{$conclusion->auditor->name??'No'}}
							{{$conclusion->auditor->surname??'Auditor'}}
						</td>
						<td>
							{{$conclusion->agent->name??'No'}}
							{{$conclusion->agent->surname??'Agent'}}
						</td>
						<td>{{$conclusion->cust_info->template->standart_num}}</td>
						<td><a href="#">View</a></td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
  </div>
  
