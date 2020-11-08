@php
$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields"];
@endphp
<h2>{{ __('front.order') }} {{ $order->id }}</h2>
{{ __('front.status') }}: {{ __('front.' . $order->status) }} <br>
{{ __('front.details') }}: <br>
{{-- Order info --}}
<h3>{{ __('front.order_info') }}</h3>
<ul>
    <li>{{ __('front.template_num') }}:{{ $order->cust_info->template->standart_num }}</li>
    <li>{{ __('front.use_cases') }}:
        @foreach ($order->cust_info->use_cases as $uc)
            <span>{{ json_decode($uc->title)->ru }}</span> |
        @endforeach
    </li>
    @foreach ($order->getAttributes() as $key => $value)
        @continue(in_array($key, $not_iterated, TRUE))
        <li>{{ __('front.' . $key) }}:{{ $value }}</li>
    @endforeach
</ul>
{{-- Customer info --}}
<h3>{{__('front.custom_comp_info')}}</h3>
<ul>
    @foreach ($order->cust_info->getAttributes() as $key => $value)
        @continue(in_array($key, $not_iterated, TRUE))
        <li>{{ __('front.' . $key) }}:{{ $value }}</li>
    @endforeach
    @php
    // get custom fields array
    $custom_fields=json_decode($order->cust_info->custom_fields??"[]");
    @endphp
    {{-- get custom fields meta and iterate --}}

    @foreach (custom_fields($order->cust_info->template_id) as $field)

        <li>
            {{ $field->label->ru }} :
            @if (!isset($custom_fields->{$field->name}))
                Nothing yet
                @continue
            @endif
            @if ($field->type == 'file')
                <a href="{{ route('file') . '?path=' . $custom_fields->{$field->name} }}" target="blank">
                    View
                </a>
            @else
                {{ $custom_fields->{$field->name} }}
            @endif
        </li>
    @endforeach
</ul>
@if ($order->status == 'open')
    <form action="{{ route('admin.assign_order', $order->id) }}" method="POST">
        @csrf
        <select name="auditor_id">	
            @foreach ($auditors as $auditor)
                <option value="{{ $auditor->id }}">
                    {{ $auditor->name }} {{ $auditor->surname }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-sm btn-success">{{ __('front.assign') }}</button>
    </form>
@endif
