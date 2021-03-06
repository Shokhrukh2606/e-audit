@php
    $not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields","cust_comp_registered_by",
"cust_comp_gov_reg_num","cust_comp_director_name","contract_name","contract_passport_serie","contract_where_given","contract_address","contract_company_name","contract_company_inn","contract_type","cust_comp_activity","cust_comp_address","cust_comp_bank_name","cust_comp_bank_mfo","cust_comp_bank_acc","cust_comp_oked"]
;
$files=['cust_comp_gov_registration_copy', 'cust_comp_director_passport_copy'];
@endphp
<div class="card">
    <div class="card-header">
       <h2>{{  lang('order')}} {{ $order->id }} 
            <span class="badge badge-danger">
                {{config('global.reverted_states')[$order->status]}}
            </span>
        </h2> 
    </div>
    <div class="card-body">
        
        {{-- Order info --}}
        <h3>{{ lang('orderDetails') }}</h3>
        <ul>
            <li>{{ lang('standartNumber') }}:{{ $order->cust_info->template->standart_num }}</li>
            <li>{{ lang('useCases') }}:
                @foreach ($order->cust_info->use_cases as $uc)
                <span>{{ json_decode($uc->title)->ru }}</span> |
                @endforeach
            </li>
            @foreach ($order->getAttributes() as $key => $value)
            @continue(in_array($key, $not_iterated, TRUE))
            <li>{{ lang($key)}}:{{ $value }}</li>
            @endforeach
        </ul>
        {{-- Customer info --}}
        <h3>{{lang('clientInfo')}}</h3>
        <ul>
            @foreach ($order->cust_info->getAttributes() as $key => $value)
            @continue(in_array($key, $not_iterated, TRUE))

                <li>{{ lang($key)}}: 
                    @if(in_array($key, $files, true))
                        <a href="{{route('file')."?path=".$value}}" target="blank"
                        class="btn btn-primary btn-link"
                        >
                    {{lang('show')}}
                    </a>
                    @else
                        {{$value}}
                    @endif
            @endforeach
            
            @php

            $custom_fields=json_decode($order->cust_info->custom_fields??"[]");
            @endphp
            {{-- get custom fields meta and iterate --}}

            @foreach (custom_fields($order->cust_info->template_id) as $field)

            <li>
                {{ lang($field->label->ru) }} :
                @if (!isset($custom_fields->{$field->name}))
                Nothing yet
                @continue
                @endif
                @if ($field->type == 'file')
                <a 
                href="{{ route('file') . '?path=' . $custom_fields->{$field->name} }}" 
                target="blank"
                class="btn btn-danger btn-link"
                >
                    {{lang('show')}}
                </a>
                @else
                {{ $custom_fields->{$field->name} }}
                @endif
            </li>
            @endforeach
        </ul>
        @if ($order->status == '2')
        <h3>Назначить аудитора:</h3>
        <form action="{{ route('admin.assign_order', $order->id) }}" method="POST">
            @csrf
            <select name="auditor_id" class="form-control">	
                @foreach ($auditors as $auditor)
                <option value="{{ $auditor->id }}">
                    {{ $auditor->name }} {{ $auditor->surname }}
                </option>
                @endforeach
            </select><br>
            <button class="btn btn-sm btn-info">
               {{lang('assign')}}
            </button>
        </form>
        @endif

    </div>
</div>

