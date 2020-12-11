<form method="POST" action="{{ route('logout') }}">
    @csrf
</form>
<div class="modal modal-black fade" id="assign_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('auditor.assign_blank')}}" method="POST">
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
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{lang('myConclusions')}}</h3>
        @if(!$on_order)
        <a class="btn btn-sm btn-success" 
            href="{{ route('auditor.create_conclusion') }}">
            {{lang('create')}}
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
                <th>{{lang('assign_blank')}}</th>
                <th>{{lang('show')}}</th>
                @if($on_order)
                    <th>{{lang('activity')}}</th>
                @endif
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
                    @if(count($conclusion->blanks)==0)
                        <button 
                            type="button" 
                            href="#" 
                            class="btn btn-simple btn-danger btn-sm"
                            data-toggle="modal" data-target="#assign_modal"
                            onclick="change_conclusion_id({{$conclusion->id}})"
                        >
                            {{lang('assign_blank')}}
                        </button>
                    @else
                        @if($conclusion->is_printable())
                         <button 
                            type="button" 
                            href="#" 
                            class="btn btn-simple btn-danger btn-sm"
                            data-toggle="modal" data-target="#assign_modal"
                            onclick="change_conclusion_id({{$conclusion->id}})"
                        >
                            {{lang('print_again')}}
                        </button>
                        @endif
                    @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-simple btn-success"
                            href="{{ route('auditor.conclusion', $conclusion->id) }}">
                            {{lang('show')}}
                        </a>
                        @foreach($conclusion->blanks as $blank)
                        @continue($blank->is_brak)
                         <br> <br>
                            <a class="btn btn-sm btn-simple btn-success"
                                href="{{ route('auditor.conclusion', $conclusion->id, $blank->id) }}"
                            >
                             {{lang('show')}} - blank {{$blank->id}}
                            </a>
                        @endforeach
                    </td>
                    @if($on_order)
                    <td>
                        <a
                        class='btn btn-simple btn-sm btn-warning' 
                        href="{{ route('auditor.send', $conclusion->id) }}">{{lang('send')}}
                        </a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$conclusions->links()}}
    </div>
</div>
<script>
    function change_conclusion_id(id){
        document.getElementById('conclusion_id').value=id;
    }
</script>