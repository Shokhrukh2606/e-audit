<div class="card">
    <div class="card-body">
        <form action="{{route('admin.create_setting')}}" method="POST">
            @csrf
        
            <label>{{lang('Alias')}}</label>
            <input class="form-control" type="text" name="setting[alias]"><br>
        
            <label>{{lang('RU')}}</label>
            <input class="form-control" type="text" name="setting[ru]"><br>
        
            <label>{{lang('UZ')}}</label>
            <input class="form-control" type="text" name="setting[uz]"><br>
        
            <label>{{lang('O\'z')}}</label>
            <input class="form-control" type="text" name="setting[oz]"><br>
        
            <button class="btn btn-sm btn-success" type="submit">{{lang('save')}}</button>
        </form>        
    </div>
</div>

