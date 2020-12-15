<div class="modal modal-black fade" id="assign_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('agent.assign_blank')}}" method="POST">
        @csrf
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            {{lang('assign_blank')}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
        @if(count($blanks)!=0)
            <div class="form-group">
                <select name="blank_id" class="form-control">
                   @foreach($blanks as $blank)
                        <option value="{{$blank->id}}">
                            Blank {{$blank->id}}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="conclusion_id" id="conclusion_id">
        @else
            {{lang('no_blanks')}}
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            {{lang('close')}}
        </button>
        @if(count($blanks)!=0)
            <button type="submit" class="btn btn-primary">
                {{lang('assign_blank')}}
            </button>
        @endif
      </div>
       
    </div>
    </form>
  </div>
</div>
<div class="modal modal-black fade" id="break_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('agent.break_all')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            {{lang('break_all')}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="break_conclusion_id" name="break_conclusion_id">
        <div class="form-group">
            <input type="file" name="reason" required class="form-control"
            style="position: static;opacity: 1"
            >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            {{lang('close')}}
        </button>
            <button type="submit" class="btn btn-primary">
                {{lang('break_all')}}
            </button>
         </div>
    </div>
    </form>
  </div>
</div>
<h2>{{ Auth::user()->agent_conclusions->count() . ' ' . lang('conclusion') }}</h2>
<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{ lang('conclusions') }}</h1>
        <a class="btn btn-sm btn-success" href="{{ route('agent.create_conclusion') }}">{{ lang('create') }}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{ lang('id') }}</th>
                <th>{{ lang('inn') }}</th>
                <th>{{ lang('standartNumber') }}</th>
                <th>{{ lang('status') }}</th>
                <th colspan="3">{{ lang('activity') }}</th>
            </thead>
            <tbody>
                @foreach ($conclusions as $conclusion)
                    <tr>
                        <td>{{ $conclusion->id }}</td>
                        <td>
                            {{-- {{ $conclusion->cust_info->cust_comp_inn }} --}}
                        </td>
                        <td>
                            {{-- {{ $conclusion->cust_info->template['standart_num'] }} --}}
                        </td>
                        <td>
                            @if ($conclusion->state == 'finished')
                            
                                <a class="btn btn-info btn-sm" href="{{ route('agent.create_invoice', $conclusion->id) }}">
                                    {{ lang('pay') }}
                                </a>
                            
                            @else
                                <span class="badge badge-danger">
                                    {{ $conclusion->state }}
                                </span>
                            @endif
                        </td>
                        <td>
                        </td>
                        <td>
                            @if($conclusion->status=='3')
                            @if($conclusion->invoice&&$conclusion->invoice->status=='confirmed')

                            @if (count($conclusion->blanks) == 0)
                                <button type="button" href="#" class="btn btn-simple btn-danger btn-sm"
                                    data-toggle="modal" data-target="#assign_modal"
                                    onclick="change_conclusion_id({{ $conclusion->id }})">
                                    {{ lang('assign_blank') }}
                                </button>
                            @else
                                @if ($conclusion->is_printable())
                                    <button type="button" href="#" class="btn btn-simple btn-danger btn-sm"
                                        data-toggle="modal" data-target="#assign_modal"
                                        onclick="change_conclusion_id({{ $conclusion->id }})">
                                        {{ lang('print_again') }}
                                    </button>
                                @endif
                            @endif
                            
                            @endif
                            @else
                            {{lang('waiting_admin_accept')}}
                            @endif
                        </td>
                        <td>
                            @if (!in_array($conclusion->status, [3,2]))
                                <a class="btn btn-sm btn-simple btn-success" href="{{ route('agent.edit_conclusion', $conclusion->id) }}">{{ lang('update') }}</a>
                            @endif
                            <a class="btn btn-sm btn-simple btn-success"
                                href="{{ route('agent.view_conclusion_open', $conclusion->id) }}">
                                {{ lang('show') }}
                            </a>
                            @foreach ($conclusion->blanks as $blank)
                                @continue($blank->is_brak)
                                <br> <br>
                                <a class="btn btn-sm btn-simple btn-success"
                                    href="{{ route('agent.view_conclusion_open', $conclusion->id, $blank->id) }}">
                                    {{ lang('show') }} - blank {{ $blank->id }}
                                </a>
                            @endforeach

                        </td>
                         @if(count($conclusion->blanks)!=0&&count($conclusion->valid_blanks())!=0)
                            <td>
                                <button type="submit" class="btn btn-danger btn-simple" 
                                 data-toggle="modal" data-target="#break_all"
                                        onclick="break_all({{ $conclusion->id }})"
                                >
                                    {{ lang('break_all') }}
                                </button>
                            </td>
                        @endif
                        @if($conclusion->status==4)
                        <td>
                            <a class="btn btn-sm btn-simple btn-success" href="{{ route('agent.resend', $conclusion->id) }}" >{{ lang('resend') }}</a>
                        </td>
                        @endif
                         @if($conclusion->is_coefficent=='with_coef'&&count($conclusion->valid_blanks())==0)
                        <td>
                            <a class="btn btn-sm btn-simple btn-success" href="{{ route('agent.edit_conclusion', $conclusion->id) }}">{{ lang('update') }}</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $conclusions->links() }}
    </div>
</div>
<script>
  function change_conclusion_id(id){
      document.getElementById('conclusion_id').value=id;
  }
  function break_all(id){
      document.getElementById('break_conclusion_id').value=id;
  }
</script>