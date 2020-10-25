<h3>My Conclusions</h3>
<table>
	<thead>
		<th>ID</th>
		<th>Template Standart Number</th>
		<th>Use cases</th>
		<th>Date</th>
		<th>More</th>
	</thead>
	<tbody>
		@foreach($conclusions as $conclusion)
		<tr>
			<td>{{$conclusion->id}}</td>
			<td>{{$conclusion->cust_info->template->standart_num}}</td>
			<td>
			{{-- many to many retrieval --}}
			@foreach($conclusion->cust_info->use_cases as $uc)
			  <span>{{json_decode($uc->title)->ru}}</span> | 
			@endforeach
			</td>
			<td>{{$conclusion->created_at}}</td>
			<td><a href="{{route('auditor.pdf', $conclusion->id)}}">More</a></td>
		</tr>
		@endforeach
	</tbody>
</table>