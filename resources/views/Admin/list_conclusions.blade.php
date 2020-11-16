<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{lang('conclusions')}}</h1>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang('customer')}}</th>
                <th>{{lang('auditor')}}</th>
                <th>{{lang('agent')}}</th>
                <th>{{lang('standartNumber')}}</th>
                <th>{{lang('show')}}</th>
            </thead>
            <tbody>
                @foreach ($conclusions as $conclusion)
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
                    <td><a href="#">{{lang('show')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>