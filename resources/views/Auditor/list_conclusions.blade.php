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
        @if (!$on_order)
            <a class="btn btn-sm btn-success" href="{{ route('auditor.create_conclusion') }}">
                {{ lang('create') }}
            </a>
        @endif
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>

                <th>{{ lang('id') }}</th>
                <th>{{ lang('standartNumber') }}</th>
                <th>{{ lang('useCases') }}</th>
                <th>{{ lang('date') }}</th>
                @if (!$on_order)
                    <th>{{ lang('assign_blank') }}</th>
                @endif

                <th>{{lang('show')}}</th>
                 <th>{{lang('activity')}}</th>

                <th>{{lang('activity')}}</th>


                <th>
                    {{ lang('activity') }}
                </th>

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
                    @if (count($conclusion->blanks) == 0)
                        <td>
                            <button type="button" href="#" class="btn btn-simple btn-danger btn-sm" data-toggle="modal"
                                data-target="#assign_modal" onclick="change_conclusion_id({{ $conclusion->id }})">
                                {{ lang('assign_blank') }}
                            </button>
                        </td>
                    @else
                        @if ($conclusion->is_printable())
                            <td>
                                <button type="button" href="#" class="btn btn-simple btn-danger btn-sm"
                                    data-toggle="modal" data-target="#assign_modal"
                                    onclick="change_conclusion_id({{ $conclusion->id }})">
                                    {{ lang('print_again') }}
                                </button>
                            </td>
                        @endif
                    @endif

                    <td>
                        <a class="btn btn-sm btn-simple btn-success"
                            href="{{ route('auditor.view_conclusion_open', $conclusion->id) }}">
                            {{ lang('show') }}
                        </a>
                        @foreach ($conclusion->blanks as $blank)
                            @continue($blank->is_brak)
                            <br> <br>
                            <a class="btn btn-sm btn-simple btn-success"
                                href="{{ route('auditor.view_conclusion_open', $conclusion->id) }}">
                                {{ lang('show') }}
                            </a>

                        @endforeach
                        </td>
                        <td>
                            @if ($conclusion->state != 7)
                                @if (count($conclusion->valid_blanks()) == 0)
                                    @if($conclusion->getStateAttribute()=='initiated' || $conclusion->getStateAttribute()=='finished')
                                    <a href="{{ route('auditor.edit_conclusion', $conclusion->id) }}"
                                        class="btn btn-warning btn-simple btn-sm">
                                        {{ lang('edit') }}
                                    </a>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-danger" onclick="break_all({{ $conclusion->id }})"
                                        data-toggle="modal" data-target="#break_all">
                                        {{ lang('break_all') }}
                                    </button>
                                @endif
                            @endif
                        </td>
                        @if ($on_order)
                            <td>
                                @if($conclusion->is_coefficent=='no_coef')
                                    @if($conclusion->getStateAttribute()=='initiated')
                                    <a class='btn btn-simple btn-sm btn-warning'
                                        href="{{ route('auditor.send', $conclusion->id) }}"> {{ lang('send_to_admin') }}
                                    </a>
                                    @endif
                                    @if($conclusion->getStateAttribute()=='sent')
                                        sent to admin
                                    @endif

                                    @if($conclusion->getStateAttribute()=='finished'
                                        ||
                                    $conclusion->getStateAttribute()=='rejected'
                                    )
                                    <a class='btn btn-simple btn-sm btn-warning'
                                        href="{{ route('auditor.send', $conclusion->id) }}"> {{ lang('send_to_customer') }}
                                    </a>
                                    @endif
                                @else
                                    <a class='btn btn-simple btn-sm btn-warning'
                                        href="{{ route('auditor.send', $conclusion->id) }}"> {{ lang('send_to_customer') }}
                                    </a>
                                @endif
                            </td>

                        @endif
                    </td>
                    @if ($on_order)
                        <td>
                            <a class='btn btn-simple btn-sm btn-warning'
                                href="{{ route('auditor.send', $conclusion->id) }}"> {{ lang('send') }}
                            </a>
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
    function change_conclusion_id(id) {
        document.getElementById('conclusion_id').value = id;
    }

    function break_all(id) {
        document.getElementById('break_conclusion_id').value = id;
    }

</script>
