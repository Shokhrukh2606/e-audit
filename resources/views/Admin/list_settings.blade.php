
<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{lang('Settings')}}</h1>
        <form action="{{ route('admin.list_settings') }}" method="GET" class="row mb-3" id="filterer">
            &nbsp;
            <div class="col">
                <label>{{lang('alias')}}</label>
                <input class="form-control" type="text" value="{{ request()->input('filter.alias') }}" name="filter[alias]">
            </div>
            <a class="btn btn-sm btn-danger col-1 mt-auto {{request()->input('filter')?'':'d-none'}}" href="{{route('admin.list_settings')}}"><i class="tim-icons icon-simple-remove"></i></a>
            <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">{{lang('search')}}</button>
        </form>
        <a class="btn btn-sm btn-info setting_shower" href="{{ route('admin.create_setting') }}">{{lang('create')}}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang('alias')}}</th>
                <th>RU</th>
                <th>UZ</th>
                <th>OZ</th>                
                <th>{{lang('show')}}</th>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
                    <tr>
                        <td>{{ $setting->id }}</td>
                        <td>{{ $setting->alias }}</td>                    
                        <td>{{ $setting->ru }}</td>
                        <td>{{ $setting->uz }}</td>
                        <td>{{ $setting->oz }}</td>
                        <td>
                            <a href="{{ route('admin.view_setting', $setting->id) }}"
                               class="btn btn-danger btn-sm setting_shower"
                            >
                                {{lang('show')}}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $settings->links() }}
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="showSetting">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
        </div>
      </div>
    </div>
  </div>