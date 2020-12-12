<style>
    .text-dark{
        color: #000!important;
    }
</style>
@section('conclusionsCss')
    <link href="{{ asset('assets/css/adminConclusions.css') }}" rel="stylesheet" />
@endsection

<form action="{{ route('admin.list_blanks') }}" method="GET" class="row mb-3" id="filterer">
    &nbsp;
    <div class="col">
        <label>{{ lang('customer') }}</label>
        <select class="filters form-control" name="filter[id]" style='width: 200px;'>
            <option value="">{{ lang('select') }}</option>
            @foreach ($users as $customer)
                <option {{ request()->input('filter.id') == $customer->id ? 'selected' : '' }}
                    value="{{ $customer->id }}">
                    {{ getUserName($customer->id) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 mt-4 text-right">
        <a class="btn btn-sm btn-danger col-1 ml-auto  {{ request()->input('filter') ? '' : 'd-none' }}"
            href="{{ route('admin.list_blanks') }}"><i class="tim-icons icon-simple-remove"></i></a>
        <button class="btn btn-sm btn-success col-1 ml-auto " type="submit">{{ lang('search') }}</button>
    </div>
</form>
<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{ lang('list_blanks') }}</h1>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{ lang('id') }}</th>
                <th>{{ lang('Agent, Auditor') }}</th>
                <th>{{ lang('User type') }}</th>
                <th>{{ lang('Available') }}</th>
                <th>{{ lang('Rejected') }}</th>
                <th>{{ lang('Not printed') }}</th>
                <th>{{ lang('Done Successfully') }}</th>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->full_name }}
                        </td>
                        <td>
                            {{lang($item->group->name)}}
                        </td>
                        <td>
                            {{$item->blanks()->where(['is_brak'=>0])->whereNotNull('conclusion_id')->count()}}
                        </td>
                        <td>
                            {{$item->blanks()->where(['is_brak'=>1])->count()}}
                        </td>
                        <td>
                            {{$item->blanks()->whereNull('conclusion_id')->count()}}
                        </td>
                        <td>
                            {{$item->blanks->where(['is_brak'=>0])->whereNotNull('conclusion_id')->count()}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
