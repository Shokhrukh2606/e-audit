<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Пожалуйста, заполните поля
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.certificates_view', $certificate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col">
                <label>{{ lang('ru') }}</label>
                <input class="form-control" type="text" name="certificate[ru]" value="{{$certificate->ru}}">
            </div>
            <div class="col">
                <label>{{ lang('oz') }}</label>
                <input class="form-control" type="text" name="certificate[oz]" value="{{$certificate->oz}}">
            </div>
            <div class="col">
                <label>{{ lang('uz') }}</label>
                <input class="form-control" type="text" name="certificate[uz]" value="{{$certificate->uz}}">
            </div>
            <div class="col">
                <label>{{ lang('status') }}</label>
                <select class="form-control" name="certificate[status]">
                    <option {{$certificate->status==1?'selected':''}} value="1">{{ lang('active') }}</option>
                    <option {{$certificate->status==0?'selected':''}} value="0">{{ lang('inactive') }}</option>
                </select>
            </div>
            <div class="col">
                <input type="file" name="certificate_file" class="custom-file-input"
                    id="cust_comp_director_passport_copy">
                <label class="custom-file-label" for="cust_comp_director_passport_copy"
                    data-browse="{{ lang('upload') }}">
                    {{ lang('file') }}
                </label>
            </div>
            <button class="btn btn-warning btn-sm pull-right">Save</button>
        </form>
    </div>
</div>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})
</script>