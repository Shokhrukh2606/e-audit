<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{lang('certificates_list')}}</h1>
        <a class="btn btn-sm btn-info" href="{{ route('admin.certificates_create') }}">{{lang('create')}}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang(config('global.lang'))}}</th>
                <th>{{lang('show')}}</th>
            </thead>
            <tbody>
                @foreach ($certificates as $certificate)
                    <tr>
                        <td>{{ $certificate->id }}</td>
                        <td>{{$certificate->uz}}</td>
                        <td><a href="{{route('admin.certificates_view', $certificate->id)}}" class="btn btn-success btn-sm">{{lang('show')}}</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>