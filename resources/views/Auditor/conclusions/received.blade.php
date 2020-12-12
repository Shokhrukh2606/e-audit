<form method="POST" action="{{ route('logout') }}">
    @csrf
</form>
<div class="modal modal-black fade" id="assign_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('auditor.assign_blank') }}" method="POST">
            @csrf
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ lang('assign_blank') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @if (count($blanks) != 0)
                        <div class="form-group">
                            <select name="blank_id" class="form-control">
                                @foreach ($blanks as $blank)
                                    <option value="{{ $blank->id }}">
                                        Blank {{ $blank->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="conclusion_id" id="conclusion_id">
                    @else
                        {{ lang('no_blanks') }}
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ lang('close') }}
                    </button>
                    @if (count($blanks) != 0)
                        <button type="submit" class="btn btn-primary">
                            {{ lang('assign_blank') }}
                        </button>
                    @endif
                </div>

            </div>
        </form>
    </div>
</div>
<div class="modal modal-black fade" id="break_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('auditor.break_all') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ lang('break_all') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="break_conclusion_id" name="break_conclusion_id">
                    <div class="form-group">
                        <input type="file" name="reason" required class="form-control"
                            style="position: static;opacity: 1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ lang('close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ lang('break_all') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
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
                <th>{{lang('assign_blank')}}</th>
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
                    <td>{{ $conclusion->cust_info->order->message }}</td>
                    <td>
                        @if($conclusion->status=='5')
                        @if(count($conclusion->blanks)!=0)
                        {{lang('done')}}
                        @else
                        <button 
                            type="button" 
                            href="#" 
                            class="btn btn-simple btn-danger btn-sm"
                            data-toggle="modal" data-target="#assign_modal"
                            onclick="change_conclusion_id({{$conclusion->id}})"
                        >
                            {{lang('assign_blank')}}
                        </button>
                        @endif
                        @else
                        <a href="{{ route('auditor.edit_conclusion', $conclusion->id) }}" class="btn btn-warning btn-simple btn-sm">
                                        {{ lang('edit') }}
                         </a>
                         @endif
                     </td>
                    <td>
                        <a class="btn btn-sm btn-simple btn-success"
                            href="{{ route('auditor.conclusion', $conclusion->id) }}">
                            {{lang('show')}}
                        </a>
                    </td>
                    <td>
                        @if($conclusion->status=='5')
                        {{lang('confirmed')}}
                        @else
                        <a href="{{ route('auditor.send', $conclusion->id) }}" class="btn btn-simple btn-info">
                            {{lang('resent')}}
                        </a>
                        @endif
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
