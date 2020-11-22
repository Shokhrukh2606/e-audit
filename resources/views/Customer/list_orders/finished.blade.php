<div class="card">
    <div class="card-header">
        <h3>{{ lang('myOrders') }} ({{ lang('finished') }})</h3>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                
                <th>{{ lang('standartNumber') }}</th>
                <th>{{ lang('useCases') }}</th>
                <th>{{ lang('date') }}</th>
                <th>{{ lang('reject')}} </th>
                <th>{{ lang('show') }}</th>
                <th>{{ lang('showConclusion') }}</th>
                <th>{{ lang('pay') }}</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        
                        <td>{{ $order->cust_info->template->standart_num }}</td>
                        <td>
                            {{-- many to many retrieval --}}
                            @foreach ($order->cust_info->use_cases as $uc)
                                <span class="badge badge-info">
                                    {{ json_decode($uc->title)->ru }}
                                </span>
                            @endforeach
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            @if (!$order->cust_info->conclusion->invoice->id)
                            <button 
                                class="btn btn-simple btn-danger"  
                                data-toggle="modal" data-target="#rejectModal" data-id="{{$order->id}}"
                                onclick="init_reject_form(this)"
                            >
                                {{ lang('reject') }}
                            </button>
                            @else
                            {{ lang('already_accepted') }}
                            @endif
                        </td>
                        <td>
                        <a 
                            href="{{ route('customer.order_view', $order->id) }}"
                            class="btn btn-danger btn-sm"
                        >
                            {{ lang('show') }}
                        </a>
                        </td>
                        <td>
                            @if ($order->cust_info->conclusion->id ?? false)
                                <a href="{{ route('customer.conclusion', $order->cust_info->conclusion->id) }}" 
                                    target="blank"
                                    class="btn btn-sm btn-success btn-simple"
                                >
                                    {{ lang('show') }}
                                </a>
                            @else
                                {{ __('custom.conclusion_not_written') }}
                            @endif
                        </td>
                        <td>
                            @if ($order->cust_info->conclusion->id ?? false)
                                @if($order->cust_info->conclusion->invoice)
                                <a href="{{ route('customer.create_invoice', $order->cust_info->conclusion->id) }}"
                                   class="btn btn-danger btn-simple btn-sm"
                                >
                                    {{ lang('pay') }}
                                </a>
                                @else
                                   <a href="{{ route('customer.create_invoice', $order->cust_info->conclusion->id) }}"
                                   class="btn btn-danger btn-simple btn-sm"
                                    >
                                    {{ lang('accept_and_pay') }}
                                </a>
                                @endif
                            @else
                                {{ __('custom.conclusion_not_written') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade modal-black" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason of rejection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
        {{ lang('type_fucking_reason') }}
        <form 
            action="{{route('customer.reject_conc')}}" 
            method="POST" 
            id="rejectForm"
        >
            @csrf
            <input type="hidden" name="id">
            <input type="text" class="form-control" name="reason">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            {{ lang('cancel') }}
        </button>
        <button type="button" class="btn btn-primary" onclick="submit()">
            {{ lang('reject') }}
        </button>
      </div>
    </div>
  </div>
</div>
<script>
    const rejectForm=document.getElementById("rejectForm");
    function init_reject_form(elem){
        rejectForm.children[1].value=elem.dataset.id;
        rejectForm.children[2].value="";
    }
    function submit(){
        rejectForm.submit();
    }
</script>