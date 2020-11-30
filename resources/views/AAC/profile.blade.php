<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">{{lang('editProfile')}}</h5>
      </div>
      <div class="card-body">
        <form action="{{route('aac.profile')}}" method="POST">
          @csrf
          <div class="row">
            {{-- <div class="col-md-5 pr-md-1">
                            <div class="form-group">
                                <label>Company (disabled)</label>
                                <input type="text" class="form-control" disabled="" placeholder="Company"
                                    value="Creative Code Inc.">
                            </div>
                        </div> --}}
            <div class="col-md-4">
              <div class="form-group">
                <label>{{lang('name')}}</label>
                <input type="text" class="form-control" name="user[name]" value="{{$user->name}}">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label for="exampleInputEmail1">{{lang('surname')}}</label>
                <input type="text" class="form-control" name="user[surname]" value="{{$user->surname}}">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label for="exampleInputEmail1">{{lang('patronymic')}}</label>
                <input type="text" class="form-control" name="user[patronymic]" value="{{$user->patronymic}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-md-1">
              <div class="form-group">
                <label>{{lang('phone')}}</label>
                <input type="text" class="form-control" name="user[phone]" value="{{$user->phone}}">
              </div>
            </div>
            <div class="col-md-6 pl-md-1">
              <div class="form-group">
                <label>{{lang('phone')}}</label>
                <input type="text" class="form-control" name="user[phone]" value="{{$user->phone}}">
              </div>
            </div>
          </div>
          @if(auth()->user()->group_id!=4)
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>{{lang('passportSeries')}}</label>
                <input type="text" class="form-control" name="user[passport_number]" value="{{$user->passport_number}}">
              </div>
            </div>
          </div>
          @endif
          <div class="row">
          @if(auth()->user()->group_id!=4)
            <div class="col-md-4 pr-md-1">
              <div class="form-group">
                <label>{{lang('sertificateNumber')}}</label>
                <input type="text" class="form-control" name="user[cert_number]" value="{{$user->cert_number}}">
              </div>
            </div>
            <div class="col-md-4 px-md-1">
              <div class="form-group">
                <label>{{lang('certificateDate')}}</label>
                <input type="date" class="form-control" name="user[cert_date]" value="{{$user->certificate_date}}">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label>{{lang('city')}}</label>
                <input type="text" class="form-control" name="user[region]" value="{{$user->region}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>{{lang('district')}}</label>
                <input type="text" class="form-control" name="user[district]" value="{{$user->district}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>{{lang('address')}}</label>
                <input type="text" class="form-control" name="user[address]" value="{{$user->address}}">
              </div>
            </div>
            @endif
            <div class="col-md-4">
              <div class="form-group">
                <label>{{lang('password')}}</label>
                <input type="text" class="form-control" name="user[password]">
              </div>
            </div>
          </div>
          {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="4" cols="80" class="form-control"
                                    placeholder="Here can be your description"
                                    value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                            </div>
                        </div>
                    </div> --}}
          <button type="submit" class="btn btn-fill btn-primary">{{lang('save')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>