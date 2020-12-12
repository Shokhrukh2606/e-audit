<form method="POST" action="{{ route('logout') }}">
    @csrf
</form>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ lang('myConclusions') }}</h3>
        
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>

                <th>{{lang('id')}}</th>
                <th>{{lang('standartNumber')}}</th>
                <th>{{lang('useCases')}}</th>
                <th>{{lang('comment')}}</th>
                <th>{{lang('edit')}}</th>
                <th>{{lang('show')}}</th>
                <th>{{lang('resent')}}</th>
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
                   
                        <a href="{{ route('auditor.edit_conclusion', $conclusion->id) }}" class="btn btn-warning btn-simple btn-sm">
                                        {{ lang('edit') }}
                         </a>
                     </td>
                    <td>
                        <a class="btn btn-sm btn-simple btn-success"
                            href="{{ route('auditor.conclusion', $conclusion->id) }}">
                            {{lang('show')}}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('auditor.send', $conclusion->id) }}" class="btn btn-simple btn-info">
                            {{lang('resent')}}
                        </a>
                    </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $conclusions->links() }}
    </div>
</div>

