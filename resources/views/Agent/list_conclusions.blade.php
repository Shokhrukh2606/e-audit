<h2>{{"You have ".Auth::user()->agent_conclusions->count()." conclusions" }}</h2>
<table style="width:100%">
    <tr>
        <th>Full name</th>
        <th>Audit company name</th>
        <th>Audit company`s director name</th>
        <th>Audit company INN</th>
    </tr>
    @foreach ($conclusions as $item)
        <tr>
            <td>{{ getUserName($item->user_id) }}</td>
            <td>{{ $item->audit_comp_name }}</td>
            <td>{{ $item->audit_comp_director_name }}</td>
            <td>{{ $item->audit_comp_inn }}</td>
        </tr>
    @endforeach
</table>
{{$conclusions->links() }}
