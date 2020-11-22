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
                <th colspan="2">{{ lang('activity') }}</th>
            </thead>
            <tbody>
                @foreach ($conclusions as $conclusion)
                    <tr>
                        <td>{{ $conclusion->id }}</td>
                        <td>
                            {{ $conclusion->cust_info->cust_comp_inn }}
                        </td>
                        <td>
                            {{ $conclusion->cust_info->template['standart_num'] }}
                        </td>
                        <td>
                            @if ($conclusion->state == 'finished')
                                <a href="{{ route('agent.create_invoice', $conclusion->id) }}">
                                    {{ __('custom.accept_pay') }}
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
                            <a href="{{ route('agent.view_conclusion', $conclusion->id) }}">
                                {{ lang('show') }}
                            </a>
                        </td>
                        <td>
                            <td>
                                @if (in_array($conclusion->status, [4]))
                                    <a
                                        href="{{ route('agent.edit_conclusion', $conclusion->id) }}">{{ lang('update') }}</a>
                                @else
                                    <a href="{{ route('agent.view_conclusion_open', $conclusion->id) }}">{{ lang('showConclusion') }}
                                @endif
                            </td>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $conclusions->links() }}
    </div>
</div>
