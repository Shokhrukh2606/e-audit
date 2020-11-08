<div class="card">
    <div class="card-header">
        <h3 class="card-title">My Conclusions</h3>
        <a href="{{ route('auditor.create_conclusion') }}">Create New</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>ID</th>
                <th>Template Standart Number</th>
                <th>Use cases</th>
                <th>Date</th>
                <th>View</th>
                <th>Send</th>
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
