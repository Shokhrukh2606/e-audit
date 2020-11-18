@php
$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields"];
@endphp
<h2>{{ lang('order') }} {{ $order->id }}</h2>
{{ lang('status') }}: {{ lang('sent') }} <br>
{{ lang('details') }}: <br>
{{-- Order info --}}
<h3>{{ lang('orderDetails') }}</h3>
<ul>
    <li>{{ lang('standartNumber') }}: {{ $order->cust_info->template->standart_num }}</li>
    <li>{{ lang('useCases') }}:
        @foreach ($order->cust_info->use_cases as $uc)
        <span>{{ json_decode($uc->title)->ru }}</span> |
        @endforeach
    </li>
    @foreach ($order->getAttributes() as $key => $value)
    @continue(in_array($key, $not_iterated, TRUE))
    <!-- <li>{{ __('front.' . $key) }}:{{ $value }}</li> -->
    <li>{{ lang($key) }}: {{ $value }}</li>
    @endforeach
</ul>
{{-- Customer info --}}
<h3>{{lang('clientInfo')}}</h3>
<ul>
    @foreach ($order->cust_info->getAttributes() as $key => $value)
    @continue(in_array($key, $not_iterated, TRUE))
    <li>{{ lang($key) }}: {{ $value }}</li>
    @endforeach
    @php
    // get custom fields array
    $custom_fields=json_decode($order->cust_info->custom_fields??"[]");
    @endphp
    {{-- get custom fields meta and iterate --}}

    @foreach (custom_fields($order->cust_info->template_id) as $field)

    <li>
        <!-- {{ $field->label->ru }} : -->
        {{ lang($field->label->ru) }} :
        @if (!isset($custom_fields->{$field->name}))
        Nothing yet
        @continue
        @endif
        @if ($field->type == 'file')
        <a href="{{ route('file') . '?path=' . $custom_fields->{$field->name} }}" target="blank">
            {{lang('show')}}
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
    <select class="form-control inline-block-select" name="auditor_id" >
        @foreach ($auditors as $auditor)
        <option value="{{ $auditor->id }}">
            {{ $auditor->name }} {{ $auditor->surname }}
        </option>
        @endforeach
    </select>
    <button class="btn btn-sm btn-success">{{lang('assign')}}</button>
</form>
@endif