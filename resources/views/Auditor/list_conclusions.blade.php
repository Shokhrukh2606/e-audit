<form method="POST" action="{{ route('logout') }}">
    @csrf
</form>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{lang('myConclusions')}}</h3>
        <a class="btn btn-sm btn-success" href="{{ route('auditor.create_conclusion') }}">{{lang('create')}}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang('standartNumber')}}</th>
                <th>{{lang('useCases')}}</th>
                <th>{{lang('date')}}</th>
                <th>{{lang('show')}}</th>
                <th>{{lang('activity')}}</th>
            </thead>
            <tbody>
                @foreach ($conclusions as $conclusion)
                <tr>
                    <td>{{ $conclusion->id }}</td>
                    <td>{{ $conclusion->cust_info->template->standart_num }}</td>
                    <td>
                        {{-- many to many retrieval --}}
                        @foreach ($conclusion->cust_info->use_cases as $uc)
                        <span>{{ json_decode($uc->title)->ru }}</span> |
                        @endforeach
                    </td>
                    <td>{{ $conclusion->created_at }}</td>
                    <td>
                        <a href="{{ route('auditor.conclusion', $conclusion->id) }}">{{lang('show')}}</a>
                    </td>
                    <td>
                        <a href="{{ route('auditor.send', $conclusion->id) }}">{{lang('send')}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$conclusions->links()}}
    </div>
</div>