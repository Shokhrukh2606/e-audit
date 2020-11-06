<div class="card">
    <div class="card-header">
        <h1 class="card-title">Закаы</h1>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>ID</th>
                <th>Customer</th>
                <th>Auditor</th>
                <th>Standart Number</th>
                <th>Status</th>
                <th>Created</th>
                <th>View</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->auditor->name ?? 'No one yet' }}</td>
                        <td>{{ $order->cust_info->template->standart_num }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a href="{{ route('admin.order', $order->id) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
