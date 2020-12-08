<div class="card">
    <div class="card-body">
        <form action="{{route('admin.view_setting', ['id'=>$setting->id])}}" method="POST">
            @csrf
        
            <label>{{lang('Alias')}}</label>
            <input class="form-control" type="text" name="setting[alias]" value="{{$setting->alias}}"><br>
        
            <label>{{lang('RU')}}</label>
            <input class="form-control" type="text" name="setting[ru]" value="{{$setting->ru}}"><br>
        
            <label>{{lang('UZ')}}</label>
            <input class="form-control" type="text" name="setting[uz]" value="{{$setting->uz}}"><br>
        
            <label>{{lang('O\'z')}}</label>
            <input class="form-control" type="text" name="setting[oz]" value="{{$setting->oz}}"><br>
        
            <button class="btn btn-sm btn-success" type="submit">{{lang('save')}}</button>
        </form>        
    </div>
</div>

