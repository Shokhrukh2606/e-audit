<div class="card">
    <div class="card-header">
        <h3>{{ __('front.my_orders') }} (Законченный)</h3>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{ lang('id') }}</th>
                <th>{{ lang('standartNumber') }}</th>
                <th>{{ lang('useCases') }}</th>
                <th>{{ lang('date') }}</th>
                <th>{{ lang('show') }}</th>
                <th>{{ lang('showConclusion') }}</th>
                <th>{{ lang('pay') }}</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->cust_info->template->standart_num }}</td>
                        <td>
                            {{-- many to many retrieval --}}
                            @foreach ($order->cust_info->use_cases as $uc)
                                <span>{{ json_decode($uc->title)->ru }}</span> |
                            @endforeach
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                        <a href="{{ route('customer.order_view', $order->id) }}">{{__('custom.show')}}</a>
                        </td>
                        <td>
                            @if ($order->cust_info->conclusion->id ?? false)
                                <a href="{{ route('customer.conclusion', $order->cust_info->conclusion->id) }}" target="blank">
                                    {{ __('custom.show_conclusion') }}
                                </a>
                            @else
                                {{ __('custom.conclusion_not_written') }}
                            @endif
                        </td>
                        <td>
                            @if ($order->cust_info->conclusion->id ?? false)
                                <a href="{{ route('customer.create_invoice', $order->cust_info->conclusion->id) }}">
                                    {{ __('custom.accept_pay') }}
                                </a>
                            @else
                                {{ __('custom.conclusion_not_written') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
</div>
