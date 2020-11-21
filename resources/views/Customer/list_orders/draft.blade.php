<div class="card">
    <div class="card-header">
        <h3>{{ __('front.my_orders') }} (Черновики)</h3>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{ lang('id') }}</th>
                <th>{{ lang('standartNumber') }}</th>
                <th>{{ lang('useCases') }}</th>
                <th>{{ lang('date') }}</th>
                <th>{{ lang('show') }}</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->cust_info->template->standart_num }}</td>
                        <td>
                            {{-- many to many retrieval --}}
                            @foreach ($order->cust_info->use_cases as $uc)
                                <span class="badge badge-info">
                                    {{ json_decode($uc->title)->ru }}
                                </span>
                            @endforeach
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                        <a 
                            href="{{ route('customer.order_view', $order->id) }}"
                            class="btn btn-warning btn-sm"
                            >
                            {{__('custom.show')}}

                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
</div>
