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
                <th>{{lang('date')}}</th>
                
                <th>{{lang('show')}}</th>
                
                <th>{{lang('activity')}}</th>

                <th>{{lang('activity')}}</th>


            </thead>
            <tbody>
                @foreach ($conclusions as $conclusion)
                @continue($conclusion->cust_info->order->status=='7')
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
                <td>

                    <a href="{{ route('auditor.edit_conclusion', $conclusion->id) }}"
                        class="btn btn-warning btn-simple btn-sm">
                        {{ lang('edit') }}
                    </a>
                    
                </td>

                <td>
                @if($conclusion->is_coefficent=='no_coef')
                    <a class='btn btn-simple btn-sm btn-warning'
                    href="{{ route('auditor.send', $conclusion->id) }}"> {{ lang('send_to_admin') }}
                    </a>
                @else
                <a class='btn btn-simple btn-sm btn-warning'
                href="{{ route('auditor.send', $conclusion->id) }}"> {{ lang('send_to_customer') }}
                </a>
                @endif
        </a>
       
    </td>
  
</tr>
@endforeach
</tbody>
</table>
{{ $conclusions->links() }}
</div>
</div>
<script>
    function change_conclusion_id(id) {
        document.getElementById('conclusion_id').value = id;
    }

    function break_all(id) {
        document.getElementById('break_conclusion_id').value = id;
    }

</script>
