<h2>{{"You have ".Auth::user()->agent_conclusions->count()." conclusions" }}</h2>
<a href="{{route('agent.create_conclusion')}}">Create conclusion</a>
<table style="width:100%">
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
