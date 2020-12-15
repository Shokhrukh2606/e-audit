<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{lang('certificates_list')}}</h1>
        {{auth()->user()->hasRole('admin')&&<a class="btn btn-sm btn-info" href="{{ route('admin.certificates_create') }}">{{lang('create')}}</a>}}
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($certificates as $item)
            <div class="col-12 col-md-6 col-lg-6">
                <iframe src="{{asset("storage/".$item->file_path)}}" width="100%" height="600"></iframe>
                <a href="{{asset("storage/".$item->file_path)}}" download class="btn btn-success btn-sm col">{{lang('download')}}</a>     
            </div>
            @endforeach
        </div>   
    </div>
</div>