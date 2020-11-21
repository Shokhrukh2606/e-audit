<div class="card">
    <div class="card-header">
        <h3>Transactions</h3>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>ID</th>
                <th>Invoice id</th>
                <th>Payment System</th>
                <th>Perform Time</th>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->invoice_id }}</td>
                        <td>{{ $item->payment_system }}</td>
                        <td>{{ $item->perform_time }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$transactions->links()}}
    </div>
</div>
