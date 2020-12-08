<div class="card">
    <div class="card-header">
        <h3>{{ lang('transactions_log') }}</h3>
        <form action="{{ route('customer.transaction_log') }}" method="GET">
            @csrf
            <select class="form-control" name="type">
                <option value="">{{ lang('select') }}</option>
                <option value="bank_cash">{{ lang('Bank transfer or cash') }}</option>
                <option value="click_payme">{{ lang('Click or Payme') }}</option>
            </select>
            <button class="btn btn-success btn-sm pull-right" type="submit">{{ lang('search') }}</button>
        </form>
    </div>
    <div class="card-body">
        @if (request()->input('type')=='payme'||request()->input('type')=='click' || !request()->input('type'))
            <table class="table tablesorter">
                <thead>
                    <th>ID</th>
                    <th>{{ lang('Invoice id') }}</th>
                    <th>{{ lang('Payment System') }}</th>
                    <th>{{ lang('Perform Time') }}</th>
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
        @else
            <table class="table tablesorter">
                <thead>
                    <th>ID</th>
                    <th>{{ lang('amount') }}</th>
                    <th>{{ lang('Perform Time') }}</th>
                </thead>
                <tbody>
                    @foreach ($transactions as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{ $transactions->links() }}
    </div>
</div>
