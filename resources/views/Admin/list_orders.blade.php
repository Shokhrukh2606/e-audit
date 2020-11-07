<div class="card">
    <div class="card-header">
        <h1 class="card-title">Закаы</h1>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>ID</th>
                <th>{{__('front.customer')}}</th>
                <th>{{__('front.auditor')}}</th>
                <th>{{__('front.template_num')}}</th>
                <th>{{__('front.status')}}</th>
                <th>{{__('front.created_at')}}</th>
                <th>{{__('custom.show')}}</th>
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
                        <td><a href="{{ route('admin.order', $order->id) }}">{{__('custom.show')}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
