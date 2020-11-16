<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{lang('orders')}}</h1>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang('customer')}}</th>
                <th>{{lang('auditor')}}</th>
                <th>{{lang('standartNumber')}}</th>
                <th>{{lang('status')}}</th>
                <th>{{lang('createdDate')}}</th>
                <th>{{lang('show')}}</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->auditor->name ?? 'No one yet' }}</td>
                        <td>{{ $order->cust_info->template->standart_num }}</td>
                        <td>{{__('front.'.$order->status)}}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a href="{{ route('admin.order', $order->id) }}">{{lang('show')}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
