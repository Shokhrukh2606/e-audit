<h2>{{Auth::user()->funds}}</h2>
<a href="{{route('add_funds')}}">Add funds</a>
<table style="width:100%">
    <tr>
        <th>Amount</th>
        <th>Price</th>
        <th>Transferred date</th>
    </tr>
    @foreach (Auth::user()->oldFunds as $item)
        <tr>
            <td>{{ $item->payment_sys }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
    @endforeach
</table>
