@php
use App\Models\Conclusion;   
@endphp
<form action="{{ route('admin.conclusions') }}" method="GET" class="row mb-3" id="filterer">
        &nbsp;
        <div class="col">
            <label>{{ lang('customer') }}</label>
            <select class="filters form-control" name="filter[customer_id]" style='width: 200px;'>
                <option value="">{{ lang('select') }}</option>
                @foreach ($customers as $customer)
                    <option {{ request()->input('filter.customer_id') == $customer->id ? 'selected' : '' }}
                        value="{{ $customer->id }}">
                        {{ getUserName($customer->id) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label>{{ lang('auditor') }}</label>
            <select class="filters form-control" name="filter[auditor_id]"
                value="{{ request()->input('filter.auditor_id') }}" style='width: 200px;'>
                <option value="">{{ lang('select') }}</option>
                @foreach ($auditors as $auditor)
                    <option {{ request()->input('filter.auditor_id') == $auditor->id ? 'selected' : '' }}
                        value="{{ $auditor->id }}">
                        {{ getUserName($auditor->id) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label>{{ lang('agent') }}</label>
            <select class="filters form-control" name="filter[agent_id]"
                value="{{ request()->input('filter.agent_id') }}" style='width: 200px;'>
                <option value="">{{ lang('select') }}</option>
                @foreach ($agents as $agent)
                    <option {{ request()->input('filter.agent_id') == $agent->id ? 'selected' : '' }}
                        value="{{ $agent->id }}">
                        {{ getUserName($agent->id) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label>{{ lang('standartNumber') }}</label>
            <select class="filters form-control" name="filter[template_id]" style='width: 200px;'>
                <option value="">{{ lang('select') }}</option>
                @foreach ($templates as $template)
                    <option {{ request()->input('filter.template_id') == $template->id ? 'selected' : '' }}
                        value="{{ $template->id }}">
                        {{ $template->id }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">{{ __('front.search') }}</button>
    </form>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ lang('conclusions') }}</h1>
        </div>
        <div class="card-body">
            <table class="table tablesorter">
                <thead>
                    <th>{{ lang('id') }}</th>
                    <th>{{ lang('customer') }}</th>
                    <th>{{ lang('auditor') }}</th>
                    <th>{{ lang('agent') }}</th>
                    <th>{{lang("status")}}</th> 
                    <th>{{ lang('standartNumber') }}</th>
                    <th colspan="3">{{ lang('activity') }}</th>
                </thead>
                <tbody>
                    @foreach ($conclusions as $conclusion)
                        <tr>
                            <td>{{ $conclusion->id }}</td>
                            <td>
                                {{ getUserName($conclusion->customer_id) }}
                            </td>
                            <td>
                                {{ getUserName($conclusion->auditor_id) }}
                            </td>
                            <td>
                                {{ getUserName($conclusion->agent_id) }}
                            </td>
                            <td>{{ $conclusion->template_id }}</td>
                            <td>
                                <span class="badge badge-danger">
                                    {{ Conclusion::STATES[$conclusion->status] }}
                                </span>
                            </td>
                            <td><a
                                    href="{{ route('admin.change_status', ['finished', $conclusion->conclusion_id]) }}">Finish</a>
                            </td>
                            <td><a
                                    href="{{ route('admin.change_status', ['rejected', $conclusion->conclusion_id]) }}">Reject</a>
                            </td>
                            <td><a
                                    href="{{ route('admin.conclusion', $conclusion->conclusion_id) }}">{{ lang('show') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @foreach ($conclusions as $conclusion)
        <tr>
            <td>{{ $conclusion->id }}</td>
            <td>
                {{ $conclusion->customer->name ?? 'No' }}
                {{ $conclusion->customer->surname ?? 'Customer' }}
            </td>
            <td>
                {{ $conclusion->auditor->name ?? 'No' }}
                {{ $conclusion->auditor->surname ?? 'Auditor' }}
            </td>
            <td>
                {{ $conclusion->agent->name ?? 'No' }}
                {{ $conclusion->agent->surname ?? 'Agent' }}
            </td>
            <td>{{ $conclusion->cust_info->template->standart_num }}</td>
            <td><a href="{{ route('admin.conclusion', $conclusion->id) }}">{{ lang('show') }}</a></td>
        </tr>
    @endforeach --}}
