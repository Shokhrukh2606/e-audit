<form action="{{ route('admin.user_conclusions', ['agent', request()->id]) }}" class="row mb-3" id="filterer">
  &nbsp;
  <div class="col">
    <label>{{ lang('inn') }}</label>
    <input class="form-control" type="text" value="{{ request()->input('filter.cust_comp_inn') }}" name="filter[cust_comp_inn]">
  </div>
  <div class="col">
    <label>{{ lang('status') }}</label>
    <select name="filter[status]" id="" class="form-control">
      <option value="">{{ lang('select') }}</option>
      <option {{ request()->input('filter.status') ==1 ? 'selected' : '' }} value="1">{{lang('created')}}</option>
      <option {{ request()->input('filter.status') ==2 ? 'selected' : '' }} value="2">{{lang('sentToAdmin')}}</option>
      <option {{ request()->input('filter.status') ==3 ? 'selected' : '' }} value="3">{{lang('accepted')}}</option>
      <option {{ request()->input('filter.status') ==4 ? 'selected' : '' }} value="4">{{lang('rejected')}}</option>
    </select>
  </div>
  <div class="col">
    <label>{{ lang('standartNumber') }}</label>
    <select name="filter[template_id]" id="" class="form-control">
      <option value="">{{ lang('select') }}</option>
      @foreach ($templates as $template)
      <option {{ request()->input('filter.template_id') == $template->id ? 'selected' : '' }} value="{{ $template->id }}">
        {{ $template->standart_num }}
      </option>
      @endforeach
    </select>
  </div>
  {{-- <div class="col">
        <label>{{ lang('standartNumber') }}</label>
  <input class="form-control" type="text" value="{{ request()->input('filter.template_id') }}" name="filter[template_id]">
  </div> --}}
  <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">{{lang('search')}}</button>
</form>
<div class="card">
  <div class="card-header">
    <h1 class="card-title">{{ lang('conclusions') }}</h1>
  </div>
  <div class="card-body">
    <table class="table tablesorter">
      <thead>
        <th>{{ lang('id') }}</th>
        <th>{{ lang('agent') }}</th>
        <th>{{ lang('auditor') }}</th>
        <th>{{ lang('inn') }}</th>
        <th>{{ lang('standartNumber') }}</th>
        <th>{{ lang('show') }}</th>
      </thead>
      <tbody>
        @foreach ($conclusions as $conclusion)
        <tr>
          <td>{{ $conclusion->id }}</td>
          <td>
            {{ getUserName($conclusion->auditor_id) }}
          </td>
          <td>
            {{ getUserName($conclusion->agent_id) }}
          </td>
          <td>{{ $conclusion->cust_comp_inn }}</td>
          <td>
            <span class="badge badge-danger">
              {{ $states[$conclusion->status] }}
            </span>
          </td>
          <td>{{ $conclusion->standart_num }}</td>
          <td><a href="{{ route('admin.conclusion', $conclusion->conclusion_id) }}">{{ lang('show') }}</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $conclusions->links() }}
  </div>
</div>
{{-- <script>
    $(document).ready(function() {
        // Initialize select2
        $("#selUser").select2();
    });

</script> --}}
{{-- @foreach ($conclusions as $conclusion)
    <tr>
        <td>{{ $conclusion->id }}</td>
<td>
  {{ $conclusion->customer->name ?? 'No' }}
  {{ $conclusion->customer->surname ?? 'Customer' }}
</td>
<td>
  {{ $conclusion->auditor->name ?? 'No' }}
  {{ $conclusion->auditor->surname ?? 'Auditor' }}
</td>
<td>
  {{ $conclusion->agent->name ?? 'No' }}
  {{ $conclusion->agent->surname ?? 'Agent' }}
</td>
<td>{{ $conclusion->cust_info->template->standart_num }}</td>
<td><a href="{{ route('admin.conclusion', $conclusion->id) }}">{{ lang('show') }}</a></td>
</tr>
@endforeach --}}