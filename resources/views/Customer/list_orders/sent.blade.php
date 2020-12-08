<div class="card">
    <div class="card-header">
        <h3>{{ lang('myOrders') }} ({{ lang('sent') }})</h3>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                
                <th>{{ lang('ID') }}</th>
                <th>{{ lang('useCases') }}</th>
                <th>{{ lang('date') }}</th>
                <th>{{ lang('show') }}</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        
                        <td>{{ $order->id }}</td>
                        <td>
                            {{-- many to many retrieval --}}
                            @foreach ($order->cust_info->use_cases as $uc)
                                <span class="badge badge-info">
                                    {{json_decode($uc->title)->ru}}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            <span class="badge badge-danger">
                            {{$states[$order->status]}}
                            </span>
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                        <a 
                            href="{{ route('customer.order_view', $order->id) }}"
                            class="btn btn-warning btn-sm"
                            >
                           {{lang('show')}}

                        </a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
</div>
