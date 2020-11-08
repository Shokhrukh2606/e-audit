<h2>{{Auth::user()->funds}}</h2>
<a href="{{route('aac.add_funds')}}">{{__('front.add_funds')}}</a>
<table style="width:100%">
    <tr>
    <th>{{__('front.amount')}}</th>
        <th>{{__('front.price')}}</th>
    <th>{{__('front.transferred_date')}}</th>
    </tr>
    @foreach (Auth::user()->oldFunds as $item)
        <tr>
            <td>{{ $item->payment_sys }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
    @endforeach
</table>
