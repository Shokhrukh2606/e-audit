<div style="display: none">
<h2>{{Auth::user()->funds}}</h2>
{{-- <a class="btn btn-sm btn-success" href="{{route('aac.add_funds')}}">{{__('front.add_funds')}}</a> --}}
<table style="width:100%">
    <tr>
    <th>{{__('front.amount')}}</th>
        <th>{{__('front.price')}}</th>
    <th>{{__('front.transferred_date')}}</th>
    </tr>
    
</table>
</div>