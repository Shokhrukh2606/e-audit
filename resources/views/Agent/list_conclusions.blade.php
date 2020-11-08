<h2>{{"You have ".Auth::user()->agent_conclusions->count()." conclusions" }}</h2>
<div class="card">
	<div class="card-header">
      <h1 class="card-title">Заключении</h1>
    <a class="btn btn-sm btn-success" href="{{route('agent.create_conclusion')}}">Create conclusion</a>
	</div>
	<div class="card-body">
        <table class="table tablesorter">
            <tr>
                <th>Template Standart Number</th>
                <th>Use cases</th>
                <th>Full name</th>
                <th>Audit company name</th>
                <th>Audit company`s director name</th>
                <th>Audit company INN</th>
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
				<th>Customer</th>
				<th>Auditor</th>
				<th>Agent</th>
				<th>Standard Number</th>
				<th>View</th>
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
  
