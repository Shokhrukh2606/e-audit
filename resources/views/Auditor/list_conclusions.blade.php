<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button>Logout</button>
    {{lang('smth')}}
</form>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{__('front.my_conclusions')}}</h3>
        <a class="btn btn-sm btn-success" href="{{ route('auditor.create_conclusion') }}">{{__('custom.create')}}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>ID</th>
            <th>{{__('front.template_num')}}</th>
                <th>{{__('front.use_cases')}}</th>
                <th>{{__('front.date')}}</th>
                <th>{{__('custom.show')}}</th>
                <th>{{__('front.actions')}}</th>
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
                        <a href="{{ route('auditor.conclusion', $conclusion->id) }}">View</a>
                    </td>
                    <td>
                        <a href="{{ route('auditor.send', $conclusion->id) }}">Send</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
