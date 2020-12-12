<form method="POST" action="{{ route('logout') }}">
    @csrf
</form>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ lang('myConclusions') }}</h3>
        @if (!$on_order)
            <a class="btn btn-sm btn-success" href="{{ route('auditor.create_conclusion') }}">
                {{ lang('create') }}
            </a>
        @endif
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>

                <th>{{lang('id')}}</th>
                <th>{{lang('standartNumber')}}</th>
                <th>{{lang('useCases')}}</th>
                <th>{{lang('date')}}</th>
                
                <th>{{lang('show')}}</th>
                 

            </thead>
            <tbody>
                @foreach ($conclusions as $conclusion)


                @if($on_order)
                    @continue(!$conclusion->cust_info->order??false)
                @endif
                @if(!$on_order)
                    @continue($conclusion->cust_info->order??false)
                @endif
                
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
                        <a class="btn btn-sm btn-simple btn-success"
                            href="{{ route('auditor.conclusion', $conclusion->id) }}">
                            {{lang('show')}}
                        </a>
                        
                    </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $conclusions->links() }}
    </div>
</div>

