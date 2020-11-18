<form action="{{ route('admin.conclusions') }}" class="row mb-3" id="filterer">
    &nbsp;
    <div class="col">
        <label>{{ lang('customer') }}</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.customer_id') }}"
            name="filter[customer_id]">
    </div>
    <div class="col">
        <label>{{ lang('auditor') }}</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.auditor_id') }}"
            name="filter[auditor_id]">
    </div>
    <div class="col">
        <label>{{ lang('agent') }}</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.agent_id') }}"
            name="filter[agent_id]">
    </div>
    <div class="col">
        <label>{{ lang('standartNumber') }}</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.template_id') }}"
            name="filter[template_id]">
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
                <th>{{ lang('standartNumber') }}</th>
                <th>{{ lang('show') }}</th>
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
                        <td><a href="{{ route('admin.conclusion', $conclusion->id) }}">{{ lang('show') }}</a></td>
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
