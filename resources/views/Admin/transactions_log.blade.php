<div class="card">
    <div class="card-header">
        <h3>{{ lang('transactions_log') }}</h3>
        <form action="{{ route('admin.transactions_log', request()->id) }}" method="GET">
            @csrf
            <select class="form-control" name="type">
                <option value="">{{ lang('select') }}</option>
                <option {{request()->input('type')=='to_order'?'selected':''}} value="to_order">{{ lang('To Order') }}</option>
                <option {{request()->input('type')=='to_funds'?'selected':''}} value="to_funds">{{ lang('To funds') }}</option>
            </select>
            <button class="btn btn-success btn-sm pull-right" type="submit">{{ lang('search') }}</button>
            <a class="btn btn-sm btn-danger col-1 mt-1 pull-right {{request()->input('type')?'':'d-none'}}" href="{{route('admin.transactions_log', request()->id)}}"><i class="tim-icons icon-simple-remove"></i></a>
        </form>
    </div>
    <div class="card-body">
        @if (request()->input('type')=='to_order' || !request()->input('type'))
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
