<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">{{lang('editProfile')}}</h5>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
            {{-- <div class="col-md-5 pr-md-1">
                            <div class="form-group">
                                <label>Company (disabled)</label>
                                <input type="text" class="form-control" disabled="" placeholder="Company"
                                    value="Creative Code Inc.">
                            </div>
                        </div> --}}
            <div class="col-md-3">
              <div class="form-group">
                <label>{{lang('name')}}</label>
                <input type="text" class="form-control" value="{{$user->name}}">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label for="exampleInputEmail1">{{lang('mail')}}</label>
                <input type="email" class="form-control" placeholder="mike@email.com">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label for="exampleInputEmail1">{{lang('mail')}}</label>
                <input type="email" class="form-control" placeholder="mike@email.com">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-md-1">
              <div class="form-group">
                <label>{{lang('name')}}</label>
                <input type="text" class="form-control" placeholder="Company" value="Mike">
              </div>
            </div>
            <div class="col-md-6 pl-md-1">
              <div class="form-group">
                <label>{{lang('surname')}}</label>
                <input type="text" class="form-control" placeholder="{{lang('surname')}}" value="Andrew">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>{{lang('address')}}</label>
                <input type="text" class="form-control" placeholder="{{lang('address')}}" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-md-1">
              <div class="form-group">
                <label>{{lang('city')}}</label>
                <input type="text" class="form-control" placeholder="{{lang('city')}}" value="Mike">
              </div>
            </div>
            <div class="col-md-4 px-md-1">
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" placeholder="Country" value="Andrew">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label>Postal Code</label>
                <input type="number" class="form-control" placeholder="ZIP Code">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>About Me</label>
                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-fill btn-primary">{{lang('save')}}</button>
      </div>
    </div>
  </div>
</div>