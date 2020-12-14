<div class="card">
    <div class="card-header">
        <h1 class="card-title">{{lang('rejected_blanks')}}</h1>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang('user_id')}}</th>
                <th>{{lang('conclusion_id')}}</th>
                <th>{{lang('show')}}</th>
            </thead>
            <tbody>
                @foreach ($blanks as $blank)
                    <tr>
                        <td>{{ $blank->id }}</td>
                        <td>
                            {{getUserName($blank->user_id)}}
                        </td>
                        <td>{{ $blank->conclusion_id }}</td>
                        <td>
                            <a href="{{ route('file')."?path=".$blank->brak_upload}}"
                                target="blank"
                               class="btn btn-danger btn-sm"
                            >
                                {{lang('show')}}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blanks->links() }}
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